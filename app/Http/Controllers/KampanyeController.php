<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kampanye;
use DB;

class KampanyeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function form(){
        return view ('Kandidat.formKampanye');
    }

    public function data(){
        $kampanye = DB::table('kampanye')
        -> join('masyarakat','masyarakat.id', '=', 'kampanye.id_masyarakat')
        -> select('masyarakat.id','kampanye.id','masyarakat.waktu','masyarakat.gambar','masyarakat.konten')
        -> get();
    }

    public function create(Request $request){

        $request->validate([
            'gambar'    => 'required|mimes:jpg,jpeg,png|max:5000',
            'judul'     => 'required|min:5|max:20|unique',
            'waktu'     => 'required|date|unique',
            'konten'    => 'required',
            'alamat'    => 'required|max:50'
        ]);
        
        $gambar     = $request->gambar;
        $namafile   = $gambar->getClientOriginalName();

        $kampanye = new Kampanye;
        $kampanye->id_masyarakat    = $request->id_masyarakat;
        $kampanye->judul            = $request->judul;
        $kampanye->waktu            = date('y-m-d H:i');
        $kampanye->konten           = $request->konten;
        $kampanye->gambar           = $request->gambar;
        $kampanye->alamat           = $request->alamat;

        $gambar->move(public_path().'/img/fotoKampanye', $namafile);

        $kampanye->save();

        return redirect('/kandidat/dataKampanye');
    }
}

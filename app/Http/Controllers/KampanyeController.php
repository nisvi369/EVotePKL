<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kampanye;
use DB;

class KampanyeController extends Controller
{
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
        $gambar = $request->gambar;
        $namafile = $gambar->getClientOriginalName();

        $kampanye = new Kampanye;
        $kampanye->id_masyarakat = $request->id_masyarakat;
        $kampanye->judul = $request->judul;
        $kampanye->waktu = date('y-m-d H:i');
        $kampanye->konten = $request->konten;
        $kampanye->gambar = $request->alamat;

        $gambar->move(public_path().'/img/fotoKampanye', $namafile);

        $kampanye->save();

        return redirect('/kandidat/dataKampanye');
    }
}

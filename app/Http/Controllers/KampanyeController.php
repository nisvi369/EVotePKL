<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kampanye;
use App\masyarakat;
use App\Pemilihan;
use DB;
use Session;
use Auth;

class KampanyeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function data(){
        // $kampanye = DB::table('kampanye')
        // -> join('masyarakat','masyarakat.id', '=', 'kampanye.id_pemilihan')
        // -> select('masyarakat.id','kampanye.id','masyarakat.waktu','masyarakat.gambar','masyarakat.konten')
        // -> get();
        // $transaksi = Transaksi::where('pengguna_id', Auth::user()->id)->first();
        // $pesanan = Pesanan::where('transaksi_id', $transaksi['id'])->latest()->paginate(8);

        $pemilihan = Pemilihan::where('masyarakat_id', Auth::user()->id)->first();
        $kampanye = Kampanye::where('id_pemilihan', $pemilihan->id)->get();

        // $kampanye = Kampanye::all();

        return view('Kandidat.dataKampanye', compact('kampanye'));
    }

    public function form(){

        return view ('Kandidat.formKampanye');
    }

    public function create(Request $request){

        $pemilihan = Pemilihan::where('masyarakat_id', Auth::user()->id)->first();
        // $kampanye = Kampanye::where('id_pemilihan', $pemilihan->id)->first();

        $request->validate([
            'gambar'    => 'required|mimes:jpg,jpeg,png|max:5000',
            'judul'     => 'required|min:5|max:20',
            'waktu'     => 'required|date',
            'konten'    => 'required',
        ]);
        
        // $gambar     = $request->gambar;
        // $namafile   = $gambar->getClientOriginalName();

        $kampanye = new Kampanye;
        $kampanye->id_pemilihan     = $pemilihan->id;
        $kampanye->judul            = $request->judul;
        $kampanye->waktu            = $request->waktu;
        $kampanye->konten           = $request->konten;

        if ($request->hasfile('gambar')) {
            $foto         = $request->file('gambar');
            $new_foto     = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('img/foto_kampanye/'), $new_foto);
            $kampanye->gambar = $new_foto;
        }

        // $pemilihan->kampanye()->save($kampanye);
        $kampanye->save();

        Session::flash('success', 'Data berhasil disimpan !!');

        return redirect('/kandidat/dataKampanye');
    }

    public function selengkapnya($id)
    {
        $kampanye = Kampanye::where('id', $id)->first();

        return view('Kandidat.detailBaca', compact('kampanye'));
    }
}

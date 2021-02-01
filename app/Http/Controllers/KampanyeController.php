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


    // public function data(){
    //     // $kampanye = DB::table('kampanye')
    //     // -> join('masyarakat','masyarakat.id', '=', 'kampanye.id_pemilihan')
    //     // -> select('masyarakat.id','kampanye.id','masyarakat.waktu','masyarakat.gambar','masyarakat.konten')
    //     // -> get();
    //     // $transaksi = Transaksi::where('pengguna_id', Auth::user()->id)->first();
    //     // $pesanan = Pesanan::where('transaksi_id', $transaksi['id'])->latest()->paginate(8);

    //     $pemilihan = Pemilihan::where('masyarakat_id', Auth::user()->id)->first();
    //     $kampanye = Kampanye::where('id_pemilihan', $pemilihan->id)->get();

    //     // $kampanye = Kampanye::all();

    //     return view('Kandidat.dataKampanye', compact('kampanye'));
    // }
    
    public function form(){
        $kampanye = DB::table('kampanye')
        -> join('pemilihan','pemilihan.id','=', 'kampanye.id_pemilihan')
        -> join('masyarakat','masyarakat.id','=','pemilihan.masyarakat_id')
        -> select('kampanye.id_pemilihan')
        -> get();
        return view ('Kampanye.form', compact('kampanye'));
    }

    public function data(){
        $kampanye = DB::table('kampanye')
        -> join('pemilihan','pemilihan.id','=', 'kampanye.id_pemilihan')
        -> join('masyarakat','masyarakat.id','=','pemilihan.masyarakat_id')
        -> select('kampanye.id','kampanye.judul','kampanye.waktu','kampanye.gambar','kampanye.konten','pemilihan.masyarakat_id','masyarakat.nama','pemilihan.nomor_urut','masyarakat.id')
        -> get();

        return view('Kampanye.data', compact('kampanye'));
    }

    public function create(Request $request){
        $pemilihan = Pemilihan::where('id', Auth::user()->id)->first();
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

    public function detail($id){
        $kampanye = DB::table('kampanye')
        -> join('pemilihan','pemilihan.id','=', 'kampanye.id_pemilihan')
        -> join('masyarakat','masyarakat.id','=','pemilihan.masyarakat_id')
        -> select('kampanye.id','kampanye.judul','kampanye.waktu','kampanye.gambar','kampanye.konten','pemilihan.masyarakat_id','masyarakat.nama','pemilihan.nomor_urut')
        -> where('kampanye.id','=',$id)
        -> get();

        return view('Kampanye.detail', compact('kampanye'));
    }

    public function hapus($id){
        $kampanye = \App\Kampanye::find($id);
        $kampanye->delete();
        
        return redirect ('/Kandidat/dataKampanye')->with('Data Kampanye Anda telah dihapus');
    }

    public function edit(Request $request, $id){
        $kampanye = Kampanye::findOrFail($id);
       
        return view('Kampanye.edit',compact('kampanye'));
    }

    public function update (Request $request,$id) {
        $kampanye = Kampanye::findOrFail($id);
  
        $kampanye->update([
            'gambar'    => 'required|mimes:jpg,jpeg,png|max:5000',
            'judul'     => 'required|min:5|max:20|unique:kampanye',
            'waktu'     => 'required|date',
            'konten'    => 'required',
        ]);
        
        $request->file('gambar')->move('img/', $request->file('gambar')->getClientOriginalName());
        $kampanye->gambar = $request->file('gambar')->getClientOriginalName();
        $kampanye->save();
        
        return redirect ('/Kandidat/dataKampanye')->with('sukses','Data Berhasil diupdate');;
        }
}

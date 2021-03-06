<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kampanye;
use App\masyarakat;
use App\Pemilihan;
use App\Periode;
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
        $kampanye = DB::table('kampanye')
        -> join('pemilihan','pemilihan.id','=', 'kampanye.id_pemilihan')
        -> join('masyarakat','masyarakat.id','=','pemilihan.masyarakat_id')
        -> select('kampanye.id','kampanye.judul','kampanye.waktu','kampanye.gambar','kampanye.konten','pemilihan.masyarakat_id','masyarakat.nama','pemilihan.nomor_urut')
        -> paginate(5);

        return view('Kampanye.data', compact('kampanye'));
    }

    public function dataku(){
        $tanggal_awal   = Periode::orderBy('tanggal', 'asc')->first();
        $pemilihan = Pemilihan::where('masyarakat_id', Auth::user()->id)->first();
        $kampanye = Kampanye::where('id_pemilihan', $pemilihan->id)->get();
        return view('Kampanye.dataku', compact('kampanye', 'tanggal_awal'));
    }

    public function form(){
        $kampanye = DB::table('kampanye')
        -> join('pemilihan','pemilihan.id','=', 'kampanye.id_pemilihan')
        -> join('masyarakat','masyarakat.id','=','pemilihan.masyarakat_id')
        -> select('kampanye.id','kampanye.judul','kampanye.waktu','kampanye.gambar','kampanye.konten','pemilihan.masyarakat_id','masyarakat.nama','pemilihan.nomor_urut')
        -> get();

        return view ('Kampanye.form');
    }

    public function create(Request $request){
        $pemilihan = Pemilihan::where('masyarakat_id', Auth::user()->id)->first();
        // $kampanye = Kampanye::where('id_pemilihan', $pemilihan->id)->first();

        $request->validate([
            'gambar'    => 'required|mimes:jpg,jpeg,png|max:5000',
            'judul'     => 'required|min:5|max:20|unique:kampanye,judul',
            // 'waktu'     => 'required|date',
            'konten'    => 'required|min:5|max:255',
        ]);
        
        // $gambar     = $request->gambar;
        // $namafile   = $gambar->getClientOriginalName();

        $kampanye = new Kampanye;
        $kampanye->id_pemilihan     = $pemilihan->id;
        $kampanye->judul            = $request->judul;
        $kampanye->waktu            = Date('y-m-d');
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

        return redirect('/Kandidat/dataKampanye');
    }

    public function selengkapnya($id)
    {
        $kampanye = Kampanye::where('id', $id)->first();

        return view('Kampanye.detail', compact('kampanye'));
    }

    public function detail($id){
        $kampanye = DB::table('kampanye')
        -> join('pemilihan','pemilihan.id','=', 'kampanye.id_pemilihan')
        -> join('masyarakat','masyarakat.id','=','pemilihan.masyarakat_id')
        -> select('kampanye.id','kampanye.judul','kampanye.waktu','kampanye.gambar','kampanye.konten','pemilihan.masyarakat_id','masyarakat.nama','pemilihan.nomor_urut')
        -> where('kampanye.id','=',$id)
        -> get();

        $komentar = DB::table('komentar')
        -> join('kampanye','kampanye.id', '=', 'komentar.id_kampanye')
        -> join('masyarakat', 'masyarakat.id', '=', 'komentar.id_masyarakat')
        -> select('kampanye.id','komentar.id','masyarakat.nama', 'komentar.komen','komentar.created_at')
        -> where('id_kampanye','=', $id)
        -> orderBy('created_at','desc')
        -> get();

        return view('Kampanye.detail', compact('kampanye','komentar'));
    }

    public function hapus($id){
        $kampanye = \App\Kampanye::find($id);
        $kampanye->delete();
        
        Session::flash('success', 'Data berhasil dihapus !!');
        return redirect ('/Kandidat/dataKampanye')->with('Data Kampanye Anda telah dihapus');
    }

    public function edit(Request $request, $id){
        $kampanye = Kampanye::findOrFail($id);
       
        return view('Kampanye.edit',compact('kampanye'));
    }

    public function update (Request $request,$id) {
        $kampanye = Kampanye::findOrFail($id);
        $pemilihan = Pemilihan::where('masyarakat_id', Auth::user()->id)->first();
  
        $request->validate([
            'gambar'    => 'mimes:jpg,jpeg,png|max:5000',
            'judul'     => 'required|min:5|max:20|unique:kampanye,judul,'.$kampanye->id,
            // 'waktu'     => 'required|date',
            'konten'    => 'required|min:5|max:255',
        ]);
        
        $kampanye->update([
            $kampanye->id_pemilihan     = $pemilihan->id,
            $kampanye->judul            = $request->judul,
            $kampanye->waktu            = Date('y-m-d'),
            $kampanye->konten           = $request->konten,
        ]);
            if ($request->hasfile('gambar')) {
                $foto         = $request->file('gambar');
                $new_foto     = rand().'.'.$foto->getClientOriginalExtension();
                $foto->move(public_path('img/foto_kampanye/'), $new_foto);
                $kampanye->gambar = $new_foto;
            }

        // $pemilihan->kampanye()->save($kampanye);
        $kampanye->save;

        Session::flash('success', 'Data berhasil disimpan !!');

        return redirect('/Kandidat/dataKampanye');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $kampanye = DB::table('kampanye')
        -> join('pemilihan','pemilihan.id','=', 'kampanye.id_pemilihan')
        -> join('masyarakat','masyarakat.id','=','pemilihan.masyarakat_id')
        -> select('kampanye.id','kampanye.judul','kampanye.waktu','kampanye.gambar','kampanye.konten','pemilihan.masyarakat_id','masyarakat.nama','pemilihan.nomor_urut')
        -> where('judul','like',"%".$cari."%")
        -> paginate();

        Session::flash('info', 'Data berhasil ditemukan !!');

        return view('Kampanye.data', compact('kampanye'));
    }
}

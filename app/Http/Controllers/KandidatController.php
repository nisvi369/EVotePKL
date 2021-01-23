<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Masyarakat;
use \App\Pemilihan;
use \App\Pekerjaan;
use DB;

class KandidatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){
        return view('Kandidat.home');
	}

    public function tambah()
    {
    	// $masyarakat = Masyarakat::all();
        // $masyarakat = Masyarakat::where('level', '!=', 'petugas')->get();
        $masyarakat = DB::table('masyarakat')
        -> join('pekerjaan','pekerjaan.id', '=', 'masyarakat.pekerjaan_id')
        -> select('masyarakat.id','masyarakat.nik','masyarakat.nama','masyarakat.jenis_kelamin','masyarakat.alamat','masyarakat.tanggal_lahir','masyarakat.email','masyarakat.level','pekerjaan.nama_pekerjaan')
        -> where('masyarakat.level', '!=', "petugas")
        -> get();

    	return view('kandidat.tambah', compact('masyarakat'));
    }

    public function cari(Request $request)
    {
    	$cari = $request->cari;

    	$masyarakat = DB::table('masyarakat')
		->where('nik','like',"%".$cari."%")
		->paginate();

		return view('kandidat.tambah', compact('masyarakat'));
    }


    public function detail_kandidat()
    {
    	// $masyarakat = Masyarakat::all();
    	// $pemilihan = Pemilihan::where('masyarakat_id', $masyarakat->id)->first();

        $data = DB::table('masyarakat')
                    ->join('pemilihan', 'pemilihan.masyarakat_id', '=', 'masyarakat.id')
                    ->get();

    	return view('kandidat.detail', compact('data'));
    }

    public function lengkapi_data($id)
    {
        $masyarakat = Masyarakat::where('id', $id)->first();

        return view('kandidat.data', compact('masyarakat'));
    }

    public function create_data(Request $request, $id)
    {
        $masyarakat = Masyarakat::where('id', $id)->first();
        // $pemilihan   = Pemilihan::where('masyarakat_id', $masyarakat->id);
        $request->validate([
            'nomor_urut' => 'required|max:5',
            'jadwal'     => 'required|date',
            'foto'       => 'required|mimes:jpeg,jpg,bmp,png|max:3000',
        ]);

        $pemilihan = new Pemilihan();
        $pemilihan->masyarakat_id   = $masyarakat->id;
        $pemilihan->nomor_urut      = $request->nomor_urut;
        $pemilihan->jadwal          = $request->jadwal;

        if ($request->hasfile('foto')) {
            $gambar                 = $request->file('foto');
            $new_gambar             = rand().'.'.$gambar->getClientOriginalExtension();
            $gambar->move(public_path('img/foto_kandidat'), $new_gambar);
            $pemilihan->foto        = $new_gambar;
            $masyarakat->level      = "kandidat";
            $masyarakat->update();
        }

        // $pemilihan->update();
        $pemilihan->save();

        return redirect('/kandidat');
    }

    public function edit_kandidat($id)
    {
    	$pemilihan = Pemilihan::find($id);

    	return view('kandidat.edit', compact('pemilihan'));
    }

    public function update_kandidat(Request $request, $id)
    {
    	
    	// $pemilihan 	= Pemilihan::where('masyarakat_id', $masyarakat->id);
        $request->validate([
            'foto'          => 'required|mimes:jpg,jpeg,png,bmp|max:3000',
            'nomor_urut'    => 'required|max:5',
            'jadwal'        => 'required|date',
        ]);

        $gambar_lama    = $request->hidden_gambar;
        $gambar         = $request->file('foto');

    	$pemilihan = Pemilihan::where('id', $id)->first();
    	$pemilihan->nomor_urut 	= $request->nomor_urut;
    	$pemilihan->jadwal		= $request->jadwal;
        
        if ($request->hasfile('foto')) {
            $gambar             = $request->file('foto');
            $new_gambar         = rand().'.'.$gambar->getClientOriginalExtension();
            $gambar->move(public_path('img/foto_kandidat'), $new_gambar);
            $pemilihan->foto    = $new_gambar;
        }

    	
    	// $pemilihan->update();
    	$pemilihan->update();


    	return redirect('/kandidat');
    }
}

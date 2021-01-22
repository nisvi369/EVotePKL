<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Masyarakat;
use \App\Pemilihan;
use \App\Hasil;
use DB;

class PemilihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$data = DB::table('masyarakat')
                    ->join('pemilihan', 'pemilihan.masyarakat_id', '=', 'masyarakat.id')
                    ->get();

    	return view('pemilihan.index', compact('data'));
    }

    public function pilih_kandidat(Request $request, $id)
    {
    	$masyarakat    = Masyarakat::where('id', $id)->first();
    	$pemilihan     = Pemilihan::where('id', $id)->first();

    	$hasil = new Hasil();
        $hasil->masyarakat_id 	= 1;
        $hasil->pemilihan_id	= $pemilihan->id;
        // $hasil->hasil_pilihan	= $request->nomor;
        $hasil->save();

    	return view('pemilihan.grafik', compact('hasil'));
    }

    public function grafik()
    {
    	$hasil = [];

    	$pemilihan = Pemilihan::get();
        
    	foreach ($pemilihan as $key => $pilihan) {
    		$pemilihan_id = $pilihan->id;
    		$no_urut      = $pilihan->nomor_urut;
    		$total        = Hasil::where('pemilihan_id', $pemilihan_id)->count();

    		$a['name']    = 'Nomor Urut: '.$no_urut;
    		$a['y']       = $total;
    		array_push($hasil, $a);
    	}
    	return view('pemilihan.grafik', compact('hasil'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pemilihan;
use \App\Hasil;
use App\Periode;
use DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){

    	 $jumlah_masyarakat = DB::table('masyarakat')
    	-> count();

    	$jumlah_petugas = DB::table('petugas')
    	-> count();

    	$jumlah_kampanye = DB::table('kampanye')
    	-> count();

    	$tanggal = DB::table('periode')
    	-> orderBy('tanggal','asc')
    	-> first();


    	$hasil = [];

        $periode = Periode::get();

        $pemilihan = Pemilihan::get();

        
        foreach ($pemilihan as $key => $pilihan) {
            $pemilihan_id = $pilihan->id;
            $no_urut      = $pilihan->nomor_urut;
            $total        = Hasil::where('pemilihan_id', $pemilihan_id)->count();

            $a['name']    = 'Nomor Urut: '.$no_urut;
            $a['y']       = $total;
            array_push($hasil, $a);
        }
        return view('Admin.home', compact('hasil','jumlah_kampanye','jumlah_petugas','jumlah_masyarakat','tanggal','periode'));
	}
}

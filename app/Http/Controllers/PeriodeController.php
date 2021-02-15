<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Periode;
use DB;
use Auth;
use Session;

class PeriodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$tanggal_awal = Periode::orderBy('tanggal', 'asc')->first();
		$tanggal_akhir = Periode::orderBy('tanggal', 'desc')->first();

        $periode = Periode::all();
		// $waktu_mulai = Periode::orderBy('waktu','asc')->first();
		// $waktu_akhir = Periode::orderBy('waktu_akhir','asc')->first();

		return view('periode.index', compact('tanggal_awal', 'tanggal_akhir', 'periode'));
		// return view('periode.index', compact('tanggal_awal', 'waktu_mulai', 'waktu_akhir'));
    }

    public function atur_periode(Request $request)
    {
		$tanggal_awal 	= $request->tanggal_awal;
		$tanggal_akhir 	= $request->tanggal_akhir;
		// $waktu_mulai = $request->waktu_mulai;
		// $waktu_akhir = $request->waktu_akhir;

    	$tanggal1 = date('Y-m-d H:i:s', strtotime($tanggal_awal));
		$tanggal2 = date('Y-m-d H:i:s', strtotime($tanggal_akhir));
		// $waktu1 = date('H:i:s', strtotime($waktu_mulai));
		// $waktu2 = date('H:i:s', strtotime($waktu_akhir));

        \DB::table('periode')->delete();

    	if ($tanggal1 <= $tanggal2) {
    		$periode = new Periode;
			$periode->tanggal = $tanggal1;
			$periode->tanggal_akhir = $tanggal2;
			// $periode->waktu = $waktu1;
			// $periode->waktu_akhir = $waktu2;
    		$periode->save();

			$tanggal1 = date('Y-m-d', strtotime('+1 days', strtotime($tanggal1)));
    	}

        Session::flash('success', 'Berhasil melakukan set periode !!');

        return redirect()->back();
    }
}

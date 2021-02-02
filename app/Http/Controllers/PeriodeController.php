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

        return view('periode.index', compact('tanggal_awal', 'tanggal_akhir'));
    }

    public function atur_periode(Request $request)
    {
        $tanggal_awal   = $request->tanggal_awal;
        $tanggal_akhir  = $request->tanggal_akhir;

        $tanggal1 = date('Y-m-d', strtotime($tanggal_awal));
        $tanggal2 = date('Y-m-d', strtotime($tanggal_akhir));

        \DB::table('periode')->delete();

        while ($tanggal1 <= $tanggal2) {
            $periode = new Periode;
            $periode->tanggal = $tanggal1;
            $periode->save();

            $tanggal1 = date('Y-m-d', strtotime('+1 days', strtotime($tanggal1)));
        }

        Session::flash('success', 'Berhasil melakukan set periode !!');

        return redirect()->back();
    }
}

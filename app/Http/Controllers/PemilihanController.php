<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Masyarakat;
use \App\Pemilihan;
use \App\Hasil;
use \App\Periode;
use Auth;
use DB;
use Session;

class PemilihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tanggal_awal   = Periode::orderBy('tanggal', 'asc')->first();
        $tanggal_akhir  = Periode::orderBy('tanggal', 'desc')->first();

        $data = DB::table('masyarakat')
        ->join('pemilihan', 'pemilihan.masyarakat_id', '=', 'masyarakat.id')
        ->get();

        return view('pemilihan.index', compact('data', 'tanggal_awal', 'tanggal_akhir'));
    }

    public function pilih_kandidat(Request $request, $id)
    {
        $masyarakat    = Masyarakat::where('id', $id)->first();
        $pemilihan     = Pemilihan::where('id', $id)->first();

        $tanggal_sekarang = date('Y-m-d');
        $cek_tanggal = Periode::where('tanggal', $tanggal_sekarang)->count();

        if ($cek_tanggal > 0) {

            $hasil = new Hasil();
            $hasil->masyarakat_id   = Auth::user()->id;
            $hasil->pemilihan_id    = $pemilihan->id;
            $hasil->save();

            // $hasil = Hasil::firstOrCreate(
            //     ['masyarakat_id'=>\Auth::user()->id],
            //     ['pemilihan_id'=>$id,'masyarakat_id'=>\Auth::user()->id]
            // );
            Session::flash('success', 'Berhasil melakukan voting !!');

            return redirect('pemilihan');

        }else{

            Session::flash('info', 'Anda sudah melakukan voting !!');

            return redirect()->back();
        }
        

        // return view('pemilihan.grafik', compact('hasil'));
        
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

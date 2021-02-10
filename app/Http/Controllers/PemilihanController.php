<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Masyarakat;
use \App\Pemilihan;
use \App\Hasil;
use \App\Periode;
use \App\Kampanye;
use Auth;
use DB;
use Session;

use App\Exports\HasilExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PemilihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tanggal_awal   = Periode::orderBy('tanggal', 'asc')->first();
        $tanggal_akhir  = Periode::orderBy('tanggal_akhir', 'desc')->first();
        // $waktu_mulai = Periode::orderBy('waktu','asc')->first();
        // $waktu_akhir = Periode::orderBy('waktu','asc')->first();
        // $periode = \App\Periode::all();
        $data = DB::table('masyarakat')
        ->join('pemilihan', 'pemilihan.masyarakat_id', '=', 'masyarakat.id')
        ->orderBy('pemilihan.nomor_urut', 'asc')
        ->get();

        // return view('pemilihan.index', compact('data','tanggal_awal','waktu_mulai', 'waktu_akhir'));
        return view('pemilihan.index', compact('data','tanggal_awal', 'tanggal_akhir'));
    }

    public function pilih_kandidat(Request $request, $id)
    {
        $masyarakat    = Masyarakat::where('id', $id)->first();
        $pemilihan     = Pemilihan::where('id', $id)->first();

        $tanggal_sekarang = date('Y-m-d H:i:s');
        // $tanggal_sekarang = '2021-02-05 00:00';

        $cek_tanggal = Periode::where('tanggal', '<=', $tanggal_sekarang)->count();
        
        $cek_tanggal_akhir = Periode::where('tanggal_akhir', '>=', $tanggal_sekarang)->count();
        
        if ($cek_tanggal > 0 && $cek_tanggal_akhir > 0) {

            $hasil = new Hasil();
            $hasil->masyarakat_id   = Auth::user()->id;
            $hasil->pemilihan_id    = $pemilihan->id;
            $hasil->save();

            // $hasil = Hasil::firstOrCreate(
            //     ['masyarakat_id'=>\Auth::user()->id],
            //     ['pemilihan_id'=>$id,'masyarakat_id'=>\Auth::user()->id]
            // );
            Session::flash('success', 'Berhasil melakukan voting !!');

            return redirect()->back();

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

    public function reset_data(Request $request)
    {
        $masyarakat = Masyarakat::where('level',"kandidat")->get();

        foreach ($masyarakat as $mas) {
            $mas->level      = "pemilih";
            $mas->update();
        }

        \DB::table('periode')->delete();
        \DB::table('hasil')->delete();
        \DB::table('kampanye')->delete();
        \DB::table('pemilihan')->delete();
        

        // $reset = $request->reset_db;

        // if ($reset) {
        //     // $masyarakat->level      = "pemilih";
        //     // $masyarakat->update();

        //     // \DB::table('periode')->delete();
        //     // \DB::table('pemilihan')->delete();
        //     // \DB::table('kampanye')->delete();
        //     // \DB::table('hasil')->delete();

        //     Session::flash('success', 'Data Berhasil di RESET !!');

        //     return view('Pemilihan.grafik');
        // }

        Session::flash('info', 'Data Berhasil di RESET !!');

        return redirect()->back();
        
    }


    public function export(){
		return Excel::download(new HasilExport, 'hasil.xlsx');
	}

    public function hasilPDF()
    {
        $hasil = Hasil::all();
        // $pemilihan = Pemilihan::all();
        $pemilihan = DB::table('masyarakat')
                    ->join('pemilihan', 'pemilihan.masyarakat_id', '=', 'masyarakat.id')
                    ->join('pekerjaan','pekerjaan.id', '=', 'masyarakat.id_pekerjaan')
                    ->select('masyarakat.id','masyarakat.nik','masyarakat.nama','masyarakat.jenis_kelamin','masyarakat.alamat','masyarakat.tanggal_lahir','masyarakat.email','pemilihan.nomor_urut','pekerjaan.nama_pekerjaan')
                    ->orderBy('pemilihan.nomor_urut', 'asc')
                    ->get();

        $hasil_grafik = [];

        $pilih = Pemilihan::get();
        
        foreach ($pilih as $key => $pilihan) {
            $pemilihan_id = $pilihan->id;
            $no_urut      = $pilihan->nomor_urut;
            $total        = Hasil::where('pemilihan_id', $pemilihan_id)->count();

            $a['name']    = 'Nomor Urut: '.$no_urut;
            $a['y']       = $total;
            array_push($hasil_grafik, $a);
        }

        // $pdf = PDF::loadview('Pemilihan.hasil_pdf', compact('hasil', 'pemilihan'))->setOptions(['defaultFont' => 'sans-serif']);
        // return $pdf->stream();

        return view('Pemilihan.hasil_pdf', compact('hasil', 'pemilihan', 'hasil_grafik'));
    }

}

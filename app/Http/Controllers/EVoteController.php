<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use \App\Pemilihan;
use \App\Hasil;
use \App\Kampanye;


class EVoteController extends Controller
{
    public function landing(){
        $kampanye = \App\Kampanye::orderBy('id', 'asc')->get();

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

        return view ('landingPage', compact('kampanye', 'hasil'));
    }

    public function signIn(){
        return view('signIn');
    }

    // public function postSignIn(Request $request){
    //     $this->validate($request, [
    //         'akun'      => 'required',
    //         'password'  => 'required'
    //     ]);

    //     if (Auth::guard('petugas')->attempt(['akun' => $request->akun, 'password' => $request->password])) {
    //         return view('Petugas.home');
    //     }elseif (Auth::guard('masyarakat')->attempt(['akun' => $request->akun, 'password' => $request->password])){
    //         return view('Masyarakat.home');
    //     }
    // }
}

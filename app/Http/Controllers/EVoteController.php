<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EVoteController extends Controller
{
    public function landing(){
        $kampanye = \App\Kampanye::orderBy('id', 'asc')->take(2)->get();
        return view ('landingPage', compact('kampanye'));
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

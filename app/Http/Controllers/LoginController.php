<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function postlogin (Request $request)
    {
        // dd($request->all());

        // if (Auth::attempt($request->only('email', 'password'))) {
        //  return redirect('/home');
        // }

        if (Auth::guard('masyarakat')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::flash('info', 'Anda Berhasil Masuk !!');
            return redirect('Masyarakat/home');
        }elseif (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::flash('info', 'Anda Berhasil Masuk !!');
            return redirect('Admin/home');
        }elseif (Auth::guard('petugas')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::flash('info', 'Anda Berhasil Masuk !!');
            return redirect('Petugas/home');
        }

        Session::flash('error', 'Email atau Password salah !!');

        return redirect('/');
    }

    public function logout(Request $request)
    {
        // dd($request->all());
        if (Auth::guard('masyarakat')->check()){
            Auth::guard('masyarakat')->logout();
        }elseif (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }elseif (Auth::guard('petugas')->check()) {
            Auth::guard('petugas')->logout();
        }
        // Auth::logout();
        Session::flash('info', 'Anda Berhasil Logout !!');

        return redirect('/');
    }

}

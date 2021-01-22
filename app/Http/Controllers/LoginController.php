<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function postlogin (Request $request)
    {
    	// dd($request->all());

    	// if (Auth::attempt($request->only('email', 'password'))) {
    	// 	return redirect('/home');
    	// }

    	if (Auth::guard('masyarakat')->attempt(['email' => $request->email, 'password' => $request->password])) {
    		return redirect('Masyarakat/home');
    	}elseif (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
    		return redirect('Admin/home');
    	}

    	return redirect('/');
    }

    public function logout(Request $request)
    {
    	// dd($request->all());
    	if (Auth::guard('masyarakat')->check()){
    		Auth::guard('masyarakat')->logout();
    	}elseif (Auth::guard('user')->check()) {
    		Auth::guard('masyarakat')->logout();
    	}
    	// Auth::logout();

    	return redirect('signIn');
    }

}

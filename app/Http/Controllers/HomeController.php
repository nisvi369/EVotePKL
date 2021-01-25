<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function tentang(){
        return view('tentang');
    }


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function profil_saya($id)
    {
        $user = User::find($id);
        return view('admin.profil_saya', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit_profil', compact('user'));
    }
}
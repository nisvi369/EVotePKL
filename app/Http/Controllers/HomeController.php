<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
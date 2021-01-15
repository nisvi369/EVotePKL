<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EVoteController extends Controller
{
    public function landing(){
        return view ('landingPage');
    }

    public function login(){
        return view('login');
    }
}

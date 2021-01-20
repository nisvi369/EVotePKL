<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function __construct(){
        $this->middleware('Admin');
    }

    public function home(){
        return view('Admin.home');
	}
}

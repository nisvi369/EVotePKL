<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifiedMail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(1);
    }

    public function index()
    {
        $batas = 5;
        $user = User::orderBy('id')->paginate($batas);
        $jumlah_user = $user->count();
        $no = $batas * ($user->currentPage() - 1);
        return view('admin.manaj_user', compact('user', 'no', 'jumlah_user'));
    }

    public function create()
    {
        return view('admin.create');
    }

}

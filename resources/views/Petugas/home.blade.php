@extends('template.master')

@section('title', 'Dashboard')

@section('content')

<div class="jumbotrondash">
    <!-- @if (Auth::check() && Auth::user()->role_id == 1)
    <div class="container judul">
        <h1>SELAMAT DATANG ADMIN!</h1>
    </div> -->
    <!-- @else
    @if (Auth::check() && Auth::user()->role_id == 2 && Auth::user()->status_akun == 'Terverifikasi') -->
    <div class="container judul">
        <h1>SELAMAT DATANG</h1>
    </div>
    <!-- @else
    @if (Auth::check() && Auth::user()->role_id == 2 && Auth::user()->status_akun == 'Belum Terverifikasi')
    <div class="container judul">
        <h1>SILAHKAN MENUNGGU VERIFIKASI ADMIN ANDA</h1>
    </div>
    @endif
    @endif
    @endif -->



</div>

@endsection
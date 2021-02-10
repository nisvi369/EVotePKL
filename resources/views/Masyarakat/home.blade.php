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
        <h1>SELAMAT DATANG {{ Auth::masyarakat()->nama }}!</h1>
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
<div class="menu">
  <!-- <div class="col-md-12 judul">
          <h1>KAMPANYE KANDIDAT </h1>
  </div> -->
  <div class="row">
    @foreach($kampanye as $k)
    <div class="box col-md-12 shadow-sm p-3 mb-5 bg-white rounded">  
      <h1 class="text-center">{{$k->judul}}</h1>
      <p>
        <img src="{{ url('img/foto_kampanye') }}/{{$k->gambar}}" class="rounded ml-2 mr-2" style="float: left" height="30%" width="30%" alt="">
          {{$k->konten}}
      </p>
      <div class="aksi1">
        <a href="/Masyarakat/detail">More<a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
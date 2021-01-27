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
      <div class="box col-md-12 shadow-sm p-3 mb-5 bg-white rounded">
          <h1 class="text-center">HALOO</h1>
          <p>
            <img src="/img/kampanye/2.jpg" class="rounded ml-2 mr-2" style="float: left" height="30%" width="30%" alt="">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <div class="aksi1">
            <a href="#">More<a>
          </div>
      </div>
          <!-- <div class="col-lg-4">
            <div class="box">
              <img src="/img/kampanye/2.jpg" height="100%" width="100%" alt="" srcset="">
              <h4>apaaaaa</h4>
              <h6>embuhh</h6>
              <p style="text-align: justify">lallalalal</p>
              <div class="aksi1">
                <a href="#">More<a>
              </div><hr>
            </div>
          </div> -->
      </div>
    </div>
@endsection
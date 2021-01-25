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
<br>
<div class="menu">
<div class="judul">
        <h1>KAMPANYE KANDIDAT </h1>
</div>
<div class="row">
          <div class="col-lg-4">
            <div class="box">
              <img src="/img/kampanye/2.jpg" height="100%" width="100%" alt="" srcset="">
              <h4>apaaaaa</h4>
              <h6>embuhh</h6>
              <p style="text-align: justify">lallalalal</p>
              <div class="aksi1">
                <a href="#">More<a>
              </div><hr>
            </div>
          </div>
        </div>
        </div>
@endsection
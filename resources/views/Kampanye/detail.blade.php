@extends('template.master')

@section('title', 'Data Kampanye')

@section('content')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
</head>
<div class="container">
    <div class="row">
        <div class="more">
            @foreach($kampanye as $k)
            <center><h1>{{$k->judul}}</h1></center>
            <center>
            <div>
                <img src="{{ asset('img/foto_kampanye') }}/{{ $k->gambar }}" height="70%" width="40%" alt="" srcset="">
            </div>
            </center>
            <center><h5>Ditulis oleh {{$k->nama}} nomor urut {{$k->nomor_urut}}</h5></center>
            <br>
            <h5>Ditulis pada {{$k->waktu}}</h5>
            <p>{{$k->konten}}</p>
            <!-- <a href="/eventsaya" class="btn btn-light btn-sm">Kembali</a> -->
            @endforeach
        </div>
    </div>
</div>

<div class="container mb-3">
	<h2 align="center" style="margin: 60px 10px 10px 10px;">Komentar Masyarakat</h2><hr>
	@foreach($kampanye as $kam)
        @if(auth()->user()->level == 'pemilih' || auth()->user()->level == 'kandidat')
        <form action="{{ url('/buatKomentar') }}/{{ $kam->id }}" method="POST" class="col-md-12">
            @csrf
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

            <div class="form-group">
                <p>Tulis Komentar</p>
                <input type="text" class="form-control" name="komen">
            </div><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @endif
    @endforeach
    @foreach($komentar as $kom)
    <div class="media mb-4">
        <div class="media-body">
        <h5 class="mt-0">{{ $kom->nama }}</h5>
        <h6>{{$kom->created_at}}</h6>
        <p>{{ $kom->komen }}</p>
        </div>
    </div>
    @endforeach
</div>

@endsection
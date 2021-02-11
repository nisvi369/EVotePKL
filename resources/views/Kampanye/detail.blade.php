@extends('template.master')

@section('title', 'Data Kampanye')
<link rel="stylesheet" href="{{ asset('css/dash.css') }}">
@section('content')
<div class="jumbotron">
    @foreach($kampanye as $k)
        <section id="event" class="events">
      <div class="container">
        <div class="section-title">
          <h2>{{$k->judul}}</h2>
        </div>
        <div class="owl-carousel events-carousel">
          <div class="row event-item">
            <div class="col-lg-6">
              <div><img src="{{ asset('img/foto_kampanye') }}/{{ $k->gambar }}" class="img-fluid" alt=""></div>
            </div>
            <div class="col-lg-6 pt-lg-0 content">
              <h3>Ditulis oleh {{$k->nama}} nomor urut {{$k->nomor_urut}}</h3>
              <div class="price">
                <p>Ditulis pada {{$k->waktu}}</p>
              </div>
              <p>
                  {{$k->konten}}
              </p>
            </div>
          </div>
    </section><!-- End Events Section -->
</div>

<div class="container mb-3">
	<h2 align="center" style="margin: 60px 10px 10px 10px;">Komentar Masyarakat</h2><hr>
	@foreach($kampanye as $kam)
    <form action="{{ url('/buatKomentar') }}/{{ $kam->id }}" method="POST" class="col-md-12">
        @csrf
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
        <!-- <div class="form-group">
            <p>Nama</p>
            <input type="text" class="form-control" name="nama">
        </div> -->
        <div class="form-group">
            <p>Tulis Komentar</p>
            <input type="text" class="form-control" name="komen">
        </div><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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

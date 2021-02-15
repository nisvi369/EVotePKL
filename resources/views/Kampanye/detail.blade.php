@extends('template.master')

@section('title', 'Data Kampanye')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
</head>
<div class="jumbotrondash">
<div class="isi">
    <marquee><h1 class="lead animasi-text">KAMPANYE ONLINE</h1></marquee>
</div>
@foreach($kampanye as $k)
    <section id="event" class="events">
      <div class="container">
        <div class="section-title">
          <h2>{{$k->judul}}</h2>
        </div>
        <div class="owl-carousel events-carousel">
          <div class="row event-item">
            <div class="col-lg-6">
            <div>
                <img src="{{ asset('img/foto_kampanye') }}/{{ $k->gambar }}" height="70%" width="40%" alt="" srcset="">
            </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Ditulis:{{$k->nama}} nomor urut {{$k->nomor_urut}}</h3>
              <div class="price">
                <p><span1>Ditulis pada {{$k->waktu}}</span1></p>
              </div>
              <p>
              {{$k->konten}}
              </p>
            </div>
          </div>
    </section>
    @endforeach<!-- End Events Section -->
</div>

<div class="container mb-3">
	<h2 align="center" style="margin: 30px 10px 10px 10px;">Komentar Masyarakat</h2><hr>
	@foreach($kampanye as $kam)
        @if(auth()->user()->level == 'pemilih' || auth()->user()->level == 'kandidat')
        <form action="{{ url('/buatKomentar') }}/{{ $kam->id }}" method="POST" class="col-md-12">
            @csrf
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

            <div class="form-group">
                <textarea type="text" class="form-control" name="komen" placeholder="Tulis Komentar">
           </textarea></div>
            <button type="submit" class="btn btn-primary" style="float:right;">Submit</button>
        </form>
        @endif
    @endforeach
    @foreach($komentar as $kom)
    <br>
    <div class="bubble-list">
		<div class="bubble clearfix">
    <h5 class="mt-0">{{ $kom->nama }}</h5>
			<div class="bubble-content">
				<div class="point"></div>
        <h6>{{$kom->created_at}}</h6>
				<p>{{ $kom->komen }}</p>
			</div>
		</div>
    @endforeach
</div>
</div>

@endsection


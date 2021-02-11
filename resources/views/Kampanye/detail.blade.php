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
@endforeach
</div>
</div>

@endsection


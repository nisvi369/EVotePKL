@extends('template.master')

@section('title', 'Dashboard')
<link rel="stylesheet" href="{{ asset('css/dash.css') }}">

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="isi">
    <marquee><h1 class="lead animasi-text">SELAMAT DATANG</h1></marquee>
</div>
<!-- ======= Events Section ======= -->
    <section id="event" class="events">
      <div class="container">
        <div class="section-title">
          <h2>Mari Gunakan <span>SuaraMu</span> Untuk Masa depan Jember</h2>
        </div>
        <div class="owl-carousel events-carousel">
          <div class="row event-item">
            <div class="col-lg-6">
              <div id="voting"></div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Hasil Voting</h3>
              <div class="price">
                <p><span>Pemilihan Bupati </span></p>
              </div>
              <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur
              </p>
            </div>
          </div>
    </section><!-- End Events Section -->
</div>
 <!-- bagian Kampanye  -->
 <section id="kampanye" class="chefs">
      <div class="container">

        <div class="section-title-center">
          <h2>Kampanye Terbuka<span>"Mari Memilih"</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">

          @foreach($kampanye as $k)
          <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{ asset('img/foto_kampanye') }}/{{ $k->gambar }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>{{ $k->judul }}</h4>
                <span1>{{substr($k->konten,0,200)}}</span1>
                <br>
                <div id="button"><a href="/detail/{{$k->id}}" class="btn btn-info">Selengkapnya</a></div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- End kampanye -->
@endsection

@section('grafik')
<script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
      Highcharts.chart('voting', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
          },
          title: {
              text: 'Hasil Voting'
          },
          tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          accessibility: {
              point: {
                  valueSuffix: '%'
              }
          },
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                      enabled: true,
                      format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                  }
              }
          },
          series: [{
              name: 'Brands',
              colorByPoint: true,
              data: {!! json_encode($hasil) !!}
          }]
      });

    </script>
@endsection

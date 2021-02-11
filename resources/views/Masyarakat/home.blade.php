@extends('template.master')

@section('title', 'Dashboard')
<link rel="stylesheet" href="{{ asset('css/dash.css') }}">
@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="isi">
    <marquee><h1 class="lead animasi-text">SELAMAT DATANG</h1></marquee>
</div>
<div class="row">
        <div class="col-md-4">  
            <img src="{{ asset('/img/kotak.png') }}" alt="">
        </div>
        <div class="col-md-6">
            <h1 class="display-4"><span>EVOTING</span></h1>
            <p >We're working hard to finish the development of this site. Our target launch date is
              <strong>January 2022</strong>! Sign up for updates using the form below!</p>
</div>
</div>
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
                <span>{{ substr($k->konten, 0, 120) }}</span>
                <br>
                <div id="button"><a href="/Masyarakat/detail/{{$k->id}}" class="btn btn-info">Selengkapnya</a></div>
              </div>
            </div>
          </div>
          @endforeach

          <!-- <div class="col-lg-4 col-md-6">
            <div class="member">
            <br><br><br>
              <div class="pic"><img src="{{ asset('img/kampanye/3.jpg') }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>AYo Pilih No.2</span>
                <br>
                <div id="button"><a href="#popup2" class="btn btn-info">Selengkapnya</a></div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
            <br><br><br>
              <div class="pic"><img src="{{ asset('img/kampanye/4.jpg') }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Mari Jadikan Kota Jemebr menjadi kota yang bersih dari polusi </span>
                <br>
                <div id="button"><a href="#popup2" class="btn btn-info">Selengkapnya</a></div>
              </div>
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End kampanye -->


    <!-- ======= Events Section ======= -->
    <section id="event" class="events">
      <div class="container">
        <div class="section-title">
          <h2>Mari Gunakan <span>SuaraMu</span> Untuk Masa depan SULBAR</h2>
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

 
    <section id="tentang" class="section-bg-dark">
    <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Tentang Kami</h2>
                    <br><br>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('img/1.png')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>E-Voting?</h4>
                                <h4 class="subheading"></h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Electronic Voting yang mengacu pada penggunaan teknologi informasi pada pelaksanaan pemungutan suara </p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('img/about/pilih.png')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Kampanye</h4>
                                <h4 class="subheading">Kampanye Online ? </h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Memungkinkan semua kandidat dapat menyampaikan kampanye secara terbuka melalui media yang disediakan didalam website ini</p></div>
                        </div>
                    </li>
                    <!-- <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Ayo
                                <br />
                                Gunakan 
                                <br />
                                Hak Suaramu!!
                            </h4>
                        </div>
                    </li> -->
                </ul>
            </div>
    </section>
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

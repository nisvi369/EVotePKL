<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <title>VoJr (Vote Jember)</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/1.png')}}" />

    <style type="text/css">
        ul l{
            float: right;
        }
    </style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">VoJr</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active mr-2" aria-current="page" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-2" href="#kampanye">Kampanye</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-2" href="#event">Hasil Voting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-2" href="#tentang">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-2" href="#layanan">Layanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-2" href="#kontak">Kontak</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    {{-- Jumbotron --}}
    <div class="jumbotron jumbotron-fluid">
        <div class="col-md-4">
            <img src="/img/kotak.png" alt="">
        </div>
        <div class="col-md-6">
            <h1 class="display-4"><span>VoJr (Vote Jember)</span></h1>
            <p>We're working hard to finish the development of this site. Our target launch date is
              <strong>January 2022</strong>! Sign up for updates using the form below!</p>
            <div class="jumbotronlgn">
                <div class="container">
                    <div id="button"><a href="#popup" class="btn btn-info">Login Sekarang</a></div>
                        <div id="popup" class="row justify-content-center mt-4">
                            <div class="col-mr-auto mt-4">
                                <div class="container text-center logo">
                                    <img src="/img/1.png" alt="">
                                </div>
                                <div class="container as" style="background-color: white">
                                    <div class="text-center">
                                        <form method="POST"  id="login-form" action="{{ route('postlogin') }}">
                                            @csrf
                                            <div class="container clgn">
                                                <h3 class="lgn">VoJr</h3>
                                                <a href="#" class="close-button" title="close">X</a>
                                            </div>

                                            <div class="form-group text-center spnemail">
                                                <div class="row">
                                                    <label for="email" class="col">Email</label>
                                                </div>

                                                <div class="row text-center">
                                                    <div class="col"></div>
                                                    <div class="col form-horizontal text-center">
                                                        <input id="email" type="akun"
                                                            class="form-control @error('username') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col"></div>
                                                </div>
                                            </div>

                                            <div class="form-group border-0 text-center spnpassword">
                                                <div class="row">
                                                    <label for="password" class="col">Password</label>
                                                </div>

                                                <div class="row text-center">
                                                    <div class="col"></div>
                                                    <div class="col form-horizontal">
                                                        <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                                            required autocomplete="current-password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col"></div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="container cn">
                                                    <button type="submit"  id="signin" class="tmbl" >
                                                        LOGIN
                                                    </button>
                                                </div>
                                            </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
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
                <span1>{{ substr($k->konten, 0, 120) }}</span1>
                <br>
                <div id="button"><a href="#popup2" class="btn btn-info">Selengkapnya</a></div>
                <div id="popup2">
               <div class="window">
                <a href="#" class="close-button" title="close">x</a>
                <h5>Silahkan Login Terlebih dahulu</h5>
            </div>
        </div>
              </div>
            </div>
          </div>
          @endforeach

          <!-- <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/kampanye/3.jpg" class="img-fluid" alt=""></div>
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
              <div class="pic"><img src="img/kampanye/4.jpg" class="img-fluid" alt=""></div>
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
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{('img/1.png')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>E-Voting?</h4>
                                <h4 class="subheading"></h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Electronic Voting yang mengacu pada penggunaan teknologi informasi pada pelaksanaan pemungutan suara </p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{('img/vote.png')}}" alt="" /></div>
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
    <section id="layanan" class="section-bg">
        <div class="container">
            <h1 class="text-center">Layanan Kami</h1>
        </div>
        <br><br>
        <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{('img/kpu.png')}}" alt="" />
                            <h4>Evoting</h4>
                            <p class="text-muted"></p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{('img/wah.png')}}" alt="" />
                            <h4>Kampanye</h4>
                            <p class="text-muted"></p>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{('img/vote.png')}}" alt="" />
                            <h4>Tugas PKL 2020</h4>
                            <p class="text-muted"></p>
                        </div>
                    </div>
                </div>
    </section>

    <footer class="page-section bg-dark" id="kontak" style="height: 400px; background-size: cover; background-image: url('img/kampanye/Peta Indonesia.png' );">
        <div class="text-center">
            <h2 class="section-heading text-uppercase" style="color: white;">Hubungi Kami</h2>
            <h3 class="section-subheading text-muted">kami Memberi yang.....</h3>
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <a class="btn btn-primary btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-primary btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-primary btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
            <p class="text-center mt-5">
              <b>Copyright &copy; 2020 PKL </b>
            </p>
    </footer>

    <!-- <footer id="main-footer" class="bg-dark p-1 mt-4" >
        <div class="footer">
            <p class="text-center">
              <b>Copyright &copy; 2020 PKL </b>
            </p>
        </div>

    </footer> -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <!-- TAMBAHAN TOASTR -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    @include('template.alert')

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
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
</body>

</html>

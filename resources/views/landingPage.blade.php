<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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

    <title>EVOTING</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/1.png')}}" />

    <style type="text/css">
        ul l{
            float: right;
        }
    </style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">EVote</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active mr-2" aria-current="page" href="{{ url('/') }}">Home</a>
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
            <h1 class="display-4"><span>EVOTING</span></h1>
            <!-- <p class="lead animasi-teks">We're working hard to finish the development of this site. Our target launch date is
              <strong>January 2022</strong>! Sign up for updates using the form below!</p> -->
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
                                                <h3 class="lgn">EVOTING</h3>
                                            </div>

                                            <div class="form-group text-center spnemail">
                                                <div class="row">
                                                    <label for="email" class="col">Email atau NIK</label>
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
                                                    <button type="submit"  id="signin" class="btn btn-info tmbl" >
                                                        LOGIN
                                                    </button>
                                                </div>
                                                <!-- <div class="container lppswrd">
                                                    @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Lupa Password?') }}
                                                    </a>
                                                    @endif
                                                </div> -->
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
    <section id="artikel" class="section-bg">
        <div class="menu">
            <div class="row">
                <div class="box col-md-12 shadow-sm p-3 mb-5 bg-white rounded">
                    <h1 class="text-center">HALOO</h1>
                    <p>
                        <img src="/img/kampanye/4.jpg" class="rounded ml-2 mr-2" style="float: left" height="30%" width="30%" alt="">
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
            </div>
        </div>
    </section>
    <section id="tentang" class="section-bg">
        <div class="container">
            <h1 class="text-center">Tentang Kami</h1>
        </div>
    </section>
    <section id="layanan" class="section-bg">
        <div class="container">
            <h1 class="text-center">Layanan Kami</h1>
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

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
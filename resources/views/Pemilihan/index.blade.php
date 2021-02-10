@extends('template.master')

@section('title', 'Voting')

@section('content')
    <h1 class="text-center mt-4 mb-4">Voting</h1>
    <div class="container">
      @if(Auth()->user()->level == 'admin')
      <a href="{{ url('/Admin/hasil_voting') }}" class="btn btn-success mb-4">Hasil Voting</a>
      <a href="{{ url('/Admin/exportHasil') }}" class="btn btn-success mb-4">Export to Excel</a>
      @endif
      <div class="alert alert-warning" role="alert">
      <?php
      //  $now = date('d-m-y H:i:s');
      $now = Carbon\carbon::now();
      ?>
      @if($now < ($tanggal_awal->tanggal_awal))
        <center><h4>Pemilihan Dimulai Tanggal {{ $tanggal_awal->tanggal }} dan Berakhir pada {{ $tanggal_akhir->tanggal_akhir }}</h4></center>
        <!-- <div id="countdown"></div> -->
      @elseif($now > ($tanggal_akhir->tanggal_akhir))
        <center><h4>WAKTU PEMILIHAN TELAH BERAKHIR</h4></center>
      @endif
      <div id="countdown"></div>
      {{$now}} <br>
      {{$tanggal_awal->tanggal}} <br>
      {{$tanggal_akhir->tanggal_akhir}}
      
    </div>  
    <div class="row justify-content-center">
            <!-- <div class="col-md-12 mt-4">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pemilihan</li>
                  </ol>
                </nav>
            </div> -->

            <?php
                $hide  = \App\Hasil::where('masyarakat_id', Auth::user()->id)->first();
            ?>

            @foreach($data as $kandidat)
            @if($kandidat->level == "kandidat")
            <div class="col-md-4 text-center">
                <div class="shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                  <h1 class="card-title text-center">{{ $kandidat->nomor_urut }}</h1>
                  <img src="{{ url('img/foto_kandidat') }}/{{ $kandidat->foto }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $kandidat->nama }}</li>
                  </ul>
                  <div class="card-body">
                    <form action="{{ url('pilih') }}/{{ $kandidat->id }}" method="POST">
                      @csrf
                      <!-- <input type="radio" name="nomor" id="nomor"> <br> -->
                      @if(Auth()->user()->level != 'admin')
                        @if(empty($hide))
                        <button type="submit" class="btn btn-primary">Pilih</button>
                        @else
                        <p style="color: red;">Sudah Memilih</p>
                        @endif
                      @endif
                    </form>
                  </div>
                </div>
            </div>
            @endif
            @endforeach
            
       </div>
   </div>
@endsection
<script>
	CountDownTimer('{{$tanggal_awal->tanggal}}', 'countdown');
	function CountDownTimer(dt, id)
	{
		var end = new Date('{{$tanggal_awal->tanggal}}');
    var tanggal_akhir = new Date('{{$tanggal_akhir->tanggal_akhir}}')
		var _second = 1000;
		var _minute = _second * 60;
		var _hour = _minute * 60;
		var _day = _hour * 24;
		var timer;
		function showRemaining() {
			var now = new Date();
			var distance = tanggal_akhir - now;
			if (distance < 0) {
				clearInterval(timer);
        var days_akhir = Math.floor(distance / _day);
				var hours_akhir = Math.floor((distance % _day) / _hour);
				var minutes_akhir = Math.floor((distance % _hour) / _minute);
				var seconds_akhir = Math.floor((distance % _minute) / _second);
        document.getElementById(id).innerHTML = days_akhir + 'days ';
				document.getElementById(id).innerHTML += hours_akhir + 'hrs ';
				document.getElementById(id).innerHTML += minutes_akhir + 'mins ';
				document.getElementById(id).innerHTML += seconds_akhir + 'secs';
				document.getElementById(id).innerHTML = '<center><b>WAKTU PEMILIHAN TELAH TIBA</b></center> ';
				return;
			}
			var days = Math.floor(distance / _day);
			var hours = Math.floor((distance % _day) / _hour);
			var minutes = Math.floor((distance % _hour) / _minute);
			var seconds = Math.floor((distance % _minute) / _second);
			document.getElementById(id).innerHTML = days + 'days ';
			document.getElementById(id).innerHTML += hours + 'hrs ';
			document.getElementById(id).innerHTML += minutes + 'mins ';
			document.getElementById(id).innerHTML += seconds + 'secs';
			document.getElementById(id).innerHTML +='<center><h2>WAKTU PEMILIHAN BELUM DIMULAI</h2></center>';
		}
		timer = setInterval(showRemaining, 1000);
	}
</script>
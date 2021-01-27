@extends('template.master')

@section('title', 'Voting')

@section('content')
    <h1 class="text-center mt-4 mb-4">Voting</h1>
    <div class="container">
      <a href="{{ url('/hasil_voting') }}" class="btn btn-success mb-4">Hasil Voting</a>
      <div class="alert alert-warning" role="alert">
        Tanggal Pemilihan dimulai : {{ $tanggal_awal->tanggal }} berakhir {{ $tanggal_akhir->tanggal }}
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
                    <li class="list-group-item">Jadwal : {{ date('d M Y', strtotime($kandidat->jadwal)) }}</li>
                  </ul>
                  <div class="card-body">
                    <form action="{{ url('pilih') }}/{{ $kandidat->id }}" method="POST">
                      @csrf
                      <!-- <input type="radio" name="nomor" id="nomor"> <br> -->
                      @if(empty($hide))
                      <button type="submit" class="btn btn-primary">Pilih</button>
                      @else
                      <p style="color: red;">Sudah Memilih</p>
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
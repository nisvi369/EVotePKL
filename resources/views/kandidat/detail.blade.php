@extends('template.master')

@section('title', 'Daftar Kandidat')

@section('content')
<div class="jumbotronedit">
    <h1 class="text-center mt-4 mb-4">Daftar Kandidat</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Kandidat</li>
                  </ol>
                </nav>
            </div>

            @foreach($data as $kandidat)
            @if($kandidat->level == "kandidat")
            <div class="col-sm-4">
                <div class="shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                  <img src="{{ url('img/foto_kandidat') }}/{{ $kandidat->foto }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $kandidat->nama }}</li>
                    <li class="list-group-item">Nomor : {{ $kandidat->nomor_urut }}</li>
                    <li class="list-group-item">Jadwal : {{ date('d M Y', strtotime($kandidat->jadwal)) }}</li>
                  </ul>
                  <div class="card-body text-center">
                    <a href="{{ url('kandidat/edit') }}/{{ $kandidat->id }}" class="btn btn-primary">Edit</a>
                  </div>
                </div>
            </div>
            @endif
            @endforeach
            
       </div>
   </div>
   </div>
@endsection
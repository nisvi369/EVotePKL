@extends('template.master')

@section('title', 'Data Kampanye')
<link rel="stylesheet" href="{{ asset('css/dash.css') }}">
@section('content')
<div class="jumbotron">
    <h1 class="text-center ">Data Kampanye</h1>
    <section class="chefs" id="kampanye"> 
     <div class="container">      
     @if(auth()->user()->level == 'kandidat')
        <a href="/Kandidat/tambahKampanye" class="btn btn-primary mb-4">Tambah Data</a>
     @endif
     <div class="row">
                    @foreach($kampanye as $k)
                    <div class="col-lg-4 col-md-6">
                        <div class="member">
                        <div class="pic"><img src="{{ asset('img/foto_kampanye') }}/{{ $k->gambar }}" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>{{ $k->judul }}</h4>
                            <span1>{{substr($k->konten,0,200)}}</span1>
                            <br>
                            <div id="button"><a href="/masyarakat/detail/{{id}}" class="btn btn-info btn-sm">Selengkapnya</a></div>
                            <br>
                            @if(auth()->user()->level == 'kandidat')
                                <div class="aksi2">
                                    <a href="/Kandidat/editKampanye/{{$k->id}}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/Kandidat/hapusKampanye/{{$k->id}}" class="btn btn-secondary btn-sm" id="hapus" onclick="return confirm('Apakah Anda yakin akan menghapus {{$k->judul}}?')">Hapus</a>
                                </div>
                            @endif
                        </div>
                        </div>
                    </div>
                    @endforeach
        
        </div>
</div>
</div>
</section>
@endsection
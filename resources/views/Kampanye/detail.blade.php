@extends('template.master')

@section('title', 'Data Kampanye')

@section('content')
<div class="container">
    <div class="row">
        <div class="more">
            @foreach($kampanye as $k)
            <center><h1>{{$k->judul}}</h1></center>
            <center>
            <div>
                <img src="{{asset('img/fotoKampanye'.$k->gambar)}}" height="70%" width="40%" alt="" srcset="">
            </div>
            </center>
            <center><h5>Ditulis oleh {{$k->nama}} nomor urut {{$k->nomor_urut}}</h5></center>
            <br>
            <h5>Ditulis pada {{$k->waktu}}</h5>
        
            <p>{{$k->konten}}</p>
            <hr>
            <!-- <a href="/eventsaya" class="btn btn-light btn-sm">Kembali</a> -->
            @endforeach
        </div>
    </div>
</div>
</body>
@endsection
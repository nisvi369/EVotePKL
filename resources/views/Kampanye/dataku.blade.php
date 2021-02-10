@extends('template.master')

@section('title', 'Data Kampanye')

@section('content')
<div class="jubotrondash">
    <h1 class="text-center mt-4 mb-4">Data Kampanye</h1>
    <div class="container">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <?php
                $now = Carbon\carbon::now();
                ?>
                @if(auth()->user()->level == 'kandidat')
                    @if($now <= ($tanggal_awal->tanggal))
                        <a href="/Kandidat/tambahKampanye" class="btn btn-primary mb-4">Tambah Data</a>
                    @endif
                @endif
                <form action="{{ url('/cariKampanye') }}" method="GET" class="col-md-12">
                    @csrf
                    <input type="text" name="cari" placeholder="Cari Judul ..." value="{{ old('cari') }}" required oninvalid="this.setCustomValidity('Judul harap diisi')" oninput="setCustomValidity('')">
                    <input type="submit" value="cari">
                </form>
                <table class="table table-hover col-md-12 mt-2 text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Waktu</th>
                            <th>Konten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kampanye as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$k->judul}}</td>
                            <td>{{$k->waktu}}</td>
                            <td>{{$k->konten}}</td>
                            <td><a href="{{ url('detailKampanye') }}/{{ $k->id }}" class="btn btn-success btn-sm">Baca Selengkapnya</a><td>
                            @if(auth()->user()->level == 'kandidat')
                            <td>
                                <div class="aksi2">
                                    <a href="/Kandidat/editKampanye/{{$k->id}}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/Kandidat/hapusKampanye/{{$k->id}}" class="btn btn-secondary btn-sm" id="hapus" onclick="return confirm('Apakah Anda yakin akan menghapus {{$k->judul}}?')">Hapus</a>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
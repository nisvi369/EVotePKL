@extends('template.master')

@section('title', 'Data Kampanye')

@section('content')
<div class="jubotrondash">
    <h1 class="text-center mt-4 mb-4">Data Kampanye</h1>
    <div class="container">
        @if(auth()->user()->level == 'kandidat')
            <a href="/Kandidat/tambahKampanye" class="btn btn-primary mb-4">Tambah Data</a>
        @endif
        <table class="table table-hover col-md-12 mt-2 text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Waktu</th>
                    <th>No. Urut Kandidat</th>
                    <th>Nama Kandidat</th>
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
                    <td>{{$k->nomor_urut}}</td>
                    <td>{{$k->nama}}</td>
                    <td>{{$k->konten}}</td>
                    <td><a href="{{ url('detailKampanye') }}/{{ $k->id }}" class="btn btn-success">Baca Selengkapnya</a><td>
                    <?php
                        $akses = \App\Pemilihan::where('masyarakat_id',Auth::user()->id)->first();
                    ?>
                    @if($k->masyarakat_id)
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
@endsection
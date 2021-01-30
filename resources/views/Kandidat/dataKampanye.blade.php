@extends('template.master')

@section('title', 'Kampanye')

@section('content')

<div class="jumbotronedit">
    <div class="containeradmin">
        <h1 class="text-center mt-4 mb-4">Data Petugas</h1>
    </div>
        <div class="container content">
            <a href="{{ url('/kandidat/tambahKampanye') }}" class="btn btn-primary mb-4">Tambah Data</a>
            <table class="table table-hover col-md-12">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Waktu</th>
                        <th>Konten</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kampanye as $p)
                    <tr class="tr-shadow">
                        <td>{{$p->judul}}</td>
                        <td>{{$p->gambar}}</td>
                        <td>{{$p->waktu}}</td>
                        <td>{{$p->konten}}</td>
                        <td>
                            <a href="{{ url('baca') }}/{{$p->id}}" class="btn btn-warning btn-sm">Baca Selengkapnya ...</a>
                        </td>
                        <td>
                            <div class="aksi2">
                                <a href="/editPetugas/{{$p->id}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/hapusPetugas/{{$p->id}}" class="btn btn-secondary btn-sm" id="hapus" onclick="return confirm('Apakah Anda yakin akan menghapus data {{$p->nama}}?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection
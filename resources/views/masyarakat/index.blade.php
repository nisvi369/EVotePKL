@extends('template.master')

@section('title', 'Data Petugas')

@section('content')
<div class="jumbotronedit">
<h1 class="text-center mt-4 mb-4">Data Masyarakat</h1>
<div class="container konten">
    <a href="{{ url('masyarakat/tambah') }}" class="btn btn-primary">Tambah Data</a>
    <!-- <a href="{{ url('kandidat') }}" class="btn btn-primary">Tambah Kandidat</a> -->
    <table class="table table-hover col-md-12 mt-2">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masyarakat as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->nik }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->tanggal_lahir }}</td>
                <td>{{ $data->pekerjaan }}</td>
                <td>{{ $data->alamat }}</td>
                <td>
                    <a href="{{ url('/masyarakat/update') }}/{{ $data->id }}" class="btn btn-warning">Edit</a>
                    <a href="{{ url('masyarakat/delete') }}/{{ $data->id }}" onclick="return confirm('Anda akan menghapus barang ini ?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
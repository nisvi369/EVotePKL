@extends('template.master')
@section('title', 'Data Masyarakat')
@section('content')
<h1 class="text-center mt-4 mb-4">Data Masyarakat</h1>
<div class="container">
    @if(auth()->user()->level == 'petugas')
    <a href="{{ url('/Petugas/tambahDataMasyarakat') }}" class="btn btn-primary">Tambah Data</a>
    @endif
    <!-- <a href="{{ url('kandidat') }}" class="btn btn-primary">Tambah Kandidat</a> -->
    <table class="table table-hover col-md-12 mt-2 text-center">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                @if(auth()->user()->level == 'petugas')
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($masyarakat as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->nik }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->tanggal_lahir }}</td>
                <td>{{ $data->nama_pekerjaan }}</td>
                <td>{{ $data->alamat }}</td>
                @if(auth()->user()->level == 'petugas')
                <td>
                    <a href="{{ url('/Petugas/edit') }}/{{ $data->id }}" class="btn btn-warning">Edit</a>
                    <a href="{{ url('/Petugas/hapus') }}/{{ $data->id }}" onclick="return confirm('Anda akan menghapus barang ini ?')" class="btn btn-danger">Hapus</a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('template.master')

@section('title', 'Data Masyarakat')

@section('content')

<h1 class="text-center mt-4 mb-4">Data Masyarakat</h1>
<div class="container">
    <div class="card shadow p-3 mb-5 bg-white rounded">
        <div class="card-body">
            @if(auth()->user()->level == 'petugas')
            <a href="{{ url('Petugas/tambah') }}" class="btn btn-primary">Tambah Data</a>
            @endif
            <!-- <a href="{{ url('kandidat') }}" class="btn btn-primary">Tambah Kandidat</a> -->
            <div class="table-responsive">
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
                            @if (Auth()->user()->level == 'petugas')
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
                            <td>
                            @if (Auth()->user()->level == 'petugas')
                                <a href="{{ url('/Petugas/edit') }}/{{ $data->id }}" class="btn btn-warning btn-sm">Edit</a>
                                @if($data->level == 'pemilih')
                                <a href="{{ url('/Petugas/delete') }}/{{ $data->id }}" onclick="return confirm('Anda akan menghapus data {{$data->nik}} ini ?')" class="btn btn-danger btn-sm">Hapus</a>
                                @endif
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-block col-12">
      {{ $masyarakat->links() }}
    </div>
</div>
@endsection
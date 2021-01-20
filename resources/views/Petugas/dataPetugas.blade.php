@extends('template.master')

@section('title', 'Data Petugas')

@section('content')
<div class="jubotrondash">
        <h1 class="text-center mt-4 mb-4">Data Petugas</h1>
        <div class="container konten">
            <a href="/tambahPetugas" class="btn btn-primary">Tambah Data</a>
            <table class="table table-hover col-md-12">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Nama Kecamatan</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($petugas as $p)
                    <tr class="tr-shadow">
                        <td>{{$p->nik}}</td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->jenisKelamin}}</td>
                        <td>{{$p->tanggalLahir}}</td>
                        <td>{{$p->alamat}}</td>
                        <td>{{$p->namaKecamatan}}</td>
                        <td>{{$p->email}}</td>
                        <td>
                            <div class="aksi2">
                                <a href="/editPetugas/{{$p->id}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/hapusPetugas/{{$p->id}}" class="btn btn-secondary btn-sm" id="hapus" onclick="return confirm('Apakah Anda yakin akan menghapus {{$p->nama}}?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection
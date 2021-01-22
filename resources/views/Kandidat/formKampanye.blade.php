@extends('template.master')

@section('title', 'Data Kandidat')

@section('content')
<div class="jumbotrontambah">
    <h1 class="text-center mt-4 mb-4">Form Data Kampanye</h1>
        <div class="container" id="form">
            <div class="row">
                <!-- <div class="col-md-12 mt-4">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                      </ol>
                    </nav>
                </div> -->
                <div class="col-md-12 mt-1" id="tengah">
                    <div class="card shadow p-3 mb-5 bg-white rounded ">
                        <div class="card-body">
                            <form method="POST" action="/kandidat/postFormKampanye" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group row mb-2 {{$errors->has('id_masyarakat') ? 'has-error' : ''}}">
                                    <!-- <label for="id_masyarakat" class="col-md-2 col-form-label">ID Masyarakat</label> -->
                                    <div class="col-md-10">
                                        <input type="hidden" name="id_masyarakat" class="form-control" id="id_masyarakat" required="">{{ old('id_masyarakat') }}</input>
                                        @if($errors->has('id_masyarakat'))
                                            <span class="form-text text-danger">{{$errors->first('id_masyarakat')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-2 {{$errors->has('judul') ? 'has-error' : ''}}">
                                    <label for="judul" class="col-md-2 col-form-label">Judul</label>
                                    <div class="col-md-10">
                                        <input name="judul" class="form-control" id="judul" required="">{{ old('judul') }}</input>
                                        @if($errors->has('judul'))
                                            <span class="form-text text-danger">{{$errors->first('judul')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-2 {{$errors->has('konten') ? 'has-error' : ''}}">
                                    <label for="konten" class="col-md-2 col-form-label">Konten</label>
                                    <div class="col-md-10">
                                        <textarea name="konten" class="form-control" id="konten" required="">{{ old('konten') }}</textarea>
                                        @if($errors->has('konten'))
                                            <span class="form-text text-danger">{{$errors->first('konten')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-2 {{$errors->has('gambar') ? 'has-error' : ''}}">
                                    <label for="gambar" class="col-md-2 col-form-label">Gambar</label>
                                    <div class="col-md-10">
                                        <input type="file" name="gambar" class="form-control" id="gambar" required="">{{ old('gambar') }}</input>
                                        @if($errors->has('gambar'))
                                            <span class="form-text text-danger">{{$errors->first('gambar')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <a href="/dataPetugas" class="btn btn-light">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
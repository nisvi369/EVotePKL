@extends('template.master')

@section('title', 'Data Kampanye')

@section('content')
<div class="jumbotrondash">
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
                    <form method="POST" action="/postFormKampanye" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row mb-2 {{$errors->has('judul') ? 'has-error' : ''}}">
                            <label for="judul" class="col-md-2 col-form-label">Judul</label>
                            <div class="col-md-10">
                                <input name="judul" class="form-control" id="judul" value="{{ old('judul') }}" required oninvalid="this.setCustomValidity('Form harap diisi semua')" oninput="setCustomValidity('')"></input>
                                @if($errors->has('judul'))
                                    <span class="form-text text-danger">{{$errors->first('judul')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2 {{$errors->has('konten') ? 'has-error' : ''}}">
                            <label for="konten" class="col-md-2 col-form-label">Konten</label>
                            <div class="col-md-10">
                                <textarea name="konten" class="form-control" id="konten" value="{{ old('konten') }}" required oninvalid="this.setCustomValidity('Form harap diisi semua')" oninput="setCustomValidity('')"></textarea>
                                @if($errors->has('konten'))
                                    <span class="form-text text-danger">{{$errors->first('konten')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2 {{$errors->has('gambar') ? 'has-error' : ''}}">
                            <label for="gambar" class="col-md-2 col-form-label">Gambar</label>
                            <div class="col-md-10">
                                <input type="file" name="gambar" class="form-control" id="gambar" value="{{ old('gambar') }}" required oninvalid="this.setCustomValidity('Form harap diisi semua')" oninput="setCustomValidity('')"></input>
                                @if($errors->has('gambar'))
                                    <span class="form-text text-danger">{{$errors->first('gambar')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-2 {{$errors->has('waktu') ? 'has-error' : ''}}">
                            <!-- <label for="waktu" class="col-md-2 col-form-label">Waktu</label> -->
                            <div class="col-md-10">
                                <input type="hidden" name="waktu" class="form-control" value="{{ old('waktu') }}" id="waktu" required="">
                                @if($errors->has('waktu'))
                                    <span class="form-text text-danger">{{$errors->first('waktu')}}</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a href="{{ url('/Kandidat/dataKampanye') }}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
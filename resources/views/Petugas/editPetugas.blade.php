@extends('template.master')

@section('title', 'Data Kandidat')

@section('content')
    <h1 class="text-center mt-4 mb-4">Edit Data</h1>
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-12 mt-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div> -->
                <div class="col-md-12 mt-1">
                    <div class="card shadow p-3 mb-5 bg-white rounded ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <form method="POST" action="/dataPetugas/{{$petugas->id}}/update">
                                        {{csrf_field()}}
                                        <div class="form-group row mb-2 {{$errors->has('nik') ? 'has-error' : ''}}">
                                            <label for="alamat" class="col-md-2 col-form-label">NIK</label>
                                            <div class="col-md-10">
                                                <input name="nik" class="form-control" id="nik" value="{{$petugas->nik}}" required oninvalid="this.setCustomValidity('NIK harap diisi')" oninput="setCustomValidity('')">
                                                @if($errors->has('nik'))
                                                    <span class="form-text text-danger">{{$errors->first('nik')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('nama') ? 'has-error' : ''}}">
                                            <label for="alamat" class="col-md-2 col-form-label">Nama</label>
                                            <div class="col-md-10">
                                                <input name="nama" class="form-control" id="nama'" value="{{$petugas->nama}}" required oninvalid="this.setCustomValidity('Nama harap diisi')" oninput="setCustomValidity('')">
                                                @if($errors->has('nama'))
                                                    <span class="form-text text-danger">{{$errors->first('nama')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                            <label for="jenis_kelamin" class="col-md-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-10">
                                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required oninvalid="this.setCustomValidity('Jenis Kelamin harap diisi')" oninput="setCustomValidity('')">
                                                    <option value="{{ $petugas->jenis_kelamin }}">-- Jenis Kelamin --</option>
                                                    <option value="perempuan"{{(old('jenis_kelamin') == 'perempuan') ? ' selected' : ''}}>Perempuan</option>
                                                    <option value="laki-laki"{{(old('jenis_kelamin') == 'laki-laki') ? ' selected' : ''}}>Laki-laki</option>
                                                </select>
                                                @if($errors->has('jenis_kelamin'))
                                                    <span class="form-text text-danger">{{$errors->first('jenis_kelamin')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                                            <label for="tanggal_lahir" class="col-md-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-md-10">
                                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{$petugas->tanggal_lahir}}" required oninvalid="this.setCustomValidity('Tanggal Lahir harap diisi')" oninput="setCustomValidity('')">
                                                @if($errors->has('tanggal_lahir'))
                                                <span class="form-text text-danger">{{$errors->first('tanggal_lahir')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('alamat') ? 'has-error' : ''}}">
                                            <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                                            <div class="col-md-10">
                                                <textarea name="alamat" class="form-control" id="alamat" required oninvalid="this.setCustomValidity('Alamat harap diisi')" oninput="setCustomValidity('')">{{ $petugas->alamat }}</textarea>
                                                @if($errors->has('alamat'))
                                                    <span class="form-text text-danger">{{$errors->first('alamat')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('id_kecamatan') ? 'has-error' : ''}}">
                                            <label for="id_kecamatan" class="col-md-2 col-form-label">Daerah Tugas</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="id_kecamatan" id="id_kecamatan" required oninvalid="this.setCustomValidity('Daerah Penugasan harap diisi')" oninput="setCustomValidity('')">
                                                    <option>-- Pilih Kecamatan --</option>
                                                    @foreach ($kecamatan as $k)
                                                        <option 
                                                            value="{{ $k->id }}">{{ $k->nama_kecamatan}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('email') ? 'has-error' : ''}}">
                                            <label for="email" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input name="email" class="form-control" id="email" value="{{$petugas->email}}" required oninvalid="this.setCustomValidity('Email harap diisi')" oninput="setCustomValidity('')">
                                                @if($errors->has('email'))
                                                    <span class="form-text text-danger">{{$errors->first('email')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                        <!-- <a href="/Admin/dataPetugas" class="btn btn-outline-primary">Kembali</a> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@extends('template.master')

@section('title', 'Data Petugas')

@section('content')
    <h1 class="text-center mt-4 mb-4">Form Data Petugas</h1>
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-12 mt-4">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                      </ol>
                    </nav>
                </div> -->
                <div class="col-md-12 mt-1">
                    <div class="card shadow p-3 mb-5 bg-white rounded ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="/postFormPetugas" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group row mb-2 {{$errors->has('NIK') ? 'has-error' : ''}}">
                                            <label for="NIK" class="col-md-2 col-form-label">NIK</label>
                                            <div class="col-md-10">
                                                <input name="NIK" class="form-control" id="NIK" required oninvalid="this.setCustomValidity('NIK harap diisi')" oninput="setCustomValidity('')">
                                                @if($errors->has('NIK'))
                                                    <span class="form-text text-danger">{{$errors->first('NIK')}}</span>
                                                @endif
                                          </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('nama') ? 'has-error' : ''}}">
                                            <label for="alamat" class="col-md-2 col-form-label">Nama</label>
                                            <div class="col-md-10">
                                                <input name="nama" class="form-control" id="nama'" required oninvalid="this.setCustomValidity('Nama harap diisi')" oninput="setCustomValidity('')">
                                                @if($errors->has('nama'))
                                                    <span class="form-text text-danger">{{$errors->first('nama')}}</span>
                                                @endif
                                          </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                            <label for="jenis_kelamin" class="col-md-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-10">
                                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required oninvalid="this.setCustomValidity('Jenis Kelamin harap diisi')" oninput="setCustomValidity('')">
                                                    <option value="">-- Jenis Kelamin --</option>
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
                                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required oninvalid="this.setCustomValidity('Tanggal lahir harap diisi')" oninput="setCustomValidity('')">
                                                @if($errors->has('tanggal_lahir'))
                                                    <span class="form-text text-danger">{{$errors->first('tanggal_lahir')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('alamat') ? 'has-error' : ''}}">
                                            <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                                            <div class="col-md-10">
                                                <textarea name="alamat" class="form-control" id="alamat" required oninvalid="this.setCustomValidity('Alamat harap diisi')" oninput="setCustomValidity('')">{{ old('alamat') }}</textarea>
                                                @if($errors->has('alamat'))
                                                    <span class="form-text text-danger">{{$errors->first('alamat')}}</span>
                                                @endif
                                          </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('id_kecamatan') ? 'has-error' : ''}}">
                                            <label for="id_kecamatan" class="col-md-2 col-form-label">Daerah Tugas</label>
                                            <div class="col-md-10">
                                                <select class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" id="id_kecamatan" required oninvalid="this.setCustomValidity('Daerah penugasan harap diisi')" oninput="setCustomValidity('')">
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
                                            <label for="alamat" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" name="email" class="form-control" id="email" required oninvalid="this.setCustomValidity('Email harap diisi')" oninput="setCustomValidity('')">
                                                @if($errors->has('email'))
                                                    <span class="form-text text-danger">{{$errors->first('email')}}</span>
                                                @endif
                                          </div>
                                        </div>
                                     
                                        <br>
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                        <a href="/Admin/dataPetugas" class="btn btn-light">Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
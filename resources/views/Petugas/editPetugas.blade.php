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
                <div class="col-md-12 mt-1" id="tengah">
                    <div class="card shadow p-3 mb-5 bg-white rounded ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <h3 class="title-5 m-b-35">Edit Data Petugas</h3>
                                    <form method="POST" action="/dataPetugas/{{$petugas->id}}/update" class="col-md-6">
                                        {{csrf_field()}}
                                        <div class="form-group row mb-2 {{$errors->has('nik') ? 'has-error' : ''}}">
                                            <label for="alamat" class="col-md-2 col-form-label">NIK</label>
                                            <div class="col-md-10">
                                                <input name="nik" class="form-control" id="nik" value="{{$petugas->nik}}">
                                                @if($errors->has('nik'))
                                                    <span class="form-text text-danger">{{$errors->first('nik')}}</span>
                                                @endif
                                          </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('nama') ? 'has-error' : ''}}">
                                            <label for="alamat" class="col-md-2 col-form-label">Nama</label>
                                            <div class="col-md-10">
                                                <input name="nama" class="form-control" id="nama'" value="{{$petugas->nama}}">
                                                @if($errors->has('nama'))
                                                    <span class="form-text text-danger">{{$errors->first('nama')}}</span>
                                                @endif
                                          </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('jenisKelamin') ? 'has-error' : ''}}">
                                            <label for="jenisKelamin" class="col-md-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-10">
                                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenisKelamin" required="">
                                                    <option value="">-- Jenis Kelamin --</option>
                                                    <option value="perempuan"{{(old('jenis_kelamin') == 'perempuan') ? ' selected' : ''}}>Perempuan</option>
                                                    <option value="laki-laki"{{(old('jenis_kelamin') == 'laki-laki') ? ' selected' : ''}}>Laki-laki</option>
                                                </select>
                                                @if($errors->has('jenis_kelamin'))
                                                    <span class="form-text text-danger">{{$errors->first('jenis_kelamin')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('tanggalLahir') ? 'has-error' : ''}}">
                                            <label for="tanggal_lahir" class="col-md-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-md-10">
                                                <input type="date" name="tanggalLahir" class="form-control" id="tanggalLahir" value="{{$petugas->tanggalLahir}}">                                              @if($errors->has('tanggal_lahir'))
                                                <span class="form-text text-danger">{{$errors->first('tanggalLahir')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('alamat') ? 'has-error' : ''}}">
                                            <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                                            <div class="col-md-10">
                                                <textarea name="alamat" class="form-control" id="alamat" >{{ $petugas->alamat }}</textarea>
                                                @if($errors->has('alamat'))
                                                    <span class="form-text text-danger">{{$errors->first('alamat')}}</span>
                                                @endif
                                          </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('id_kecamatan') ? 'has-error' : ''}}">
                                            <label for="id_kecamatan" class="col-md-2 col-form-label">Daerah Tugas</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="id_kecamatan" id="id_kecamatan" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')">
                                                    <option>-- Pilih Kecamatan --</option>
                                                    @foreach ($kecamatan as $k)
                                                        <option 
                                                            value="{{ $k->id }}">{{ $k->namaKecamatan}}
                                                        </option>
                                                    @endforeach
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('email') ? 'has-error' : ''}}">
                                            <label for="email" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input name="email" class="form-control" id="email" value="{{$petugas->email}}">{{ old('email') }}</input>
                                                @if($errors->has('email'))
                                                    <span class="form-text text-danger">{{$errors->first('email')}}</span>
                                                @endif
                                          </div>
                                        </div>
                                        <div class="form-group row mb-2 {{$errors->has('password') ? 'has-error' : ''}}">
                                            <label for="password" class="col-md-2 col-form-label">Password</label>
                                            <div class="col-md-10">
                                                <input name="password" class="form-control" id="password" value="{{$petugas->password}}"</input>
                                                @if($errors->has('password'))
                                                    <span class="form-text text-danger">{{$errors->first('password')}}</span>
                                                @endif
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                        <a href="/dataPetugas" class="btn btn-outline-primary">Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
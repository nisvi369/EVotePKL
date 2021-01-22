@extends('template.master')

@section('title', 'Tambah Data')

@section('content')
    <h1 class="text-center mt-4 mb-4">Tambah Data</h1>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/masyarakat') }}">Data Masyarakat</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                          </ol>
                        </nav>
                    </div>
                    <div class="col-md-12 mt-1" id="tengah">
                        <div class="card shadow p-3 mb-5 bg-white rounded ">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-md-12">                                        
                                        <form action="{{ url('/masyarakat/tambah') }}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                         
                                          <div class="form-group row mb-2 {{$errors->has('nama') ? 'has-error' : ''}}">
                                            <label for="nama" class="col-md-2 col-form-label">Nama</label>
                                            <div class="col-md-10">
                                              <input name ="nama" type="text" class="form-control" id="nama" value="{{ old('nama') }}" required="">
                                              @if($errors->has('nama'))
                                                  <span class="form-text text-danger">{{$errors->first('nama')}}</span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="form-group row mb-2 {{$errors->has('nik') ? 'has-error' : ''}}">
                                            <label for="nik" class="col-md-2 col-form-label">NIK</label>
                                            <div class="col-md-10">
                                              <input name="nik" type="text" min="0" class="form-control" id="nik" value="{{ old('nik') }}" required="">
                                              @if($errors->has('nik'))
                                                  <span class="form-text text-danger">{{$errors->first('nik')}}</span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="form-group row mb-2 {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                            <label for="jenis_kelamin" class="col-md-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-10">
                                              
                                              <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required="">
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
                                              <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control" id="tanggal_lahir" required="">                                              @if($errors->has('tanggal_lahir'))
                                                  <span class="form-text text-danger">{{$errors->first('tanggal_lahir')}}</span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="form-group row mb-2 {{$errors->has('pekerjaan_id') ? 'has-error' : ''}}">
                                            <label for="pekerjaan_id" class="col-md-2 col-form-label">Pekerjaan</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="pekerjaan_id" id="pekerjaan_id" required="">
                                                    <option>-- Pilih Pekerjaan --</option>
                                                    @foreach ($pekerjaan as $k)
                                                        <option 
                                                            value="{{ $k->id }}">{{ $k->nama_pekerjaan}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('pekerjaan_id'))
                                                  <span class="form-text text-danger">{{$errors->first('pekerjaan_id')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                          <div class="form-group row mb-2 {{$errors->has('alamat') ? 'has-error' : ''}}">
                                            <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                                            <div class="col-md-10">
                                              <textarea name="alamat" class="form-control" id="alamat" required="">{{ old('alamat') }}</textarea>
                                              @if($errors->has('alamat'))
                                                  <span class="form-text text-danger">{{$errors->first('alamat')}}</span>
                                              @endif
                                            </div>
                                          </div>
                                          <button type="submit" class="btn btn-primary">SIMPAN</button>
                                          <a href="{{ url('/') }}" class="btn btn-outline-primary">Kembali</a>
                                        </form>

                                    </div>
                                </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
@endsection
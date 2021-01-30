@extends('template.master')

@section('title', 'Profil Saya')

@section('content')
<h1 class="text-center mt-4 mb-4">Profil Saya</h1>
<div class="container">
  <div class="col-md-12 mt-1" id="tengah">
        <div class="card shadow p-3 mb-5 bg-white rounded ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">                                        
                        <form action="{{ url('/profil-petugas') }}/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data" >
                        @csrf
                          <div class="form-group row mb-2 {{$errors->has('nama') ? 'has-error' : ''}}">
                            <label for="nama" class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                              <input name ="nama" type="text" class="form-control" id="nama" value="{{ auth()->user()->nama }}" required="">
                              @if($errors->has('nama'))
                                  <span class="form-text text-danger">{{$errors->first('nama')}}</span>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row mb-2 {{$errors->has('NIK') ? 'has-error' : ''}}">
                            <label for="NIK" class="col-md-2 col-form-label">NIK</label>
                            <div class="col-md-10">
                              <input name="nNIKk" type="text" min="0" class="form-control" id="NIK" value="{{ auth()->user()->NIK }}" readonly="">
                              @if($errors->has('NIK'))
                                  <span class="form-text text-danger">{{$errors->first('NIK')}}</span>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row mb-2 {{$errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input name="email" type="email" min="0" class="form-control" id="email" value="{{ auth()->user()->email }}" required="">
                              @if($errors->has('email'))
                                  <span class="form-text text-danger">{{$errors->first('email')}}</span>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row mb-2 {{$errors->has('jenisKelamin') ? 'has-error' : ''}}">
                            <label for="jenisKelamin" class="col-md-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-10">
                              
                              <select class="form-control @error('jenisKelamin') is-invalid @enderror" name="jenisKelamin" required="">
                                  <option value="{{ auth()->user()->jenisKelamin }}">-- Jenis Kelamin --</option>
                                  <option value="perempuan"{{(old('jenisKelamin') == 'perempuan') ? ' selected' : ''}}>Perempuan</option>
                                  <option value="laki-laki"{{(old('jenisKelamin') == 'laki-laki') ? ' selected' : ''}}>Laki-laki</option>
                              </select>
                              @if($errors->has('jenisKelamin'))
                                  <span class="form-text text-danger">{{$errors->first('jenisKelamin')}}</span>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row mb-2 {{$errors->has('tanggalLahir') ? 'has-error' : ''}}">
                            <label for="tanggalLahir" class="col-md-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-10">
                              <input type="date" name="tanggalLahir" value="{{ auth()->user()->tanggalLahir }}" class="form-control" id="tanggalLahir" required="">                                              
                              @if($errors->has('tanggalLahir'))
                                  <span class="form-text text-danger">{{$errors->first('tanggalLahir')}}</span>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row mb-2 {{$errors->has('id_kecamatan') ? 'has-error' : ''}}">
                            <label for="id_kecamatan" class="col-md-2 col-form-label">Daerah Tugas</label>
                            <div class="col-md-10">
                                <select class="form-control" name="id_kecamatan" id="id_kecamatan" required="">
                                    <option value="{{ auth()->user()->id_kecamatan }}">-- Pilih Daerah Tugas --</option>
                                    @foreach ($kecamatan as $k)
                                        <option 
                                            value="{{ $k->id }}">{{ $k->namaKecamatan}}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('id_kecamatan'))
                                  <span class="form-text text-danger">{{$errors->first('id_kecamatan')}}</span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group row mb-2 {{$errors->has('alamat') ? 'has-error' : ''}}">
                            <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                              <textarea name="alamat" class="form-control" id="alamat" required="">{{ auth()->user()->alamat }}</textarea>
                              @if($errors->has('alamat'))
                                  <span class="form-text text-danger">{{$errors->first('alamat')}}</span>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row mb-2 {{$errors->has('password') ? 'has-error' : ''}}">
                            <label for="password" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                              <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password">                                              
                              @if($errors->has('password'))
                                  <span class="form-text text-danger">{{$errors->first('password')}}</span>
                              @endif
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">SIMPAN</button>
                          <a href="{{ url('/Petugas/home') }}" class="btn btn-outline-primary">Kembali</a>
                        </form>
                    </div>
                </div>
        </div>
      </div>
    </div>

</div>
@endsection
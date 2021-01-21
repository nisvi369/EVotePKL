@extends('template.master')

@section('title', 'Tambah Kandidat')

@section('content')
<div class="jumbotrontambah">
    <h1 class="text-center mt-4 mb-4">Tambah Kandidat</h1>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                          </ol>
                        </nav>
                    </div>
                    <div class="col-md-12 mt-1" id="tengah">
                        <div class="card shadow p-3 mb-5 bg-white rounded ">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-md-12">                                        
                                        <form action="{{ url('/kandidat/lengkapi') }}/{{ $masyarakat->id }}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                          <div class="form-group row mb-2 {{$errors->has('nomor_urut') ? 'has-error' : ''}}">
                                            <label for="nomor_urut" class="col-md-2 col-form-label">Nomor Urut</label>
                                            <div class="col-md-10">
                                              <input name ="nomor_urut" type="text" class="form-control" id="nomor_urut" required="">
                                              @if($errors->has('nomor_urut'))
                                                  <span class="form-text text-danger">{{$errors->first('nomor_urut')}}</span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="form-group row mb-2 {{$errors->has('jadwal') ? 'has-error' : ''}}">
                                            <label for="jadwal" class="col-md-2 col-form-label">Jadwal</label>
                                            <div class="col-md-10">
                                              <input type="date" name="jadwal" class="form-control" id="jadwal" required="">     @if($errors->has('jadwal'))
                                                  <span class="form-text text-danger">{{$errors->first('jadwal')}}</span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="form-group row mb-2 {{$errors->has('foto') ? 'has-error' : ''}}">
                                            <label for="foto" class="col-md-2 col-form-label">Foto</label>
                                            <div class="col-md-10">
                                              <input name="foto" type="file" class="form-control-file mb-2" id="foto"><br>
                                              
                                              @if($errors->has('foto'))
                                                  <span class="form-text text-danger">{{$errors->first('foto')}}</span>
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
</div>
</div>
@endsection
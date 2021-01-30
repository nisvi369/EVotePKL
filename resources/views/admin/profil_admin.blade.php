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
                        <form action="{{ url('/profil-admin') }}/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data" >
                        @csrf
                          <div class="form-group row mb-2 {{$errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                              <input name ="name" type="text" class="form-control" id="name" value="{{ auth()->user()->name }}" required="">
                              @if($errors->has('name'))
                                  <span class="form-text text-danger">{{$errors->first('name')}}</span>
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
                          <a href="{{ url('/Admin/home') }}" class="btn btn-outline-primary">Kembali</a>
                        </form>
                    </div>
                </div>
        </div>
      </div>
    </div>

</div>
@endsection
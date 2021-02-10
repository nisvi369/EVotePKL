@extends('template.master')

@section('title', 'Profil Saya')

@section('content')
<div class="jumbotrondash">
<h1 class="text-center mt-4 mb-4">Profil Saya</h1>
<div class="container"> 
<div class="row">  
    <div class="col-md-4 ">      
        <div class="portlet light profile-sidebar-portlet bordered">
            <div class="profile-userpic" float="center">
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-responsive" alt=""> 
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"> ADMIN </div>
                <div class="profile-usertitle-job"> Operator Website </div>
                <br>
                <button type="button" class="btn btn-info  btn-sm">Follow</button>
               <button type="button" class="btn btn-info  btn-sm">Massage</button>
            </div>
        </div>
    </div>

    <div class="col-md-8"> 
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">Data Personal</span>
                </div>
            </div>
            <div class="portlet-body">
                <div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">                                       
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
</div>
</div>
</div>
@endsection
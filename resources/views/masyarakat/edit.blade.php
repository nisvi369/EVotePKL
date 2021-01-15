<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Evote</title>
  </head>
  <body>
    <h1 class="text-center mt-4 mb-4">Edit Data</h1>
      <div class="container">
          <div class="row">
              <div class="col-md-12 mt-4">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                  </nav>
              </div>
              <div class="col-md-12 mt-1" id="tengah">
                  <div class="card shadow p-3 mb-5 bg-white rounded ">
                      <div class="card-body">
                          <div class="row">
                              
                              <div class="col-md-12">                                        
                                  <form action="{{ url('/masyarakat/update') }}/{{ $masyarakat->id }}" method="post" enctype="multipart/form-data" >
                                  @csrf
                                    <div class="form-group row mb-2 {{$errors->has('nama') ? 'has-error' : ''}}">
                                      <label for="nama" class="col-md-2 col-form-label">Nama</label>
                                      <div class="col-md-10">
                                        <input name ="nama" type="text" class="form-control" id="nama" value="{{ $masyarakat->nama }}" required="">
                                        @if($errors->has('nama'))
                                            <span class="form-text text-danger">{{$errors->first('nama')}}</span>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="form-group row mb-2 {{$errors->has('nik') ? 'has-error' : ''}}">
                                      <label for="nik" class="col-md-2 col-form-label">NIK</label>
                                      <div class="col-md-10">
                                        <input name="nik" type="text" min="0" class="form-control" id="nik" value="{{ $masyarakat->nik }}" required="">
                                        @if($errors->has('nik'))
                                            <span class="form-text text-danger">{{$errors->first('nik')}}</span>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="form-group row mb-2 {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                      <label for="jenis_kelamin" class="col-md-2 col-form-label">Jenis Kelamin</label>
                                      <div class="col-md-10">
                                        
                                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required="">
                                            <option value="{{ $masyarakat->jenis_kelamin }}">-- Jenis Kelamin --</option>
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
                                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required="" value="{{ $masyarakat->tanggal_lahir }}">                                              @if($errors->has('tanggal_lahir'))
                                            <span class="form-text text-danger">{{$errors->first('tanggal_lahir')}}</span>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="form-group row mb-2 {{$errors->has('pekerjaan') ? 'has-error' : ''}}">
                                      <label for="pekerjaan" class="col-md-2 col-form-label">Pekerjaan</label>
                                      <div class="col-md-10">
                                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="{{ $masyarakat->pekerjaan }}" required="">
                                        @if($errors->has('pekerjaan'))
                                            <span class="form-text text-danger">{{$errors->first('pekerjaan')}}</span>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="form-group row mb-2 {{$errors->has('alamat') ? 'has-error' : ''}}">
                                      <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                                      <div class="col-md-10">
                                        <textarea name="alamat" class="form-control" id="alamat" required="">{{ $masyarakat->alamat }}</textarea>
                                        @if($errors->has('alamat'))
                                            <span class="form-text text-danger">{{$errors->first('alamat')}}</span>
                                        @endif
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">EDIT</button>
                                    <a href="{{ url('/') }}" class="btn btn-outline-primary">Kembali</a>
                                  </form>

                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
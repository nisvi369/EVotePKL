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
    <h1 class="text-center mt-4 mb-4">Edit Kandidat</h1>

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
                                        <form action="{{ url('/kandidat/update') }}/{{ $pemilihan->id }}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                          <div class="form-group row mb-2 {{$errors->has('nomor_urut') ? 'has-error' : ''}}">
                                            <label for="nomor_urut" class="col-md-2 col-form-label">Nomor Urut</label>
                                            <div class="col-md-10">
                                              <input name ="nomor_urut" type="text" class="form-control" id="nomor_urut" value="{{ $pemilihan->nomor_urut }}" required="">
                                              @if($errors->has('nomor_urut'))
                                                  <span class="form-text text-danger">{{$errors->first('nomor_urut')}}</span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="form-group row mb-2 {{$errors->has('jadwal') ? 'has-error' : ''}}">
                                            <label for="jadwal" class="col-md-2 col-form-label">Jadwal</label>
                                            <div class="col-md-10">
                                              <input type="date" name="jadwal" class="form-control" id="jadwal" required="" value="{{ $pemilihan->jadwal }}">     @if($errors->has('jadwal'))
                                                  <span class="form-text text-danger">{{$errors->first('jadwal')}}</span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="form-group row mb-2 {{$errors->has('foto') ? 'has-error' : ''}}">
                                            <label for="foto" class="col-md-2 col-form-label">Foto</label>
                                            <div class="col-md-10">
                                              <input name="foto" type="file" class="form-control-file mb-2" id="foto"><br>
                                              <img src="{{ url('img/foto_kandidat') }}/{{ $pemilihan->foto }}" class="rounded" width="20%">
                                              <input type="hidden" class="form-control-file" id="hidden_gambar" name="hidden_gambar" value="{{ $pemilihan->foto }}">
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
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
    <h1 class="text-center mt-4 mb-4">Daftar Kandidat</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Kandidat</li>
                  </ol>
                </nav>
            </div>

            @foreach($data as $kandidat)
            @if($kandidat->level == "kandidat")
            <div class="col-sm-4">
                <div class="shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                  <img src="{{ url('img/foto_kandidat') }}/{{ $kandidat->foto }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $kandidat->nama }}</li>
                    <li class="list-group-item">Nomor : {{ $kandidat->nomor_urut }}</li>
                    <li class="list-group-item">Jadwal : {{ date('d M Y', strtotime($kandidat->jadwal)) }}</li>
                  </ul>
                  <div class="card-body text-center">
                    <a href="{{ url('kandidat/edit') }}/{{ $kandidat->id }}" class="btn btn-primary">Edit</a>
                  </div>
                </div>
            </div>
            @endif
            @endforeach
            
       </div>
   </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>
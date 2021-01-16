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
    <h1 class="text-center mt-4 mb-4">Data Kandidat</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Kandidat</li>
                  </ol>
                </nav>
            </div>
            <form action="{{ url('kandidat/cari') }}" method="GET">
                @csrf
                <input type="text" name="cari" placeholder="Cari NIK ..." value="{{ old('cari') }}">
                <input type="submit" value="cari">
                <a href="{{ url('kandidat/detail') }}" class="btn-sm btn-dark" style="float: right; text-decoration: none;">Detail Kandidat</a>
            </form>
            <table class="table table-hover text-center col-md-12">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($masyarakat as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->tanggal_lahir }}</td>
                        <td>{{ $data->pekerjaan }}</td>
                        <td>{{ $data->alamat }}</td>
                        
                        <td>
                            @if($data->level == "pemilih")
                            <a href="{{ url('kandidat/lengkapi') }}/{{ $data->id }}" class="btn btn-primary">Lengkapi Data</a>
                            @elseif($data->level == "kandidat")
                            <span class="badge rounded-pill bg-info text-dark">Kandidat</span>
                            @endif
                            <!-- <form action="{{ url('kandidat/level_kandidat') }}/{{ $data->id }}" method="post">
                                @csrf
                                @if($data->level == "pemilih")
                                <button type="submit" class="btn btn-primary">Jadikan Kandidat</button>
                                @elseif($data->level == "kandidat")
                                <span class="badge rounded-pill bg-info text-dark">Kandidat</span>
                                @endif
                            </form> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       </div>
   </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>
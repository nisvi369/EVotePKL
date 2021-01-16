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
    <h1 class="text-center mt-4 mb-4">Data Masyarakat</h1>
    <div class="container">
        <a href="{{ url('masyarakat/tambah') }}" class="btn btn-primary">Tambah Data</a>
        <a href="{{ url('kandidat') }}" class="btn btn-primary">Tambah Kandidat</a>
        <table class="table table-hover col-md-12 mt-2">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Pekerjaan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
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
                        <a href="{{ url('/masyarakat/update') }}/{{ $data->id }}" class="btn btn-warning">Edit</a>
                        <a href="{{ url('masyarakat/delete') }}/{{ $data->id }}" onclick="return confirm('Anda akan menghapus barang ini ?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>
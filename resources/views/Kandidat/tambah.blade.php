@extends('template.master')

@section('title', 'Data Kandidat')

@section('content')
<h1 class="text-center mt-4 mb-4">Data Kandidat</h1>
<div class="container">
    <div class="card shadow p-3 mb-5 bg-white rounded">
        <div class="card-body">
            <div class="row">
                <form action="{{ url('/Admin/cari') }}" method="GET" class="col-md-12">
                    @csrf
                    <input type="text" name="cari" placeholder="Cari NIK ..." value="{{ old('cari') }}" required oninvalid="this.setCustomValidity('NIK harap diisi')" oninput="setCustomValidity('')">
                    <input type="submit" value="cari">
                    <!-- <a href="{{ url('kandidat/detail') }}" class="btn-sm btn-dark" style="float: right; text-decoration: none;">Detail Kandidat</a> -->
                </form>
                <div class="table-responsive">
                    <table class="table table-hover text-center col-md-12 mt-4">
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
                            @foreach($masyarakat as $no => $data)
                            <tr>
                                <td>{{ ++$no + ($masyarakat->currentPage()-1)*$masyarakat->perPage() }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->tanggal_lahir }}</td>
                                <td>{{ $data->nama_pekerjaan }}</td>
                                <td>{{ $data->alamat }}</td>
                                
                                <td>
                                    @if($data->level == "pemilih")
                                    <a href="{{ url('/Admin/lengkapi') }}/{{ $data->id }}" class="btn btn-primary">Lengkapi Data</a>
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
        </div>
    </div>
    <div class="d-block col-12">
      {{ $masyarakat->links() }}
    </div>
</div>
@endsection
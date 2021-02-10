@extends('template.master')

@section('title', 'Data Masyarakat')

@section('content')

<h1 class="text-center mt-4 mb-4">Data Masyarakat</h1>
<div class="container">
    <div class="card shadow p-3 mb-5 bg-white rounded">
        <div class="card-body">
            @if(auth()->user()->level == 'petugas')
            <a href="{{ url('/Petugas/tambah') }}" class="btn btn-primary">Tambah Data</a>
            <a href="{{ url('/Petugas/exportMasyarakat') }}" title="Export to Excel" class="btn btn-primary"><i class="far fa-file-excel">Export to Excel</i></a>
            @endif
            <button type="button" title="Import from Excel" class="btn btn-primary" data-toggle="modal" data-target="#importExcel"><i class="fas fa-file-upload">
			Import from Excel
            </i></button>
            <form action="{{ url('/Admin/cariMasyarakat') }}" method="GET" class="col-md-12">
                @csrf
                <input type="text" name="cari" placeholder="Cari NIK ..." value="{{ old('cari') }}" required oninvalid="this.setCustomValidity('NIK harap diisi')" oninput="setCustomValidity('')">
                <input type="submit" value="cari">
            </form>
 
		    <!-- Import Excel -->
		    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    	<div class="modal-dialog" role="document">
		    		<form method="post" action="/importMasyarakat" enctype="multipart/form-data">
		    			<div class="modal-content">
		    				<div class="modal-header">
		    					<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
		    				</div>
		    				<div class="modal-body">
    
		    					{{ csrf_field() }}
    
		    					<label>Pilih file excel</label>
		    					<div class="form-group">
		    						<input type="file" name="file" required="required">
		    					</div>
    
		    				</div>
		    				<div class="modal-footer">
		    					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		    					<button type="submit" class="btn btn-primary">Import</button>
		    				</div>
		    			</div>
		    		</form>
		    	</div>
		    </div>
            <!-- <a href="{{ url('kandidat') }}" class="btn btn-primary">Tambah Kandidat</a> -->
            <div class="table-responsive">
                <table class="table table-hover col-md-12 mt-2 text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            @if (Auth()->user()->level == 'petugas')
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($masyarakat as $no => $data)
                        <tr>
                            <td>{{ ++$no + ($masyarakat->currentPage()-1)*$masyarakat->perPage() }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            <td>{{ $data->tanggal_lahir }}</td>
                            <td>{{ $data->nama_pekerjaan }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                            @if (Auth()->user()->level == 'petugas')
                                <a href="{{ url('/Petugas/edit') }}/{{ $data->id }}" class="btn btn-warning btn-sm">Edit</a>
                                @if($data->level == 'pemilih')
                                <a href="{{ url('/Petugas/delete') }}/{{ $data->id }}" onclick="return confirm('Anda akan menghapus data {{$data->nik}} ini ?')" class="btn btn-danger btn-sm">Hapus</a>
                                @endif
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-block col-12">
      {{ $masyarakat->links() }}
    </div>
</div>
@endsection
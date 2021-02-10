@extends('template.master')

@section('title', 'Data Petugas')

@section('content')

<h1 class="text-center mt-4">Data Petugas</h1>
<div class="container">

{{-- notifikasi form validasi --}}
@if ($errors->has('file'))
<span class="invalid-feedback" role="alert">
	<strong>{{ $errors->first('file') }}</strong>
</span>
@endif

{{-- notifikasi sukses --}}
@if ($sukses = Session::get('sukses'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button> 
	<strong>{{ $sukses }}</strong>
</div>
@endif
    <div class="card shadow p-3 mb-5 bg-white rounded">
        <div class="card-body">
            <a href="/Admin/tambahPetugas" class="btn btn-primary mb-4">Tambah Data</a>
            <a href="/Admin/exportPetugas" title="Export to Excel" class="btn btn-primary mb-4"><i class="far fa-file-excel">Export to Excel</i></a>
            <button type="button" class="btn btn-primary mb-4" title="Import from Excel" data-toggle="modal" data-target="#importExcel"><i class="fas fa-file-upload">
			Import from Excel
            </i></button>
            <form action="{{ url('/Admin/cariPetugas') }}" method="GET" class="col-md-12">
                @csrf
                <input type="text" name="cari" placeholder="Cari NIK ..." value="{{ old('cari') }}" required oninvalid="this.setCustomValidity('NIK harap diisi')" oninput="setCustomValidity('')">
                <input type="submit" value="cari">
            </form>
 
		    <!-- Import Excel -->
		    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    	<div class="modal-dialog" role="document">
		    		<form method="post" action="/Admin/importPetugas" enctype="multipart/form-data">
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
            <div class="table-responsive">
                <table class="table table-hover col-md-12 text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Nama Kecamatan</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($petugas as $no => $p)
                        <tr class="tr-shadow">
                            <td>{{ ++$no + ($petugas->currentPage()-1)*$petugas->perPage() }}</td>
                            <td>{{$p->nik}}</td>
                            <td>{{$p->nama}}</td>
                            <td>{{$p->jenis_kelamin}}</td>
                            <td>{{$p->tanggal_lahir}}</td>
                            <td>{{$p->alamat}}</td>
                            <td>{{$p->nama_kecamatan}}</td>
                            <td>{{$p->email}}</td>
                            <td>
                                <div class="aksi2">
                                    <a href="/Admin/editPetugas/{{$p->id}}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/Admin/hapusPetugas/{{$p->id}}" class="btn btn-danger btn-sm" id="hapus" onclick="return confirm('Apakah Anda yakin akan menghapus data {{$p->nama}}?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <div class="d-block col-12">
    {{ $petugas->links() }}
    </div>
</div>
            
@endsection
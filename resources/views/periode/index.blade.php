@extends('template.master')

@section('title', 'PEriode Voting')

@section('content')
<h1 class="text-center mt-4 mb-4">Periode</h1>
<div class="container">
	
	<form action="{{ url('/postPeriode') }}" method="post">
		@csrf
	  	<div class="mb-3">
	  	  	<label for="tanggal_awal" class="form-label">Tanggal Awal</label>
	  	  	<input type="date" onfocus="(this.type='date')" class="form-control" id="tanggal_awal" name="tanggal_awal" @if(!empty($tanggal)) value="{{ $tanggal_awal->tanggal }}" @else value="Belum di set" @endif autocomplete="off">
	  	</div>
		<div class="mb-3">
	  	  	<label for="waktu_mulai" class="form-label">Waktu Mulai</label>
			<input type="time" onfocus="(this.type='time')" class="form-control" id="waktu_mulai" name="waktu_mulai" @if(!empty($waktu)) value="{{ $waktu_mulai->waktu }}" @else value="Belum di set" @endif autocomplete="off">
	  	</div>
		<div class="mb-3">
	  	  	<label for="waktu_akhir" class="form-label">Waktu Berakhir</label>
			<input type="time" onfocus="(this.type='time')" class="form-control" id="waktu_akhir" name="waktu_akhir" @if(!empty($waktu)) value="{{ $waktu_akhir->waktu }}" @else value="Belum di set" @endif autocomplete="off">
	  	</div>
	  	<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>

@endsection
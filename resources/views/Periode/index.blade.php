@extends('template.master')

@section('title', 'PEriode Voting')

@section('content')
<div class="jumbotron1">
<h1 class="text-center mt-4 mb-4">Periode</h1>
<div class="container">
	
	<form action="{{ url('/postPeriode') }}" method="post">
		@csrf
	  	<div class="mb-3">
	  	  	<label for="tanggal_awal" class="form-label">Tanggal Awal</label>
	  	  	<input type="datetime-local" class="form-control" id="tanggal_awal" name="tanggal_awal" @if(!empty($tanggal)) value="<?php echo date('Y-m-d\TH:i:sP', $row['Time']);?>" @else value="Belum di set" @endif autocomplete="off">
	  	</div>
		  <div class="mb-3">
	  	  	<label for="tanggal_akhir" class="form-label">Tanggal Awal</label>
	  	  	<input type="datetime-local" class="form-control" id="tanggal_akhir" name="tanggal_akhir" @if(!empty($tanggal)) value="<?php echo date('Y-m-d\TH:i:sP', $row['Time']);?>" @else value="Belum di set" @endif autocomplete="off">
	  	</div>
	  	<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>
</div>

@endsection
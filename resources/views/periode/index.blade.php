@extends('template.master')

@section('title', 'PEriode Voting')

@section('content')
<h1 class="text-center mt-4 mb-4">Periode</h1>
<div class="container">
	
	<form action="{{ url('/periode') }}" method="post">
		@csrf
	  <div class="mb-3">
	    <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
	    <input type="text" onfocus="(this.type='date')" class="form-control" id="tanggal_awal" name="tanggal_awal" @if(!empty($tanggal)) value="{{ $tanggal_awal->tanggal }}" @else value="{{ $tanggal_awal->tanggal }}" @endif autocomplete="off">
	  </div>
	  <div class="mb-3">
	    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
	    <input type="text" onfocus="(this.type='date')" class="form-control" id="tanggal_akhir" name="tanggal_akhir" @if(!empty($tanggal)) value="{{ $tanggal_akhir->tanggal }}" @else value="{{ $tanggal_akhir->tanggal }}" @endif autocomplete="off">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>

@endsection
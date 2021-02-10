<!DOCTYPE html>
<html>
<head>
	<title>Data Kandidat</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table {
            border-collapse: collapse;
            text-align: center;
        }
    	td, th{ 		
    		border:1px solid black; 
    		padding: 12px;	
    	}
    	img{
    		width: 200px;
    		height: 200px;
    	}
    	hr{
    		border: 1px solid red;
    	}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="{{ asset('img/kotak.png') }}">
			</div>
			<div class="col-md-9 text-center">
				<br><br>
				<h1>VoJr (Vote Jember)</h1>
				<p>Jl. Kalimantan No. 31, Sumbersari, Kabupaten Jember, Jawa Timur 68121, Indonesia. Nomor telepon: (0331) 333815</p>
			</div>
		</div>
	</div>
	<hr>
	
    
	<center>
		<br>
		<h3>DAFTAR DATA KANDIDAT</h3><br><br>
	</center>

	
	<table class="col-md-12">
		<thead>
	        <tr>
	        	<th>Nomor Urut</th>
	            <th>NIK</th>
	            <th>Nama</th>
	            <th>Jenis Kelamin</th>
	            <th>Tanggal Lahir</th>
	            <th>Pekerjaan</th>
	            <th>Email</th>
	            <th>Alamat</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($pemilihan as $p)
	        <tr>
	        	<td>{{ $p->nomor_urut }}</td>
	            <td>{{$p->nik}}</td>
	            <td>{{$p->nama}}</td>
	            <td>{{$p->jenis_kelamin}}</td>
	            <td>{{ Carbon\Carbon::parse($p->tanggal_lahir)->translatedFormat("d F Y") }}</td>
	            <td>{{$p->nama_pekerjaan}}</td>
	            <td>{{$p->email}}</td>
	            <td>{{$p->alamat}}</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>
	<br><br>
	<?php  
		$kandidat = DB::table('pemilihan')->count('nomor_urut');
		$pemenang  = DB::table('hasil')->select('pemilihan_id')->groupBy('pemilihan_id')->count();
		$hasil = DB::table('hasil')->select('masyarakat_id')->count();
	?>
	<!-- <p>Pemenang : {{ $pemenang }}</p> -->
	<b>Jumlah Kandidat : {{ $kandidat }}</b><br>
	<b>Jumlah Pemilih : {{ $hasil }}</b>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>
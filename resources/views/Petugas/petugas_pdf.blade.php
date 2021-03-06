<!DOCTYPE html>
<html>
<head>
	<title>Data Petugas</title>
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
		<h3>DAFTAR DATA PETUGAS</h3><br><br>
	</center>

	<table class="col-md-12">
		<thead>
	        <tr>
	            <th>NIK</th>
	            <th>Nama</th>
	            <th>Jenis Kelamin</th>
	            <th>Tanggal Lahir</th>
	            <th>Alamat</th>
	            <th>Nama Kecamatan</th>
	            <th>Email</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($petugas as $p)
	        <tr>
	            <td>{{$p->nik}}</td>
	            <td>{{$p->nama}}</td>
	            <td>{{$p->jenis_kelamin}}</td>
	            <td>{{Carbon\Carbon::parse($p->tanggal_lahir)->translatedFormat("d F Y")}}</td>
	            <td>{{$p->alamat}}</td>
	            <td>{{$p->nama_kecamatan}}</td>
	            <td>{{$p->email}}</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>
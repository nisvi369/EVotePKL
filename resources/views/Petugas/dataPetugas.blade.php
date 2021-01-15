<div class="table-responsive table-responsive-data2">
    <table class="table table-striped">
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
            <tr class="tr-shadow">
                <td>{{$p->nik}}</td>
                <td>{{$p->nama}}</td>
                <td>{{$p->jenisKelamin}}</td>
                <td>{{$p->tanggalLahir}}</td>
                <td>{{$p->alamat}}</td>
                <td>{{$p->namaKecamatan}}</td>
                <td>{{$p->email}}</td>
                <td>
                <div class="aksi2">
                <a href="/editPetugas/{{$p->id}}" class="btn btn-warning btn-sm">Edit</a>
                <a href="/hapusPetugas/{{$p->id}}" class="btn btn-secondary btn-sm" id="hapus" onclick="return confirm('Apakah Anda yakin akan menghapus {{$p->nama}}?')">Delete</a>
              </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
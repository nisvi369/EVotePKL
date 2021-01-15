<div class="container" id="form">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="/postFormPetugas" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik" value="" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <label for="title">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <label for="title">Jenis Kelamin</label>
                    <select name="jenisKelamin"class="form-control" >
                        <option value="">- Pilih Jenis Kelamin -</option>
                        <option value="Laki-Laki" {{ old('jenisKelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ old('jenisKelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" value="" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <label for="gambar">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <label for="gambar">Daerah Tugas</label>
                    <select class="form-control" name="id_kecamatan" id="id_kecamatan" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')">
                        <option>Pilih Kecamatan</option>
                        @foreach ($kecamatan as $k)
                            <option 
                                value="{{ $k->id }}">{{ $k->namaKecamatan}}
                            </option>
                        @endforeach
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar">Email</label>
                    <input type="text" name="email" id="email" value="" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <label for="gambar">Password</label>
                    <input type="text" name="password" id="password" value="" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
                </div>
                <br>
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="/" class="btn btn-light">Kembali</a>
            </form>
        </div>
    </div>
</div>
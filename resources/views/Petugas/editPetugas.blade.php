<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">Edit Data Petugas</h3>
                    <form method="POST" action="/dataPetugas/{{$petugas->id}}/update" class="col-md-6">
                    {{csrf_field()}}
                    <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik" value="{{$petugas->nik}}" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <label for="title">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="{{$petugas->nama}}" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
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
                    <input type="date" name="tanggalLahir" id="tanggalLahir" value="{{$petugas->tanggalLahir}}" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <label for="gambar">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="{{$petugas->alamat}}" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
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
                    <input type="text" name="email" id="email" value="{{$petugas->email}}" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <label for="gambar">Password</label>
                    <input type="text" name="password" id="password" value="{{$petugas->password}}" required oninvalid="this.setCustomValidity('Form Data Petugas Harap Diisi Semua')" oninput="setCustomValidity('')"/>
                </div>

                    <a href="/pabrikRendemen" type="button" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
            </div>
        </div>
    </div>
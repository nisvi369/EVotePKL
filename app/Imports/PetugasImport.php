<?php

namespace App\Imports;

use App\Petugas;
use Maatwebsite\Excel\Concerns\ToModel;

class PetugasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Petugas([
            'nik' => $row[1],
            'nama' => $row[2], 
            'jenis_kelamin' => $row[3], 
            'tanggal_lahir' => $row[4],
            'alamat' => $row[5],
            'email' => $row[6],
            'password' => $row[7],
            'id_kecamatan' => $row[8],
            'level' => $row[9],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Masyarakat;
use Maatwebsite\Excel\Concerns\ToModel;

class MasyarakatImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Masyarakat([
            'nama' => $row[1],
            'nik' => $row[2], 
            'email' => $row[3], 
            'password' => $row[4],
            'jenis_kelamin' => $row[5],
            'tanggal_lahir' => $row[6],
            'alamat' => $row[7],
            'level' => $row[8],
            'id_pekerjaan' => $row[9],
        ]);
    }
}

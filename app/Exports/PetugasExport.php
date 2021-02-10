<?php

namespace App\Exports;

use App\Petugas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PetugasExport implements FromCollection, withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $petugas = DB::table('petugas')
        -> join('kecamatan','kecamatan.id', '=', 'petugas.id_kecamatan')
        -> select('petugas.id','petugas.nik','petugas.nama','petugas.jenis_kelamin','petugas.tanggal_lahir','petugas.alamat','petugas.email','kecamatan.nama_kecamatan', 'petugas.level')
        -> orderBy('petugas.nik', 'asc')
        -> get();

        return ($petugas);
    }

    public function headings() : array{
        return [
            'ID',
            'NIK',
            'NAMA',
            'JENIS KELAMIN',
            'TANGGAL LAHIR',
            'ALAMAT',
            'EMAIL',
            'WILAYAH TUGAS',
            'LEVEL',
        ];
    }
}

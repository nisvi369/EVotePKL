<?php

namespace App\Exports;

use App\Masyarakat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class MasyarakatExport implements FromCollection, withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $masyarakat = DB::table('masyarakat')
        -> join('pekerjaan','pekerjaan.id', '=', 'masyarakat.id_pekerjaan')
        -> select('masyarakat.id','masyarakat.nik','masyarakat.nama','masyarakat.jenis_kelamin','masyarakat.tanggal_lahir','masyarakat.alamat','masyarakat.email','pekerjaan.nama_pekerjaan','masyarakat.level')
        -> orderBy('masyarakat.nama', 'asc')
        -> get();
        
        return ($masyarakat);
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
            'PEKERJAAN',
            'LEVEL',
        ];
    }
}

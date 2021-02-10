<?php

namespace App\Exports;

use App\Hasil;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HasilExport implements FromCollection, withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Hasil::all();
    }

    public function headings() : array{
        return [
            'id',
            'pemilihan_id',
            'masyarakat_id',
            'created_at',
            'updated_at',
        ];
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = ['namaKecamatan',];
    protected $table = 'Kecamatan';

    public function petugas() {
    	return $this->hasOne('App\Petugas');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaan';
    protected $fillable = ['nama_pekerjaan'];

    public function masyarakat() {
    	return $this->hasOne('App\Masyarakat');
    }
}

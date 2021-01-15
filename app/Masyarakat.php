<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakat';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'nik', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'pekerjaan', 'level', 'password'];

    public function Kampanye() {
    	return $this->hasOne('App\Kampanye');
    }
}

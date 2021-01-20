<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakat';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'nik', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'pekerjaan', 'level', 'password'];

    public function pemilihan()
    {
        return $this->hasMany('App\Pemilihan', 'masyarakat_id', 'id');
    }
    public function Kampanye() {
    	return $this->hasOne('App\Kampanye');
    }
    public function hasil()
    {
        return $this->hasOne('App\Hasil', 'masyarakat_id');
    }
}

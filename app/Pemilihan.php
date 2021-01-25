<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilihan extends Model
{
    protected $table = 'pemilihan';
    protected $primaryKey = 'id';
    protected $fillable = ['jadwal', 'nomor_urut', 'foto', 'pemilihan_id', 'masyarakat_id'];

    public function masyarakat()
	{
	    return $this->belongsTo('App\Masyarakt', 'masyarakat_id', 'id');
	}

	public function hasil()
    {
        return $this->hasMany('App\Hasil', 'pemilihan_id', 'id');
    }
}

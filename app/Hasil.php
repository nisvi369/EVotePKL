<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasil';
    protected $primaryKey = 'id';
    protected $fillable = ['hasil_pilihan', 'nomor_urut'];

    public function masyarakat()
    {
    	return $this->belongsTo('App\Masyarakat');
    }

    public function pemilihan()
	{
	    return $this->belongsTo('App\Pemilihan', 'pemilihan_id', 'id');
	}
}

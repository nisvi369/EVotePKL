<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kampanye extends Model
{
	protected $table = "kampanye";
	protected $primaryKey = "id";
    protected $fillable = ['id_pemilihan','judul','gambar','waktu','konten'];

    public function pemilihan()
	{
	    return $this->belongsTo('App\Pemilihan', 'id_pemilihan', 'id');
	}
}

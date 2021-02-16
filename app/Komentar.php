<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = "komentar";
	protected $primaryKey = "id";
    protected $fillable = ['id_kampanye','id_masyarakat','komen'];

    public function masyarakat()
	{
	    return $this->belongsTo('App\Masyarakat', 'id_masyarakat', 'id');
	}

    public function kampanye()
	{
	    return $this->belongsTo(Kampanye::class);
	}
}
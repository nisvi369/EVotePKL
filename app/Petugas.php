<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
	use Notifiable;

	protected $table = 'petugas';
	protected $primaryKey = 'id';
    protected $fillable = ['nik','nama','jenis_kelamin','alamat','tanggal_lahir','id_kecamatan','email','password','level'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kecamatan()
    {
    	return $this->belongsTo('App\Kecamatan');
    }
	
}

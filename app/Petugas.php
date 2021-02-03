<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Exports\PetugasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class Petugas extends Authenticatable
{
	use Notifiable;

	protected $table = 'petugas';
	protected $primaryKey = 'id';
    protected $fillable = ['NIK','nama','jenisKelamin','alamat','tanggalLahir','id_kecamatan','email','password','level'];

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

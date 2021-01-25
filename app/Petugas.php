<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
	protected $guard = 'petugas';
	protected $table = 'petugas';
	protected $primaryKey = 'id';
    protected $fillable = ['NIK','nama','jenisKelamin','alamat','tanggalLahir','id_kecamatan','email','password'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
	protected $table = 'Petugas';
	protected $primaryKey = 'id';
    protected $fillable = ['NIK','nama','jenisKelamin','alamat','tanggalLahir','id_kecamatan','email','password'];
}

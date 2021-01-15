<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $fillable = ['NIK','nama','jenisKelamin','alamat','tanggalLahir','idKecamatan','email','password'];
    protected $table = 'Petugas';
}

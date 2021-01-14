<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $fillable = ['NIK','nama','jenisKelamin','alamat','tanggalLahir','daerahTugas','email','password'];
    protected $table = 'Petugas';
}

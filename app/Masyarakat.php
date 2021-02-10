<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use Notifiable;

    protected $table = "masyarakat";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama', 'nik', 'password', 'email', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'id_pekerjaan', 'level',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

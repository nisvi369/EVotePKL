<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kampanye extends Model
{
    protected $fillable = ['id_masyarakat','judul','gambar','tanggal','jam','konten'];
    protected $table = 'Kampanye';
}

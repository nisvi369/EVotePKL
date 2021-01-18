<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['nama','email','password'];
    protected $table = 'Admin';
}

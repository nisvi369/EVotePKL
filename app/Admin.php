<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $guard = 'admin';
    protected $fillable = ['nama','email','password'];
    protected $table = 'admin';
}

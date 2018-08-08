<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
	use SoftDeletes;
	
    protected $table = 'contacts';
    protected $fillable = ['id', 'name', 'email', 'phone', 'country', 'city', 'region', 'postal_code', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];
}


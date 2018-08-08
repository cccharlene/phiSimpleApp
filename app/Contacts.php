<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['id', 'name', 'email', 'phone', 'country', 'city', 'region', 'postal_code', 'created_at', 'updated_at'];
}

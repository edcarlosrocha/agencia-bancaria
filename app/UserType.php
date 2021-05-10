<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $fillable = [
		'name'
    ];


    protected $casts = [
    	'name' => 'string'
    ];
}

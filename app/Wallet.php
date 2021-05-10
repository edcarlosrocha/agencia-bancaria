<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
		'user_id',
		'balance'
    ];

    protected $casts = [
		'user_id' => 'integer',
		'balance' => 'decimal'
    ];
}

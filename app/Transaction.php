<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'value',
        'payer_id',
        'payee_id'
    ];


    protected $casts = [
        'value' => 'float',
        'payer_id' => 'integer',
        'payee_id' => 'integer',
        'authorized' => 'boolean',
        'authorization_http_status' => 'integer',
        'authorization_response' => 'string'
    ];
}

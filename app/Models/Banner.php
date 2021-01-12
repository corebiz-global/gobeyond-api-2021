<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['image', 'order', 'available_at', 'expires_in'];

    protected $casts = [
        'available_at' => 'datetime',
        'expires_in'   => 'datetime',
    ];
}
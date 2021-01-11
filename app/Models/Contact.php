<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'authorize_receiving_emails',
    ];

    protected $casts = [
        'authorize_receiving_emails' => 'boolean'
    ];
}

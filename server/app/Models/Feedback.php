<?php

namespace App\Models;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'type',
        'message',
        'contact',
    ];

}
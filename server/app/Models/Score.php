<?php

namespace App\Models;

class Score extends Model
{
    protected $fillable = [
        'book_id',
        'module_id',
        'username',
        'average_time',
    ];
}
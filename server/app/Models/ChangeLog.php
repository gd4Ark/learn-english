<?php

namespace App\Models;

class ChangeLog extends Model
{
    protected $fillable = [
        'version',
        'feat',
        'fix',
    ];

}
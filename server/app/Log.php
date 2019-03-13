<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model{

    protected $fillable = [
        'id',
        'version',
        'feat',
        'fix',
        'created_at',
        'updated_at'
    ];
}

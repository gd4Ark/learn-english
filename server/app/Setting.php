<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model{

    protected $fillable = [
        'rank_limit_quantity',
        'partial_spell_proportion',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

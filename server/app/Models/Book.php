<?php

namespace App\Models;

class Book extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function words(){
        return $this->hasMany('App\Models\Word');
    }
}
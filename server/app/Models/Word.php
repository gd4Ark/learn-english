<?php

namespace App\Models;

class Word extends Model
{
    protected $fillable = [
        'chinese',
        'english',
        'book_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book(){
        return $this->hasOne('books');
    }
}
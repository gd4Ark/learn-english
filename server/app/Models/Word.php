<?php

namespace App\Models;

class Word extends Model
{
    protected $fillable = [
        'chinese',
        'english',
        'book_id',
    ];

    protected $hidden = [
        'book_id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book(){
        return $this->hasOne('books');
    }
}
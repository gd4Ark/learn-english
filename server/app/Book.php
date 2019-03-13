<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model{

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

    public function setTitleAttribute($name){
        $this->attributes['name'] = trim($name);
    }

    public function english(){
        return $this->hasMany(English::class,'book_id','id');
    }
}

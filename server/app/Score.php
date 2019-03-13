<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model{

    protected $fillable = [
        'id',
        'book_id',
        'review_module',
        'username',
        'time',
        'created_at',
        'updated_at'
    ];

    public function setUsernameAttribute($name){
        $this->attributes['username'] = trim($name);
    }

    public function english(){
        return $this->hasMany(English::class,'book_id','id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class English extends Model{

    protected $fillable = [
        'id',
        'book_id',
        'english',
        'chinese',
        'created_at',
        'updated_at'
    ];

    public function setChineseAttribute($chinese){
        $this->attributes['chinese'] = trim($chinese);
    }

    public function setEnglishAttribute($english){
        $english = merge_spaces($english);
        $this->attributes['english'] = trim($english);
    }
}

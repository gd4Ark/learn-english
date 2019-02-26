<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class English extends Model{

    protected $table = 'english';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','book_id','english','chinese','created_at','updated_at'];

    public $timestamps = false;

    public function setChineseAttribute($chinese){
        $this->attributes['chinese'] = trim($chinese);
    }

    public function setEnglishAttribute($english){
        $english = merge_spaces($english);
        $this->attributes['english'] = trim($english);
    }

    public static function boot() {
        parent::boot();

        static::creating(function($model) {
            $dt = date('Y-m-d:H-i-s');
            $model->created_at = $dt;
            $model->updated_at = $dt;
            return true;
        });

        static::updating(function($model) {
            $dt = date('Y-m-d:H-i-s');
            $model->updated_at = $dt;
            return true;
        });
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model{

    protected $table = 'book';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','name','created_at','updated_at'];

    public $timestamps = false;

    public function setTitleAttribute($name){
        $this->attributes['name'] = trim($name);
    }

    public function english(){
        return $this->hasMany(English::class,'book_id','id');
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

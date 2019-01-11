<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model{

    protected $table = 'score';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','book_id','module','username','time','created_at','updated_at'];

    public $timestamps = false;

    public function setUsernameAttribute($name){
        $this->attributes['username'] = trim($name);
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

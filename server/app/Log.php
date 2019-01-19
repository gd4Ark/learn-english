<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model{

    protected $table = 'log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','version','feat','fix','created_at','updated_at'];

    public $timestamps = false;


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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model{

    protected $table = 'feedback';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','type','message','contact','created_at','updated_at'];

    public $timestamps = false;

    public function getTypeAttribute($val){
        switch ($val){
            case 0:
                return '遇到问题';
            case 1:
                return '新功能建议';
        }
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model{

    protected $table = 'setting';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['rank_limit_quantity','partial_spell_proportion','created_at','updated_at'];

    public $timestamps = false;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

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

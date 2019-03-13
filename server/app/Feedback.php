<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model{

    protected $fillable = [
        'id',
        'type',
        'message',
        'contact',
        'created_at',
        'updated_at'
    ];

    public function getTypeAttribute($val){
        switch ($val){
            case 0:
                return '遇到问题';
            case 1:
                return '新功能建议';
        }
    }
}

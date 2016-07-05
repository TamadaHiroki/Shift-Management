<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserCustom extends Authenticatable
{
    protected $table = 'users'; //テーブル名指定

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'username', 'password', 'email','store_id', 'position_id', 'tell'
    ];

    public function shift(){
        return $this->hasMany('App\Shift', 'user_id', 'id');
    }

    public function user_worktime(){
        return $this->hasMany('App\UserCustom', 'user_id', 'id');
    }

    public function position(){
        return $this->belongsTo('App\Position', 'position_id', 'id');
    }

    public function store(){
        return $this->belongsTo('App\Store', 'store_id', 'id');
    }
}

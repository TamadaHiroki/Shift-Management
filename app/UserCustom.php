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
        'username', 'password', 'email','employee_id', 'store_id', 'position_id', 'tell'
    ];
}

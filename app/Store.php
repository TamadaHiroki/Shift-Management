<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Store extends Authenticatable
{
    protected $table = 'stores'; //テーブル名指定

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_name', 'shiftAdmin_id',
    ];

    public function user()
    {
        return $this->hasMany('App\UserCustom', 'store_id', 'id');
    }

    public function shiftAdmin()
    {
        return $this->hasOne('App\ShiftAdmin', 'id', 'shiftAdmin_id');
    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Position extends Authenticatable
{
    protected $table = 'position'; //テーブル名指定

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'position', 'password', 'start_time','end_time',
    ];

    public function position()
    {
        return $this->hasOne('App\UserCustom', 'position_id', 'id');
    }
}

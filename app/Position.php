<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position'; //テーブル名指定

    public function users(){
        return $this->hasMany('App\User','position_id','id');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position'; //テーブル名指定
    
    protected $fillable = [
        'id', 'position', 'start_time', 'end_time'
    ];

    public function users(){
        return $this->hasMany('App\UserCustom', 'position_id', 'id');
    }
    
    public function hope_numbers(){
        return $this->hasMany('App\HopeNumber', 'position_id', 'id');
    }
}

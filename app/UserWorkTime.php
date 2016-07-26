<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorkTime extends Model
{
    protected $table = 'user_worktime'; //テーブル名指定

    protected $fillable = [
        'id', 'user_id', 'week_day', 'start_time', 'end_time'
    ];
    
    public function user(){
        return $this->belongsTo('App\UserCustom', 'user_id', 'id');
    }
}

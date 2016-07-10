<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HopeNumber extends Model
{
    protected $table = 'hope_number'; //テーブル名指定

    protected $fillable = [
        'id', 'week_day', 'hope_time', 'hope_number', 'position_id'
    ];

    public function position(){
        return $this->belongsTo('App\Position', 'position_id', 'id');
    }
}

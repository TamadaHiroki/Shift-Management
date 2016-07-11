<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorkTime extends Model
{
    protected $fillable = [
        'id', 'user_id', 'week_day', 'start_time', 'end_time'
    ];
    
    public function user(){
        return $this->belongsTo('App\UserCustom', 'user_id', 'id');
    }
}

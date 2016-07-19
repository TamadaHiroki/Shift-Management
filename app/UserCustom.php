<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Shift;
use Carbon\Carbon;

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

    public function shifts(){
        return $this->hasMany('App\Shift', 'user_id', 'id');
    }

    public function user_worktime(){
        return $this->hasMany('App\UserCustom', 'user_id', 'id');
    }

    public function position(){
        return $this->belongsTo('App\Position', 'position_id', 'id');
    }

    public function store(){
        return $this->belongsTo('App\Stores', 'store_id', 'id');
    }

    public function getShift($day,$user_id){
        $day = Carbon::parse($day);
        $e = Shift::where('start','=>',$day->format('Y-m-d 00:00:00'))->where('end','<',$day->addDays(1)->format('Y-m-d 00:00:00'))
            ->where('user_id',$user_id)->first(); //タイムスタンプ型をCarbonでParseする
        return $e;
    }
}

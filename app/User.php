<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Shift;
use Carbon\Carbon;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function shifts(){
        return $this->hasMany('App\Shift','user_id','id');
    }

    public function getShift($day,$user_id){
//        $day = Carbon::parse($day);
//        return Shift::where('start','=>',$day->format('Y-m-d H:i:s'))->where('end','<',$day->addDays(1)->format('Y-m-d H:i:s'))
//            ->where('user_id',$user_id)->first();
        $day = Carbon::parse($day);
        $e = Shift::where('start','>=',$day->format('Y-m-d 00:00:00'))->where('end','<',$day->addDays(1)->format('Y-m-d 00:00:00'))
            ->where('user_id',$user_id)->first(); //タイムスタンプ型をCarbonでParseする
        return $e;
    }
}

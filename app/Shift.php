<?php
/**
 * Created by PhpStorm.
 * User: 2130155
 * Date: 2016/07/05
 * Time: 14:56
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shift extends Model{

        protected $table = 'shift'; //テーブル名指定

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'id', 'user_id', 'start', 'end'
        ];

    public function user(){
        return $this->belongsTo('App\UserCustom', 'user_id', 'id');
    }

    public function getStartTime(){
        date_default_timezone_set('Asia/Tokyo');
        $carbon = Carbon::parse($this->start);
        $day = date('m/d');
        return $carbon->format('h:i');
    }

    public function getEndTime(){
        $carbon = Carbon::parse($this->end);
        return $carbon->format('h:i');
    }
}
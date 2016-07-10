<?php
/**
 * Created by PhpStorm.
 * User: 2130155
 * Date: 2016/07/05
 * Time: 14:56
 */

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Shift extends Authenticatable
{
    protected $table = 'shift'; //テーブル名指定

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'start_time', 'end_time'
    ];

    public function user(){
        return $this->belongsTo('App\UserCustom', 'user_id', 'id');
    }
}
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
    
    protected $fillable = [
        'id', 'user_id', 'start', 'end'
    ];

    /**
     * @var array
     * $datesプロパティを設定すると$datesプロパティが指すフィールドに対して
     * データを取得した際にDateTime型のラッパークラスであるCarbonクラスのデータに置き換える処理を自動でやってくれる
     * 便利！
     */
    protected $dates = ['start', 'end'];

    public function user(){
        return $this->belongsTo('App\UserCustom', 'user_id', 'id');
    }

    public function getStartTime(){
        $carbon = Carbon::parse($this->start);
        return $carbon->format('H:i');
    }

    public function getEndTime(){
        $carbon = Carbon::parse($this->end);
        return $carbon->format('H:i');
    }
}
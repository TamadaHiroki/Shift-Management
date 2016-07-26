<?php

namespace App\Http\Controllers;

use App\HopeNumber;
use App\Position;
use App\Shift;
use App\ShiftAdmin;
use App\UserCustom;
use App\UserWorkTime;
use Carbon\Carbon;
use DateTime;
use Auth;

use App\Http\Requests;

class AutoShiftCreateController extends Controller
{

    //オートでシフトを作成する
    public function autoShiftCreate()
    {

        $monthArray = $this->createMonth();

        $array = array();

        $storeUsers = array();

        //入ってる人数
        $hope = 0;

        $week_day = 0;

        $starttime = "";

        //曜日から希望人数IDを取得する
        $hopeIds = HopeNumber::orderBy('week_day', 'asc')->get();

        foreach($hopeIds as $hopeId){

            if($week_day != $hopeId -> week_day){
                $hopeNumber = 0;
            }

            //希望人数IDから時間・希望人数・希望勤務時間を取得(希望人数表から)
            $week_day = $hopeId ->week_day;
            $time = $hopeId ->hope_time;
            $hopeNumber = $hopeId ->hope_number;
            $positionId = $hopeId -> position_id;
            $ShiftUser =  Auth::guard('shiftAdmin')->user();
            $ShiftUser = $ShiftUser->store->users;

            //ポジションIDと同じ従業員を全員取得(従業員表から)
            foreach ($ShiftUser as $user){
                if($user->position_id == $positionId){
                    array_push($storeUsers, $user);
                }
            }

            for($i = 0; $i < count($storeUsers); $i++){

                $flg = 0;

                if($hopeNumber == $hope){
                    break;
                }

                $startendtime = UserWorkTime::where('user_id', $storeUsers[$i]->id)->where('week_day', $week_day)->first();

                $start_hour = (int)preg_replace('/:[0-9]{2}|:[0-9]{2}$/','',$startendtime->start_time);
                $start_minute = (int)preg_replace('/^[0-9]{2}:|:[0-9]{2}$/','',$startendtime->start_time);
                $end_hour = (int)preg_replace('/:[0-9]{2}|:[0-9]{2}$/','',$startendtime->end_time);
                $end_minute = (int)preg_replace('/^[0-9]{2}:|:[0-9]{2}$/','',$startendtime->end_time);
                $hope_hour = (int)preg_replace('/:[0-9]{2}|:[0-9]{2}$/','',$time);
                $hope_minute = (int)preg_replace('/^[0-9]{2}:|:[0-9]{2}$/','',$time);

                if($start_hour * 3600 + $start_minute * 60 >= $hope_hour * 3600 + $hope_minute * 60){
                    $starttime = $monthArray[$i]['year'] . "-" . $monthArray[$i]['month'] . "-" . $monthArray[$i]['day'] . " " . $startendtime->start_time;
                    $endtime = $monthArray[$i]['year'] . "-" . $monthArray[$i]['month'] . "-" . $monthArray[$i]['day'] . " " . $startendtime->end_time;
                    array_push($array, array('user_id' => $user->id, 'start' => $starttime, 'end' => $endtime));
                }

            }

//            while($hopeNumber < $hope){
//                $hope--;
//
//            }
//
//            //従業員分ループ
//            foreach($storeUsers as $user){
//
//                if($hopeNumber == $hope){
//                    break;
//                }
//
//                $flg = 0;
//
//                //従業員ID・曜日から勤務時間を取得(従業員勤務時間表から)
//                $startendtime = UserWorkTime::where('user_id', $user->id)->where('week_day', $week_day)->first();
//
//                if(strtotime($time) >= strtotime($startendtime->start_time) && strtotime($time) < strtotime($startendtime->end_time)) {
//                    $flg = 1;
//                    $starttime = $startendtime->start_time;
//                }
//                if(strtotime($time) >= strtotime($startendtime->end_time) && $flg == 1){
//                    $endtime = $startendtime->end_time;
//                }
//
//                foreach ($monthArray as $month) {
//                    if($week_day == $month['week_num']) {
//                        $starttime = $month['year'] . "-" . $month['month'] . "-" . $month['day'] . " " . $starttime;
//                        $endtime = $month['year'] . "-" . $month['month'] . "-" . $month['day'] . " " . $endtime;
//                        array_push($array, array('user_id' => $user->id, 'start' => $starttime, 'end' => $endtime));
//                    }
//
//                }
//
//            }

        }

        return $array;

        return redirect('/shift/adjustment');

    }

    public function formatRetuenTimes($times){
        $return_times = array();
        $format = 'Y-m-d H:i:s';
        for($i = 0; $i < count($times); $i++){
            $start =
                $times[$i]['year'] . "-" . str_pad($times[$i]['month'], 2, 0, STR_PAD_LEFT) . "-" . str_pad($times[$i]['day'], 2, 0, STR_PAD_LEFT)
                . " " . str_pad($times[$i]['start_time'], 2, 0, STR_PAD_LEFT) . ":" . str_pad($times[$i]['start_minute'], 2, 0, STR_PAD_LEFT) . ":00";
            $start = DateTime::createFromFormat($format, $start);

            $end =
                $times[$i]['year'] . "-" . str_pad($times[$i]['month'], 2, 0, STR_PAD_LEFT) . "-" . str_pad($times[$i]['day'], 2, 0, STR_PAD_LEFT)
                . " " . str_pad($times[$i]['end_time'], 2, 0, STR_PAD_LEFT) . ":" . str_pad($times[$i]['end_minute'], 2, 0, STR_PAD_LEFT) . ":00";
            $end = DateTime::createFromFormat($format, $end);

            //配列に追加 'Key' => 'Value'
            array_push($return_times, array('user_id' => $times[$i]['user_id'], 'start' => $start, 'end' => $end));
        }
        return $return_times;
    }

    //翌月 1ヶ月分を生成
    public function createMonth(){
        $month = array();
        $week = array("日", "月", "火", "水", "木", "金", "土");
        //$time = new Carbon('first day of next months');     //翌月の1日目
        //$end = new Carbon('last day of next months');   //翌月の最終日
        $time = Carbon::parse('+ 1 month')->firstOfMonth();
        //$time->setTimezone('Asia/Tokyo');   //タイムゾーンを設定
        $end = Carbon::parse('+ 1 month')->endOfMonth();

        for($i = 1; $i <= $end->day; $i++){
            $year = $time->year;
            $dt_month = $time->month;
            $day = $time->day;
            $hour = $time->hour;
            $minute = $time->minute;
            $week_day = (int)$time->format('w');
            array_push($month, array('year' => $year, 'month' => $dt_month, 'day' => $day, 'hour' => $hour,
                'minute' => $minute, 'week' => $week[$week_day], 'week_num' => $week_day));
            $time->addDay();    //1日進める
        }
        return $month;
    }

}
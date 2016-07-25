<?php
/**
 * Created by PhpStorm.
 * User: 2130155
 * Date: 2016/07/05
 * Time: 14:47
 */
namespace App\Http\Controllers;

use App\UserCustom;
use App\Position;
use App\Shift;
use App\ShiftAdmin;
use App\Stores;
use Auth;
use Request;
use Carbon\Carbon;
use DateTime;

class ShiftAdjustmentController extends Controller{

    public function adjustment(){
        if (Request::isMethod('post')){
            $shifts = Request::input('shifts');
            //return $shifts;
            $shift_users = $this->formatRetuenTimes($shifts);
            $shift_table = Shift::all();

            foreach ($shift_users as $shift_user){
                $update_flg = false;
                foreach ($shift_table as $shift){
                    $Ymd_check = (string)$shift->start->format('Y-m-d');
                    //すでにシフトテーブルに同じ従業員iDかつ同じ曜日があれば更新処理
                    if($Ymd_check == $shift_user['check'] && $shift['user_id'] == $shift_user['user_id']){
                        $shift->fill($shift_user)->save();  //条件にあてはまるところを更新
                        $update_flg = true;
                        break;
                    }
                }
                if($update_flg == false){  //無ければ新規作成
                    Shift::create($shift_user);
                }
            }
            return redirect('/shift/adjustment');
        }else{
            //ログインしているShiftAdminの店舗に属するユーザー取得
            //Shiftテーブルから取得したユーザーのIDと同じカラム取得
            $shift_admin_id = Auth::guard('shiftAdmin')->user();
            
            //シフト管理者の店舗に属するユーザーたち ポジションを昇順に並べて置く
            $users = UserCustom::where('store_id', $shift_admin_id->id)->orderBy('position_id', 'asc')->get();

            $month = $this->createMonth();      //翌月を生成

            //ユーザーごとのShift情報を取得, ユーザーごとのWorkTime情報を取得
            $user_works = array();
            $user_shifts = array();
            foreach ($users as $user){
                $week = array();
                foreach ($user->user_worktime as $work){
                    $start_hour = date_format(Carbon::parse($work['start_time']), 'H');
                    $start_hour = preg_replace('/^0/','',$start_hour);
                    $start_minute = date_format(Carbon::parse($work['start_time']), 'i');
                    $start_minute = str_replace('00', '0', $start_minute);
                    $end_hour = date_format(Carbon::parse($work['end_time']), 'H');
                    $end_hour = preg_replace('/^0/','',$end_hour);
                    $end_minute = date_format(Carbon::parse($work['end_time']), 'i');
                    $end_minute = str_replace('00', '0', $end_minute);
                    array_push($week, ['user_id' => $work['user_id'], 'week_day' => $work['week_day'], 'start_hour' => $start_hour,
                                        'start_minute' => $start_minute, 'end_hour' => $end_hour, 'end_minute' => $end_minute]);
                }
                array_push($user_works, $week);

                $m = $month[0]['month'];    //翌月の月を取得
                foreach ($user->shifts as $shift){
                    //翌月の月と一致するデータのみ処理
                    if($m == preg_replace('/^0/','', date_format(Carbon::parse($shift['start']), 'm'))){
                        $start_month = preg_replace('/^0/','', date_format(Carbon::parse($shift['start']), 'm'));
                        $start_day = preg_replace('/^0/','', date_format(Carbon::parse($shift['start']), 'd'));
                        $start_hour = preg_replace('/^0/','', date_format(Carbon::parse($shift['start']), 'H'));
                        $start_minute = str_replace('00', '0', date_format(Carbon::parse($shift['start']), 'i'));
                        $end_month = preg_replace('/^0/','', date_format(Carbon::parse($shift['end']), 'm'));
                        $end_day = preg_replace('/^0/','', date_format(Carbon::parse($shift['end']), 'd'));
                        $end_hour = preg_replace('/^0/','', date_format(Carbon::parse($shift['end']), 'H'));
                        $end_minute = str_replace('00', '0', date_format(Carbon::parse($shift['end']), 'i'));
                        array_push($user_shifts, ['user_id' => $shift['user_id'], 'start_month' => $start_month, 'start_day' => $start_day,
                            'start_hour' => $start_hour, 'start_minute' => $start_minute, 'end_month' => $end_month, 'end_day' => $end_day,
                            'end_hour' => $end_hour, 'end_minute' => $end_minute]);
                    }
                }
            }

            /**
             * 今度やるときはここから
             * 初めViewで処理しようとしていたことをここでやることにした
             * ここでViewの表示いる前提条件をやって配列に成形しておくる
             * positionごとにユーザーを表示 そのときのユーザーはShiftAdminの店舗に属するユーザーのみ
             * ユーザーごとの希望する曜日・時間を取得（ユーザー１[{月曜日, 9, 0, 18, 30}, {{火曜日, 9, 30, 18, 45}}]）←時間についてはDBには09:00:00の様な感じに入っているが使いやすい用に変換する
             * ユーザーごとの登録済みシフト情報を取得（ユーザー１[{user_id:1, 2016/07/22 09:00:00}, {{user_id:2, 2016/07/22 09:30:00}}]） ←これについても使いやすい用に変換したほうがよい　また正規表現のやつ
             * ↑を正確に変換すると [ユーザー１{user_id:1, year:2016, month:7, day:22, hour:9, minute:0, week:月, week_num:1}, ユーザー２{user_id:2, year:2016, month:7, day:22, hour:9, minute:30, week:火, week_num:2}]
             * シフト表の
             */

            //現時刻から一か月後の時間を取得したい場合
            //$time = new Carbon(Carbon::now());
            //$time = new Carbon('first day of next months');
            //$time->setTimezone('Asia/Tokyo');   //タイムゾーンを設定

            //$users = UserCustom::where('store_id', $shift_admin_id)->get(['id','username','position_id']);
            //$users = ShiftAdmin::find($shift_admin_id);
            //$users = $users->store->user;
            //ここの時点でログインしているShiftAdminの店舗に所属するユーザーをとってこよう
            //勤務可能な曜日+時間だけ表示できるようにしたい

            //setlocale(LC_ALL, 'ja_JP.UTF-8');
            //$time2 = Carbon::now()->formatLocalized('%Y年%m月%d日(%a)');
            //$week = array("日", "月", "火", "水", "木", "金", "土");
            //$time = (int)$time->format('w');
            //return $month[0]['day'];
            //配列をjavascriptに渡す場合 jsonにして渡して、javascript側でparseすれば渡せる。
            //return $user_works;
//            $test = Carbon::parse($users[0]->shifts[0]->start);
//            $test = date_format($test, 'm/d/h:i');
            //return $user_shifts;
            return view('shiftAdjustment', ["users" => $users, 'month'=> json_encode($month),
                            "user_work" => json_encode($user_works), "user_shift" => json_encode($user_shifts)]);
        }
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

    /**
     * 時間 00:00:00を 時間と分に分けて連想配列を送り返す
     * モデルを受け取り時間の表示形式を変える
     * $times: 元の時間と分が入った2次元の連想配列
     */
    public function formatTimesCustom($times){
        $week = array("日", "月", "火", "水", "木", "金", "土");
        $worktimes = array();
        for($i = 0; $i < $times->count(); $i++){
            $start_time = preg_replace('/^0|:[0-9]{2}/','',$times[$i]->start_time);                   //時間の部分を取得 頭に0が付いていたら除去
            $start_minute = preg_replace('/^[0-9]{2}:|:[0-9]{2}$/','',$times[$i]->start_time);      //分の部分のみ取得
            $start_minute = str_replace('00', '0', $start_minute);                                       //分の部分が00分の場合0分に置き換え
            $end_time = preg_replace('/^0|:[0-9]{2}/','',$times[$i]->end_time);                      //時間の部分を取得 頭に0が付いていたら除去
            $end_minute = preg_replace('/^[0-9]{2}:|:[0-9]{2}$/','',$times[$i]->end_time);          //分の部分のみ取得
            $end_minute = str_replace('00', '0', $end_minute);                                          //分の部分が00分の場合0分に置き換え

            //配列に追加 'Key' => 'Value'
            array_push($worktimes,(object)array('start_time' => $start_time, 'start_minute' => $start_minute, 'end_time' => $end_time, 'end_minute' => $end_minute,
                'week_day' => $times[$i]->week_day, 'week' => $week[$times[$i]->week_day], 'user_id' => $times[$i]->user_id));
        }
        return $worktimes;
    }

    /**
     * formatした時間をデータベース保存できるように元に戻す関数
     * $times: 09などの0を除去済みの配列
     */
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

            $check = $times[$i]['year'] . "-" . str_pad($times[$i]['month'], 2, 0, STR_PAD_LEFT) . "-" . str_pad($times[$i]['day'], 2, 0, STR_PAD_LEFT);

            //配列に追加 'Key' => 'Value'
            array_push($return_times, array('user_id' => $times[$i]['user_id'], 'start' => $start, 'end' => $end, 'check' => $check));
        }
        return $return_times;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: 2130155
 * Date: 2016/06/21
 * Time: 14:31
 */
namespace App\Http\Controllers;

use App\Shift;
use App\UserCustom;
use App\Position;
use App\UserWorkTime;
use Auth;
use Session;
use Validator;
use Request;
use Hash;
use App\Http\Requests;

class UserManagementController extends Controller{

    //従業員の表示
    public function manageView(){
        $shift_admin_id = session()->get('shift_admin_id');    //セッションからShiftAminのIDを取得
        //ShiftAminのIDから同じ店舗IDの、Userのみ取得 == ShiftAdminの店舗に属するUserのみ
        //$users = UserCustom::where('store_id', $shift_admin_id)->get(['id','username','tell', 'email',  'position_id']);
        $users = UserCustom::where('store_id', $shift_admin_id)->get();

        return view('employeeManagerView', ["users" => $users]);
    }

    //従業員の登録
    public function manageRegister(){
        if (Request::isMethod('post')){
            //$users = UserCustom::all();     //全モデルを取得する
            $user = Request::all();
            $pass = $this->makeRandStr(6);  //仮パスワード生成
            $user = array_merge($user, array('password' => Hash::make($pass), 'store_id' => session()->get('shift_admin_id')));  //usersテーブル追加登録
            $newUser_id = UserCustom::create($user)->id;  //usersテーブルに新規にユーザーを追加し、新規ユーザーのIDを取得

            for($i = 0; $i < 7; $i++) {
                if($i == 6){
                    $week_day = 0;  //0 == 日曜日
                }else{
                    $week_day = $i + 1;     //曜日を格納
                }
                $start_time = str_pad($user['select_1'][$i], 2, 0, STR_PAD_LEFT) . ":" . str_pad($user['select_2'][$i], 2, 0, STR_PAD_LEFT) . ":00";
                $end_time = str_pad($user['select_3'][$i], 2, 0, STR_PAD_LEFT) . ":" . str_pad($user['select_4'][$i], 2, 0, STR_PAD_LEFT) . ":00";

                //配列にして新規登録 'Key' => 'Value'
                UserWorkTime::create(array('start_time' => $start_time, 'end_time' => $end_time, 'week_day' => $week_day, 'user_id' => $newUser_id));
            }

            return redirect('/shift/management/view');
        }else{
            $position = Position::all();
            return view('employeeRegister', ['positions' => $position]);
        }

    }
    //従業員の更新
    public function manageUpdate($id){

        if (Request::isMethod('post')) {    //POSTの場合
            $user = Request::all();         //全POSTデータ取得
            $week_days = array();

            for($i = 0; $i < 7; $i++) {
                if($i == 6){
                    $week_day = 0;  //0 == 日曜日
                }else{
                    $week_day = $i + 1;     //曜日を格納
                }
                $start_time = str_pad($user['select_1'][$i], 2, 0, STR_PAD_LEFT) . ":" . str_pad($user['select_2'][$i], 2, 0, STR_PAD_LEFT) . ":00";
                $end_time = str_pad($user['select_3'][$i], 2, 0, STR_PAD_LEFT) . ":" . str_pad($user['select_4'][$i], 2, 0, STR_PAD_LEFT) . ":00";

                //ユーザーの希望する曜日と時間を更新
                $work = array('start_time' => $start_time, 'end_time' => $end_time, 'week_day' => $week_day, 'user_id' => $id);
                //すでにテーブルに同じ従業員iDかつ同じ曜日を更新処理
                UserWorkTime::where('user_id', $id)->where('week_day', $week_day)->update($work);
            }

            $user = array('user_id' => $id, 'username' => $user['username'], 'email' => $user['email'],
                'tell' => $user['tell'], 'position_id' => $user['position_id']);
            UserCustom::find($id)->fill($user)->save();  //更新したいテーブルのカラムID取得し値を更新

            return redirect('/shift/management/view');
        } else {
            //従業員の変更ボタンが押された時のビュー用
            $user = UserCustom::find($id);
            $position = Position::all();
            $worktime = UserWorkTime::where('user_id', $id)->get(['week_day', 'start_time', 'end_time']);
            $worktime = $this->formatTimes($worktime);
            //$test = $worktime->where('week_day', 4)->first();
            ////return mb_substr($test->start_time, 3, 2);
            //return $worktime;
            //分取得の場合 preg_replace('/^[0-9]{2}:|:[0-9]{2}$/','',$test->start_time);
            //return preg_replace('/^[0-9]{2}:|:[0-9]{2}$/','',$test->end_time);     //時間取得の場合 preg_replace('/^0|:[0-9]{2}/','',$test->start_time);
            return view('employeeUpdate', ['user' => $user, 'positions' => $position])->with('worktimes', $worktime);
        }
    }
    //従業員の削除
    public function manageDelete(){
        $users = Request::input('select');  //配列で取得
        
        UserCustom::destroy($users);     //従業員を削除
        foreach ($users as $user_id){
            UserWorkTime::where('user_id', $user_id)->delete();
            Shift::where('user_id', $user_id)->delete();
        }

        return redirect()->back();      //前のページへ戻る
    }

    //従業員の勤務可能時間表示
    public function manageWorkTime(){
        $work_time = UserWorkTime::where('user_id', Request::input('user_id'))->orderBy('week_day', 'asc')->get();
        $work_time = $this->formatTimes($work_time);

        return $work_time;
    }

    /**
     * ランダム文字列生成 (英数字)
     * $length: 生成する文字数
     */
    function makeRandStr($length) {
        $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
        $r_str = null;
        for ($i = 0; $i < $length; $i++) {
            $r_str .= $str[rand(0, count($str) - 1)];
        }
        return $r_str;
    }

    /**
     * 時間 00:00:00を 時間と分に分けて連想配列を送り返す
     * モデルを受け取り時間の表示形式を変える
     * $times: 元の時間と分が入った2次元の連想配列
     */
    public static function formatTimes($times){
        $worktimes = array();
        for($i = 0; $i < $times->count(); $i++){
            $start_time = preg_replace('/^0|:[0-9]{2}/','',$times[$i]->start_time);                   //時間の部分を取得 頭に0が付いていたら除去
            if($start_time == "0"){
                $start_minute = '-1';
            }else {
                $start_minute = preg_replace('/^[0-9]{2}:|:[0-9]{2}$/', '', $times[$i]->start_time);      //分の部分のみ取得
                $start_minute = str_replace('00', '0', $start_minute);                                       //分の部分が00分の場合0分に置き換え
            }

            $end_time = preg_replace('/^0|:[0-9]{2}/','',$times[$i]->end_time);                      //時間の部分を取得 頭に0が付いていたら除去
            if($end_time == "0"){
                $end_minute = '-1';
            }else{
                $end_minute = preg_replace('/^[0-9]{2}:|:[0-9]{2}$/','',$times[$i]->end_time);          //分の部分のみ取得
                $end_minute = str_replace('00', '0', $end_minute);                                          //分の部分が00分の場合0分に置き換え
            }
            //配列に追加 'Key' => 'Value'
            array_push($worktimes,(object)array('start_time' => $start_time, 'start_minute' => $start_minute, 'end_time' => $end_time, 'end_minute' => $end_minute,
                'week_day' => $times[$i]->week_day));
        }
        return $worktimes;
    }
}
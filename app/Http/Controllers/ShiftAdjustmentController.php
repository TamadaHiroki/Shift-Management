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

class ShiftAdjustmentController extends Controller{

    public function adjustment(){
        if (Request::isMethod('post')){
            $shift_users = Request::input('shift_users');
            $shift_users = UserManagementController::formatRetuenTimes($shift_users);
            foreach ($shift_users as $shift_user){
                //すでにシフトテーブルに同じ従業員iDかつ同じ曜日があれば更新処理
                if(Shift::where('user_id', $shift_user['user_id'])->where('week_day', $shift_user['week_day'])->count() == 1){
                    Shift::where('user_id', $shift_user['user_id'])->where('week_day', $shift_user['week_day'])
                                    ->update($shift_user);      //条件にあてはまるところを更新
                }else{  //無ければ新規作成
                    Shift::create($shift_user);
                }
           }
            //return $shift_users;
            return redirect('/shift/adjustment');
        }else{
            $shift_admin_id = Auth::guard('shiftAdmin')->id();
            //$users = UserCustom::where('store_id', $shift_admin_id)->get(['id','username','position_id']);
            $users = ShiftAdmin::find($shift_admin_id);
            $users = $users->store->user;
            //ここの時点でログインしているShiftAdminの店舗に所属するユーザーをとってこよう
            //勤務可能な曜日+時間だけ表示できるようにしたい
            $position = Position::all();
            //return $shift_users;
            return view('shiftAdjustment', ["users" => $users, "positions" => $position]);
        }
    }
}
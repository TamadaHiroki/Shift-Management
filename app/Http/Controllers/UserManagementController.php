<?php
/**
 * Created by PhpStorm.
 * User: 2130155
 * Date: 2016/06/21
 * Time: 14:31
 */
namespace App\Http\Controllers;

use App\UserCustom;
use App\Position;
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
        $users = UserCustom::where('store_id', $shift_admin_id)->get(['id','username','tell', 'email',  'position_id']);

        return view('employeeManagerView', ["users" => $users]);
    }

    //従業員の登録
    public function manageRegister(){
        if (Request::isMethod('post')){
            //$users = UserCustom::all();     //全モデルを取得する
            $user = Request::all();
            $pass = $this->makeRandStr(6);  //仮パスワード生成
            $user = array_merge($user, array('password' => Hash::make($pass), 'store_id' => session()->get('shift_admin_id')));  //usersテーブル追加登録
            UserCustom::create($user);
            
            return redirect('/shift/management/view');
        }else{
            $position = Position::all();
            return view('employeeRegister', ['positions' => $position]);
        }

    }
    //従業員の更新
    public function manageUpdate($id){

        if (Request::isMethod('post')) {    //POSTの場合
            $user = UserCustom::find($id);        //更新したいテーブルのカラムID取得
            $user->fill(Request::all());          //値をすべて取得し更新
            $user->save();                        //データを保存

            return redirect('/shift/management/view');
        } else {
            //従業員の変更ボタンが押された時のビュー用
            $user = UserCustom::find($id);
            $position = Position::all();
            return view('employeeUpdate', ['user' => $user, 'positions' => $position]);
        }
    }
    //従業員の削除
    public function manageDelete(){
        $users = Request::input('select');  //2次元配列で取得 [[a, b], [c, d]]
        UserCustom::destroy($users[0]);     //従業員を削除
        return redirect()->back();      //前のページへ戻る
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

}
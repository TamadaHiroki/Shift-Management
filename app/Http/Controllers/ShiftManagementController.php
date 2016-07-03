<?php
/**
 * Created by PhpStorm.
 * User: 2130155
 * Date: 2016/06/21
 * Time: 14:31
 */
namespace App\Http\Controllers;

use App\UserCustom;
use Auth;
use Session;
use Validator;
use Request;
use Hash;
use App\Http\Requests;

class ShiftManagementController extends Controller{
    //従業員の表示
    public function manageView(){
        //$users = UserCustom::all();     //全モデルを取得する
        $users = UserCustom::get(['id','username','tell', 'email',  'position_id']);

        return view('zyuitiran', ["users" => $users]);
        return $users;
        //return "test";
    }
    //従業員の登録
    public function manageRegister(){
        //$users = UserCustom::all();     //全モデルを取得する
        $users = Request::all();
        $pass = $this->makeRandStr(6);  //仮パスワード生成
        $users = array_merge($users, array("password"=>Hash::make($pass)));  //usersテーブル追加登録
        UserCustom::create($users);

        //return UserCustom::get(['password_no_hash', 'employee_id']);
        return redirect('/shift/management/view');
        //return "test";
    }
    //従業員の更新
    public function manageUpdate(){
        //$users = UserCustom::all();     //全モデルを取得する

        $user = UserCustom::find(1);        //更新したいテーブルのカラムID取得
        $user->username = 'test3';
        $user->password = Hash::make('ecc3');
        //$arr = array('username' => 'test3','password' => 'ecc3',);
        //$user -> fill($arr);
        $user->save();

        return "test完了";
        //return "test";
    }
    //従業員のカラムの削除
    public function manageDelete(){
        //$users = UserCustom::all();     //全モデルを取得する
        $user = UserCustom::find(1);
        $user->delete();
        //$arr = array('username' => 'test3','password' => 'ecc3',);
        //$user -> fill($arr);

        return redirect('/shift/management/view');
        //return "test";
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
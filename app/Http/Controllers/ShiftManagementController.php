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
use App\Http\Requests;

class ShiftManagementController extends Controller{
    //従業員の表示
    public function manageView(){
        //$users = UserCustom::all();     //全モデルを取得する
        $users = UserCustom::get(['username', 'email', 'employee_id', 'tell']);     //名前とメールアドレスを取得してみる

        return $users;
        //return "test";
    }
    //従業員の登録
    public function manageRegister(){
        //$users = UserCustom::all();     //全モデルを取得する
        UserCustom::create(array('username' => 'test3','password' => 'ecc3',));

        return "完了";
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

}
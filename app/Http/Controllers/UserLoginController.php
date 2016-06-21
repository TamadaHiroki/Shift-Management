<?php
/**
 * Created by PhpStorm.
 * User: 2130155
 * Date: 2016/06/07
 * Time: 15:52
 */

namespace App\Http\Controllers;

use App\Task;
use Auth;
use App\UserCustom;
use Session;
use Validator;
use Request;
use App\Http\Requests;

class UserLoginController extends Controller{

    //ログインメイン画面
    public function login(){

        return view('login');

    }
    
    //ログイン認証
    public function loginCheck(){
        //Guardを選択(user)
        $auth = Auth::guard('user');

        if ($auth->attempt(['username' => Request::get('id'), 'password' => Request::get('password')])) {
            // 認証通過…
            return redirect()->intended('/user/top');
        }else{
//            //エラーメッセージ作成
//            $messages = [
//                'required' => ':attributeフィールドは必須です。',
//                'max' => ':attributeフィールドの文字数は:maxまでです。',
//            ];
//            $validator = Validator::make(Request::all(), [
//                'id' => 'required|max:10',   //required = 空白が無いか
//                'password' => 'required|max:10',   //required = 空白が無いか
//            ], $messages);
            return redirect()->back()
                ->withErrors("ID または Passwordが違います")
                ->withInput();
                //->with('id', '正しく入力しろ');
                //->withErrors($validator);
        }
    }

}
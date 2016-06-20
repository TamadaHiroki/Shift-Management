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

class AdminLoginController extends Controller{

    //ログインメイン画面
    public function login(){

        return view('adminLogin');

    }
    
    //ログイン認証
    public function loginCheck(){
        //Guardを選択()
        $auth = Auth::guard('admin');

        if ($auth->attempt(['username' => Request::get('id'), 'password' => Request::get('password')])) {
            // 認証通過…
            return redirect()->intended('/admin/top');
        }else{
            return redirect()->back()->withInput();
        }
    }

}
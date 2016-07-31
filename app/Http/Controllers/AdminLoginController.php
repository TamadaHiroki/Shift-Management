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

        $temp = Request::get('id');
        $id = substr($temp, 0, strlen($temp) - 6);
        $pass = Request::get('password');

        if ($auth->attempt(['id' => $id, 'password' => $pass])) {
            // 認証通過…
            return redirect()->intended('/admin/main');
        }else{
            return redirect()->back()
                ->withErrors("ID または Passwordが違います")
                ->withInput();
        }
    }

}
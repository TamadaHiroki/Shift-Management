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

class ShiftAdminLoginController extends Controller{

    //ログインメイン画面
    public function login(){

        return view('shiftAdminLogin');

    }
    
    //ログイン認証
    public function loginCheck(){
        //Guardを選択()
        $auth = Auth::guard('shiftAdmin');

        if ($auth->attempt(['id' => Request::get('id'), 'password' => Request::get('password')])) {
            // 認証通過…
            return redirect()->intended('/shift/top');
        }else{
            return redirect()->back()
                ->withErrors("ID または Passwordが違います")
                ->withInput();
        }
    }

}
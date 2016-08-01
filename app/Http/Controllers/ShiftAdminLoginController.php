<?php
/**
 * Created by PhpStorm.
 * User: 2130155
 * Date: 2016/06/07
 * Time: 15:52
 */

namespace App\Http\Controllers;

use App\ShiftAdmin;
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

        $temp = Request::get('id');
        $id = substr($temp, strlen($temp) - 2);
        $pass = Request::get('password');

        if ($auth->attempt(['id' => $id, 'password' => $pass])) {
            // 認証通過…
            session()->put('shift_admin_id', $id);
            return redirect()->intended('/shift/main');
        }else{
            return redirect()->back()
                ->withErrors("ID または Passwordが違います")
                ->withInput();
        }
    }
    //ログアウト処理
    public function shiftAdminLogout(){
        Auth::guard('shiftAdmin')->logout();
        session()->forget('shift_admin_id');
        return redirect("shift/login");   //test用
    }

    public function shiftAdminTop(){
        return view('shiftAdminTop');
    }
    public function shiftAdminMain(){
        $shift_admin = ShiftAdmin::find(Auth::guard('shiftAdmin')->id());
        $store = $shift_admin->store->store;
        return view('shiftAdminMain', ['store' => $store]);
    }

}
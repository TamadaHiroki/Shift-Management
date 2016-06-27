<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Task;
use Illuminate\Http\Request;

    /**
     * Userログイン前
     */
    Route::group(['middleware' => 'guestUser','prefix' => 'user'], function () {
//    Route::get('/', function ()    {
//        // authミドルウェアが使用される
//        return view('welcome');   //test用
//    });

        /**
         * ログインユーザーメイン画面
         */
        Route::get('/login', 'UserLoginController@login');

        /**
         * ログイン認証
         */
        Route::post('/login', 'UserLoginController@loginCheck');

        /**
         * パスワード忘れた人画面
         */
        Route::get('/password/email', function(){
            return "パスワード忘れた人用の画面予定地";
        });

    });
    /**
     * Userログイン後の画面グループ
     */
    Route::group(['middleware' => 'authUser', 'prefix' => 'user'], function () {    //prefixは付けると /userとなる
        Route::get('/top', function ()    {
            // authミドルウェアが使用される
            return "OK!";   //test用
        });
        Route::get('/logout', function ()    {
            // authミドルウェアが使用される
            Auth::guard('user')->logout();
            return redirect("user/login");   //test用
        });

    });


/**
 * Shift管理者ログイン前
 */
Route::group(['middleware' => 'guestShift','prefix' => 'shift'], function () {
    /**
     * Shift管理者ログインメイン画面
     */
    Route::get('/login', 'ShiftAdminLoginController@login');

    /**
     * ログイン認証
     */
    Route::post('/login', 'ShiftAdminLoginController@loginCheck');

    /**
     * パスワード忘れた人画面
     */
    Route::get('/password/email', function(){
        return "パスワード忘れた人用の画面予定地";
    });

});
/**
 * Shift管理者ログイン後の画面グループ
 */
Route::group(['middleware' => 'authShift', 'prefix' => 'shift'], function () {    //prefixは付けると /userとなる
    Route::get('/top', function ()    {
        // authミドルウェアが使用される
        //return "OK!";   //test用
        //return redirect("shift/management/view");
        return view('employeeManagement');
    });
    Route::get('/logout', function ()    {
        // authミドルウェアが使用される
        Auth::guard('shiftAdmin')->logout();
        return redirect("shift/login");   //test用
    });
    /**
     * 従業員管理画面のグループ
     */
    Route::group(['prefix' => 'management'], function(){

        //従業員一覧表示
        Route::get('/view', 'ShiftManagementController@manageView');
//        Route::get('/view', function(){
//            $users = UserCustom::all();     //全モデルを取得する
//            return $users;
//        });
        //従業員の登録
        Route::get('/register', 'ShiftManagementController@manageRegister');
        Route::post('/register', 'ShiftManagementController@manageRegister');
        //従業員の更新
        Route::get('/update', 'ShiftManagementController@manageUpdate');
        Route::post('/update', 'ShiftManagementController@manageUpdate');
        //従業員の削除
        Route::get('/delete', 'ShiftManagementController@manageDelete');
        Route::post('/delete', 'ShiftManagementController@manageDelete');
    });
    
});

/**
 * 店舗管理者ログイン前
 */
Route::group(['middleware' => 'guestAdmin','prefix' => 'admin'], function () {
    /**
     * 店舗管理者ログインメイン画面
     */
    Route::get('/login', 'AdminLoginController@login');

    /**
     * ログイン認証
     */
    Route::post('/login', 'AdminLoginController@loginCheck');

    /**
     * パスワード忘れた人画面
     */
    Route::get('/password/email', function(){
        return "パスワード忘れた人用の画面予定地";
    });

});
/**
 * 店舗管理者ログイン後の画面グループ
 */
Route::group(['middleware' => 'authAdmin', 'prefix' => 'admin'], function () {    //prefixは付けると /userとなる
    Route::get('/top', function ()    {
        // authミドルウェアが使用される
        return "OK!";   //test用
    });
    Route::get('/logout', function ()    {
        // authミドルウェアが使用される
        Auth::guard('admin')->logout();
        return redirect("admin/login");   //test用
    });

});




///**
// * 新タスク追加
// */
//Route::post('/task','TaskController@addTask');
//
///**
// * 既存タスク削除
// */
//Route::delete('/task/{id}','TaskController@deleteTask');
//
///**
// * laravel or html の仕様によりdeleteは１つしか使えない
// * そのためpostを使用
// * 既存タスク全削除
// */
//Route::post('/task/delete','TaskController@allDeleteTask');
//
///**
// * 既存タスクの名前変更
// */
//Route::post('/task/rename/{id}','TaskController@renameTask');



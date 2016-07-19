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
use Illuminate\Support\Facades\Auth;

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
	    //ログアウトはこっちのほうがいいかも (Auth::guard($this->getGuard())->logout();)
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
    Route::get('/top',  'ShiftAdminLoginController@shiftAdminTop');
    
    Route::get('/logout', function ()    {
        // authミドルウェアが使用される
        Auth::guard('shiftAdmin')->logout();
        session()->forget('shift_admin_id');
        return redirect("shift/login");   //test用
    });
    //シフト調整画面表示
    Route::get('/adjustment', 'ShiftAdjustmentController@adjustment');
    Route::post('/adjustment', 'ShiftAdjustmentController@adjustment');
    /**
     * 従業員管理画面のグループ
     */
    Route::group(['prefix' => 'management'], function(){

        //従業員一覧表示
        Route::get('/view', 'UserManagementController@manageView');
//        Route::get('/view', function(){
//            $users = UserCustom::all();     //全モデルを取得する
//            return $users;
//        });
        //従業員の登録
        Route::get('/register', 'UserManagementController@manageRegister');
        Route::post('/register', 'UserManagementController@manageRegister');
        //従業員の更新
        Route::get('/update/{id}', 'UserManagementController@manageUpdate');
        Route::post('/update/{id}', 'UserManagementController@manageUpdate');
        //従業員の削除
        Route::get('/delete', 'UserManagementController@manageDelete');
        Route::post('/delete', 'UserManagementController@manageDelete');
    });
    
});
/**
 * 店舗管理者ログイン前
 */
//'middleware' => 'guestAdmin:admin'のほうがいいかも ミドルウェア名:gaurd名 ($guardに格納される) guestAdmin
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

Route::get('main', function () {
    return view('main');
});



 /**
     * シフト担当者メイン画面
     */
Route::get('shiftmain', function () {
    return view('shiftmain');
});



/**
*パスワード変更画面	
*
*/

Route::get('passchange', function () {
    return view('passchange');
});

Route::get('admin/main', function () {
    return view('admin.main');
});

Route::get('index', function () {
    return view('index');
});

Route::get('sift', 'ShiftController@index');

Route::get('admin/storeManage', function () {
    return view('storeManage');
});

Route::get('top', function () {
    if (Auth::guard('shiftAdmin')->check()){
        return redirect('/shift/top');
    }else if(Auth::guard('user')->check()){
        return redirect('/user/top');
    }else if(Auth::guard('admin')->check()){
        return redirect('/admin/top');
    }else{
        return redirect('/');
    }
});

/**
 * テスト用 ルート
 */
Route::get('/', function () {
    return view('welcome');  //UserCustom::find(2)->position->position;
});


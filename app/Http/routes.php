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
 * ミドルウェアの指定はLaravel5.2から ミドルウェア名:ガード名 の書き方にしないといけない
 * ミドルウェア名のみだとauth.phpのデフォルトで定義されたガードが使われてしまう。
 */

    /**
     * Userログイン前
     */
    Route::group(['middleware' => 'guestUser:user','prefix' => 'user'], function () {
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
    Route::group(['middleware' => 'authUser:user', 'prefix' => 'user'], function () {    //prefixは付けると /userとなる
        Route::get('/top', function ()    {
            // authミドルウェアが使用される
            return "OK!";   //test用
        });

        Route::get('main', function () {
            return view('main');
        });

        Route::get('/siftview', 'ShiftController@index');

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
Route::group(['middleware' => 'guestShift:shiftAdmin','prefix' => 'shift'], function () {
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
Route::group(['middleware' => 'authShift:shiftAdmin', 'prefix' => 'shift'], function () {    //prefixは付けると /shiftとなる
    Route::get('/top',  'ShiftAdminLoginController@shiftAdminTop');     //今後これは消す
    Route::get('/main',  'ShiftAdminLoginController@shiftAdminMain');
    Route::get('/logout',  'ShiftAdminLoginController@shiftAdminLogout');
    
//    Route::get('/logout', function ()    {
//        // authミドルウェアが使用される
//        Auth::guard('shiftAdmin')->logout();
//        session()->forget('shift_admin_id');
//        return redirect("shift/login");   //test用
//    });

    //シフト調整画面表示
    Route::get('/adjustment', 'ShiftAdjustmentController@adjustment');
    Route::post('/adjustment', 'ShiftAdjustmentController@adjustment');

    Route::get('/shiftview', 'ShiftController@index');

    /**
     * 従業員管理画面のグループ
     */
    Route::group(['prefix' => 'management'], function(){

        //従業員一覧表示
        Route::get('/view', 'UserManagementController@manageView');
        //従業員の登録
        Route::get('/register', 'UserManagementController@manageRegister');
        Route::post('/register', 'UserManagementController@manageRegister');
        //従業員の更新
        Route::get('/update/{id}', 'UserManagementController@manageUpdate');
        Route::post('/update/{id}', 'UserManagementController@manageUpdate');
        //従業員の削除
        Route::get('/delete', 'UserManagementController@manageDelete');
        Route::post('/delete', 'UserManagementController@manageDelete');
        //従業員の勤務可能時間表示
        Route::get('/worktime', 'UserManagementController@manageWorkTime');
    });
    
});
/**
 * 店舗管理者ログイン前
 */
//'middleware' => 'guestAdmin:admin'のほうがいいかも ミドルウェア名:gaurd名 ($guardに格納される) guestAdmin
Route::group(['middleware' => 'guestAdmin:admin','prefix' => 'admin'], function () {
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
Route::group(['middleware' => 'authAdmin:admin', 'prefix' => 'admin'], function () {    //prefixは付けると /userとなる
//    Route::get('/top', function ()    {
//        // authミドルウェアが使用される
//        return "OK!";   //test用
//    });

    Route::get('/main', 'StoreListController@StoreList');

//同上
//店舗リスト
    Route::post('/main', 'StoreListController@StoreList');
    Route::post('/main/add', 'StoreListController@StoreListAdd');
    Route::post('/main/delete','StoreListController@StoreDelete');
    Route::post('/main/update','StoreListController@StoreUpdate');


    Route::get('index', function () {
        return view('index');
    });

    Route::get('admin/storeManage', function () {
        return view('storeManage');
    });

    Route::get('/logout', function ()    {
        // authミドルウェアが使用される
        Auth::guard('admin')->logout();
        return redirect("admin/login");   //test用
    });

});

////サイドバーのホームボタン用
//Route::get('main', function () {
//    if (Auth::guard('shiftAdmin')->check()){
//        return redirect('/shift/main');
//    }else if(Auth::guard('user')->check()){
//        return redirect('/user/main');
//    }else if(Auth::guard('admin')->check()){
//        return redirect('/admin/main');
//    }else{
//        return redirect('/');
//    }
//});

////ヘッダーのログアウトボタン用
//Route::get('logout', function () {
//    if (Auth::guard('shiftAdmin')->check()){
//        return redirect('/shift/logout');
//    }else if(Auth::guard('user')->check()){
//        return redirect('/user/logout');
//    }else if(Auth::guard('admin')->check()){
//        return redirect('/admin/logout');
//    }else{
//        return redirect('/');
//    }
//});
//Route::get('main', function () {
//    return view('main');
//});

/**
*パスワード変更画面	
*
*/

Route::get('passchange', function () {
    return view('passchange');
});

//Route::get('admin/main', function () {
//    return view('admin.main');
//});

Route::get('index', function () {
    return view('index');
});

Route::get('admin/storeManage', function () {
    return view('storeManage');
});

Route::get('month', function () {
    return view('siftmonth');
});

/**
 * テスト用 ルート
 */
Route::get('/', function () {
    return view('welcome');  //UserCustom::find(2)->position->position;
});


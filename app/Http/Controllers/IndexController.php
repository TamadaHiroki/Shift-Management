<?php
/**
 * Created by PhpStorm.
 * User: 2130152
 * Date: 2016/07/12
 * Time: 14:06
 */

namespace App\Http\Controllers;

use App\Stores;
use App\Task;
use Auth;
use App\ShiftAdmin;
use App\UserCustom;
use Session;
use Validator;
use Request;
use App\Http\Requests;

class IndexController extends Controller{
    public function Index(){
        $storename = Stores::all();
        //return $storename;
        return view('index',[ 'stores' => $storename]);

    }
    public function PositionListAdd(){
        $position = Request::input('positon');
        $store = array('store' => '店舗名を入力','shift_admin_id' =>Request::input('sid'));
        Stores::create($store);
        $shift = array('password' => bcrypt($pass));
        ShiftAdmin::create($shift);

    }
    public function StoreDelete(){
        $id = Request::input('id');
        $delete = Stores::find($id);
        $delete -> delete();
    }
    public function StoreUpdate(){
        $id = Request::input('id');
        $store = Request::input('store');
        $sid = Request::input('sid');

        $id ->update([$id]);
        $store ->update([$store]);
        $sid ->update([$sid]);


    }
}
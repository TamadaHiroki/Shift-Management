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

class StoreListController extends Controller{
    public function StoreList(){
        $storename = Stores::all();
        //return $storename;
        return view('storeManage',[ 'stores' => $storename]);
        
    }
    public function StoreListAdd(){
        $pass = Request::input('pass');
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

            ->update([$id,$store,$sid]);


    }
}
<?php
/**
 * Created by PhpStorm.
 * User: 2130152
 * Date: 2016/07/12
 * Time: 14:06
 */

namespace App\Http\Controllers;

use App\Task;
use Auth;
use App\UserCustom;
use Session;
use Validator;
use Request;
use App\Http\Requests;

class StoreListController extends Controller{
    public function StoreList(){
        
    }
    public function StoreListAdd(){
        $pass = Request::input('pass');

        
    }
}
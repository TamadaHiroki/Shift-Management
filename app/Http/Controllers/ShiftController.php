<?php

namespace App\Http\Controllers;

use App\Position;
use App\Shift;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;

class ShiftController extends Controller
{
    public function index(){
        $positions = Position::all();

        $carbon = Carbon::now();
        $a[] = $carbon->format('d');
        $b[] = $carbon->format('Y-m-d H:i:s');
        $c[] = $carbon->dayOfWeek;
        $e = $carbon->month;

        //1週間
        for($i=1;$i<7;$i++){
            $a[] = $carbon->addDays(1)->format('d');
            $b[] = $carbon->format('Y-m-d H:i:s');
            $c[] = $carbon->dayOfWeek;
            $e = $carbon->month;
        }
        return view('sift', ['positions' => $positions,'test' => $a,'test2' =>$b,'test3' =>$c,'test4' =>$e]);
    }

    public function index2(){

        $positions = Position::all();

        $carbon2 = Carbon::now();
        $d[] = $carbon2->format('Y-m-d H:i:s');
        $f = $carbon2->daysInMonth;
        $g[] = $carbon2->format('d');
        $h = $carbon2->month;

        //1ヶ月
        for($i=1;$i<$f;$i++){
            $g[] = $carbon2->addDays(1)->format('d');
            $d[] = $carbon2->format('Y-m-d H:i:s');
            $f = $carbon2->daysInMonth;
            $h = $carbon2->month;
        }

        return view('sift', ['positions' => $positions,'day'=>$g,'m'=>$d,'month'=>$f,'nm'=>$h]);
    }
}

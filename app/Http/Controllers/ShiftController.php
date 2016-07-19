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
        
        for($i=1;$i<7;$i++){
            $a[] = $carbon->addDays(1)->format('d');
            $b[] = $carbon->format('Y-m-d H:i:s');
        }
        
        return view('sift', ['positions' => $positions,'test' => $a,'test2' =>$b]);
    }
}

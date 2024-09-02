<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ClockController extends Controller
{
    public  function clockin(){

        Redis::setbit("sign_in:2024-08:user:12345",7,0);
        //SETBIT sign_in:2024-08:user:12345 7 1


       $ss= Redis::getbit("sign_in:2024-08:user:12345",7);

        dd($ss);
    }
}

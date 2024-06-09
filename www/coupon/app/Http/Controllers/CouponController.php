<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CouponController extends Controller
{
    public function send(Request $request)
    {


        Redis::set("JKL","dddd");
        dd($request->all());
    }
}

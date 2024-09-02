<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class GlobalController extends Controller
{
    public function makeID(Request $request)
    {
        $date = date('Y-m-d');
        $key = "global_$date";
        Redis::incrby($key,1);
        $incr=Redis::get($key);
        $globalID = time().$incr;
        dd($globalID);
    }
}

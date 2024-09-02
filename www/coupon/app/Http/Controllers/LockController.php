<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LockController extends Controller
{
    public function lock(Request $request)
    {
       dd("Hello World");
    }

}

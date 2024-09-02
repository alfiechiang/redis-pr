<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CouponController extends Controller
{
    public function send(Request $request)
    {
        Redis::hincrby("coupon-xc-001", "draw", 1);
        $drawCount = Redis::hget("coupon-xc-001", "draw");
        $stockCont = Redis::hget("coupon-xc-001", "stock");
        if ($drawCount > $stockCont) {
           // Redis::hset("coupon-xc-001", "draw",$stockCont);
            return response()->json(['code' => 300, 'data' => [], 'msg' => '此獎品已完全送出']);
        }


        return response()->json(['code' => 200, 'data' => [], 'msg' => '領獎成功']);
    }

    public function update(Request $request)
    {

        $coupon = Coupon::where("name", $request->name)->first();
        $coupon->stock = 120;
        $coupon->save();
        Redis::hdel("coupon", "xc-001");
    }

}

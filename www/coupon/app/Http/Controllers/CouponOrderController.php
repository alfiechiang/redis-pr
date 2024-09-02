<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CouponOrderController extends Controller
{
    public function create(Request $request)
    {
        $luaScript = '
            -- 檢查優惠券是否可用（假設這是一個簡單的計數器檢查）
            local couponCount = redis.call("get", KEYS[1])
            if not couponCount or tonumber(couponCount) <= 0 then
                return 0 -- 表示優惠券不可用
            end
            -- 減少優惠券的數量
            redis.call("decr", KEYS[1])
            -- 返回一個成功的結果（可以是隨機生成的訂單 ID 或其他）
            return ARGV[1]
        ';

        // 執行 Lua 腳本，並傳遞優惠券的鍵和訂單 ID
        $orderId = $request->orderid; // 假設生成一個唯一訂單 ID
        $result = Redis::eval($luaScript, 1, "coupon:{$orderId}", $orderId);

          // 判斷 Lua 腳本的結果
          if ($result == 0) {
            // 返回優惠券無法使用的異常信息
            return response()->json(['error' => 'Coupon is not available'], 400);
        }
    }

    public function stock(Request $request)
    {
        $orderId = $request->orderid; // 假設生成一個唯一訂單 ID
        Redis::incr("coupon:{$orderId}",1);
    }

}

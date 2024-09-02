<?php

use App\Http\Controllers\CouponOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClockController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\LockController;


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::get('lock', [LockController::class, 'lock']);
});

Route::get('clockin', [ClockController::class, 'clockin']);
Route::get('makeid', [GlobalController::class, 'makeID']);



Route::post('couponorder', [CouponOrderController::class, 'create']);
Route::post('couponorder/stock', [CouponOrderController::class, 'stock']);



Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'coupon'
], function ($router) {

    Route::post('send', [CouponController::class, 'send']);
    Route::post('update', [CouponController::class, 'update']);
});




<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('user', 'layouts.user');
Route::view('home', 'user.home');


Route::group(['prefix' => 'auth'], function () {
    Route::view('login', 'common.login');
    Route::view('/signup', 'common.signup');
    Route::view('/otp', 'common.verify-email');
    Route::post('/signup', [AuthController::class,'signup']);
    Route::post('/otp', [AuthController::class,'verifyOtp']);
    Route::post('/resend-otp', [AuthController::class,'resendOtp']);
    Route::post('/login', [AuthController::class,'login']);
});

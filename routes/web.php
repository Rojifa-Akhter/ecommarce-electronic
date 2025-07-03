<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});
Route::view('user', 'layouts.user');
Route::view('home', 'user.home');


Route::group(['prefix' => 'auth'], function () {
    Route::view('profile', 'user.profile');
    Route::view('edit-profile', 'user.edit-profile');
    Route::view('login', 'common.login');
    Route::view('/signup', 'common.signup');
    Route::view('/otp', 'common.verify-email');
    Route::view('/forgot-pass', 'common.forgot-password');
    Route::view('/reset-pass', 'common.reset-password');
    Route::view('/change-pass', 'common.change-password');
    Route::post('/signup', [AuthController::class,'signup']);
    Route::post('/otp', [AuthController::class,'verifyOtp']);
    Route::post('/resend-otp', [AuthController::class,'resendOtp']);
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::post('/update-profile', [AuthController::class,'editProfile']);
    Route::post('/change-pass', [AuthController::class,'changePass']);
    Route::post('/forgot-pass', [AuthController::class,'forgotPass']);
    Route::post('/reset-pass', [AuthController::class,'resetPass']);
});

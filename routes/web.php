<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});
Route::view('user', 'layouts.user');
Route::view('home', 'user.home');

Route::group(['prefix' => 'auth'], function () {
    Route::get('signup', [AuthController::class, 'signupForm']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::get('otp', [AuthController::class, 'verifyOtpForm']);
    Route::post('otp', [AuthController::class, 'verifyOtp']);
    Route::post('resend-otp', [AuthController::class, 'resendOtp']);
    Route::get('login', [AuthController::class, 'showLoginForm']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('forgot-pass', [AuthController::class, 'showForgotPass']);
    Route::post('forgot-pass', [AuthController::class, 'forgotPass']);
    Route::get('reset-otp', [AuthController::class, 'verifyResetOtpForm']);
    Route::post('reset-otp', [AuthController::class, 'verifyResetOtp']);
    Route::get('reset-pass', [AuthController::class, 'showResetPass']);
    Route::post('reset-pass', [AuthController::class, 'resetPass']);
    Route::middleware('auth')->group(function () {
        Route::get('profile', [AuthController::class, 'profile']);
        Route::get('edit-profile', [AuthController::class, 'showEditProfile']);
        Route::post('update-profile', [AuthController::class, 'editProfile']);
        Route::get('change-pass', [AuthController::class, 'showChangePasswordForm']);
        Route::post('change-pass', [AuthController::class, 'changePass']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

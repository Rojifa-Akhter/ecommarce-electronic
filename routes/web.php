<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::view('user', 'layouts.user');

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
Route::middleware(['auth','admin'])->group(function(){

});
Route::get('categories', [CategoryController::class, 'index']);
Route::get('add-category', [CategoryController::class, 'showAddCategory']);
Route::post('add-category', [CategoryController::class, 'create']);
Route::get('products', [ProductController::class,'index']);
Route::get('add-product', [ProductController::class, 'showAddProduct']);
Route::get('users', [AuthController::class, 'index']);
Route::get('dashboard', [AdminController::class, 'index']);
Route::get('add-about', [AdminController::class, 'createAboutForm']);
Route::post('add-about', [AdminController::class, 'createAbout']);
Route::get('faq', [AdminController::class, 'faq']);
Route::get('add-faq', [AdminController::class, 'faqForm']);
Route::post('add-faq', [AdminController::class, 'createFaq']);
Route::get('blogs', [BlogController::class, 'index']);

Route::view('admin', 'layouts.admin');
//user products
Route::get('about', [AdminController::class, 'about']);
Route::get('products', [ProductController::class, 'products']);


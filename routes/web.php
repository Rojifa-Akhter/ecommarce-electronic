<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('user', 'layouts.user');
Route::view('home', 'user.home');

Route::view('login', 'common.login');

Route::group(['prefix' => 'auth'], function () {
    Route::view('/signup', 'common.signup');
    Route::post('/signup', [AuthController::class,'signup']);
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('user','layouts.user');
Route::view('home','user.home');
Route::view('signup','common.signup');
Route::view('login','common.login');

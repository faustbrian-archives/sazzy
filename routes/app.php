<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::view('settings/account', 'account')->name('account');
Route::view('settings/security', 'account-security')->name('security');
Route::view('settings/api', 'api')->name('api');

Route::view('team', 'team')->name('team');
Route::view('team/subscribe', 'subscribe')->name('subscribe');
Route::view('team/create', 'create-team');

Route::view('affiliate', 'affiliate')->name('affiliate');

Route::view('sorry', 'sorry');

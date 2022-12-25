<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LinkSteamController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'pages.home')->name('home');

Route::get('login/discord', function () {
    return Socialite::driver('discord')->redirect();
})->name('auth.discord')->middleware('guest');

Route::get('login/discord/handle', [AuthController::class, 'login'])->middleware('guest');

Route::get('link/steam', function () {
    return Socialite::driver('steam')->redirect();
})->name('auth.steam')->middleware('guest');

Route::get('/link/steam/handle', [LinkSteamController::class, 'link'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::resource('account', AccountController::class, ['parameters' => ['account' => 'user']]);

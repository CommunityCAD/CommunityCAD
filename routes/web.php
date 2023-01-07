<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;


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

Route::middleware(['auth'])->group(function () {
    Route::resource('application', ApplicationController::class);
});

Route::middleware(['auth'])->name('portal.')->prefix('portal')->group(function () {
    Route::view('dashboard', 'portal.dashboard')->name('dashboard');
});

require __DIR__ . '/auth.php';

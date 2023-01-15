<?php

use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Portal\DashboardController;
use App\Http\Controllers\Portal\DepartmentController;
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
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('department/{department}', [DepartmentController::class, 'show'])->name('department.show');
});

Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('application/status/{status?}', [AdminApplicationController::class, 'index'])->name('application.index');
    Route::get('application/{application}', [AdminApplicationController::class, 'show'])->name('application.show');
    // Route::resource('application', AdminApplicationController::class);
});



require __DIR__ . '/auth.php';

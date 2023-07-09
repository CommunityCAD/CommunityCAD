<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Cad\AddUnitController;
use App\Http\Controllers\Cad\CallController;
use App\Http\Controllers\Cad\CallLogController;
use App\Http\Controllers\Cad\OffDutyController;
use App\Http\Controllers\Cad\PageController;
use App\Http\Controllers\Portal\DashboardController;
use App\Http\Controllers\Portal\DepartmentController;
use App\Http\Controllers\Staff\StaffPageController;
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

Route::middleware(['auth', 'member.check'])->group(function () {
    Route::name('portal.')->prefix('portal')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('department/{department}/roster', [DepartmentController::class, 'roster_index'], ['department' => 'department'])->name('department.roster.index');
        Route::get('department/{department}', [DepartmentController::class, 'show'])->name('department.show');
    });

    Route::name('cad.')->prefix('cad')->group(function () {
        Route::get('landing', [PageController::class, 'landing'])->name('landing');
        Route::post('add_unit', AddUnitController::class)->name('add_unit');

        Route::get('home', [PageController::class, 'home'])->name('home');
        Route::get('cad', [PageController::class, 'cad'])->name('cad');
        Route::resource('call', CallController::class);
        Route::get('name', [PageController::class, 'name'])->name('name');
        Route::get('vehicle', [PageController::class, 'vehicle'])->name('vehicle');

        Route::get('offduty', [OffDutyController::class, 'create'])->name('offduty.create');
        Route::post('offduty', [OffDutyController::class, 'store'])->name('offduty.store');

        Route::post('call/{call}/update_call_log', [CallLogController::class, 'store'])->name('call_log.store');
    });

    Route::name('civilian.')->prefix('civilian')->group(function () {
        require __DIR__.'/civilian.php';
    });

    Route::middleware(['auth', 'can:supervisor_access'])->name('supervisor.')->prefix('supervisor')->group(function () {
        Route::get('/', [StaffPageController::class, 'index'])->name('index');
        require __DIR__.'/supervisor.php';
    });

    Route::middleware(['auth', 'can:staff_access'])->name('staff.')->prefix('staff')->group(function () {
        Route::get('/', [StaffPageController::class, 'index'])->name('index');
        require __DIR__.'/staff.php';
    });

    Route::middleware(['auth', 'can:admin_access'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/', [AdminPageController::class, 'index'])->name('index');
        require __DIR__.'/admin.php';
    });
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Cad\AddUnitController;
use App\Http\Controllers\Cad\CadPageController;
use App\Http\Controllers\Cad\CallController;
use App\Http\Controllers\Cad\CallLogController;
use App\Http\Controllers\Cad\CivilianSearchController;
use App\Http\Controllers\Cad\OffDutyController;
use App\Http\Controllers\Cad\ReportController;
use App\Http\Controllers\Cad\TicketController;
use App\Http\Controllers\Cad\UpdateCivilianAlertsController;
use App\Http\Controllers\Cad\VehicleSearchController;
use App\Http\Controllers\Portal\DashboardController;
use App\Http\Controllers\Portal\DepartmentController;
use App\Http\Controllers\Portal\UserLoaController;
use App\Http\Controllers\Portal\UserSettingsController;
use App\Http\Controllers\Staff\StaffPageController;
use App\Http\Controllers\Supervisor\SupervisorPageController;
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
    // if (get_setting('members_must_apply')) {
    Route::resource('application', ApplicationController::class);
    // }
});

Route::middleware(['auth', 'member.check'])->group(function () {
    Route::name('portal.')->prefix('portal')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('penalcode', [DashboardController::class, 'penalcode'])->name('penalcode');

        Route::get('user/settings', [UserSettingsController::class, 'index'])->name('user.settings.index');
        Route::put('user/settings', [UserSettingsController::class, 'update'])->name('user.settings.update');

        Route::post('user/loa', [UserLoaController::class, 'store'])->name('user.loa.store');
        Route::get('user/loa/{loa}', [UserLoaController::class, 'show'])->name('user.loa.show');
        Route::delete('user/loa/{loa}', [UserLoaController::class, 'destroy'])->name('user.loa.destroy');

        Route::get('department/{department}/roster', [DepartmentController::class, 'roster_index'], ['department' => 'department'])->name('department.roster.index');
        Route::get('department/{department}', [DepartmentController::class, 'show'])->name('department.show');
    });

    Route::name('cad.')->prefix('cad')->group(function () {
        require __DIR__ . '/cad-mdt.php';
    });

    Route::name('civilian.')->prefix('civilian')->group(function () {
        require __DIR__ . '/civilian.php';
    });

    Route::name('courthouse.')->prefix('courthouse')->group(function () {
        require __DIR__ . '/courthouse.php';
    });

    Route::middleware(['auth', 'can:supervisor_access'])->name('supervisor.')->prefix('supervisor')->group(function () {
        Route::get('/', [SupervisorPageController::class, 'index'])->name('index');
        require __DIR__ . '/supervisor.php';
    });

    Route::middleware(['auth', 'can:staff_access'])->name('staff.')->prefix('staff')->group(function () {
        Route::get('/', [StaffPageController::class, 'index'])->name('index');
        require __DIR__ . '/staff.php';
    });

    Route::middleware(['auth', 'can:admin_access'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/', [AdminPageController::class, 'index'])->name('index');
        require __DIR__ . '/admin.php';
    });
});

require __DIR__ . '/auth.php';

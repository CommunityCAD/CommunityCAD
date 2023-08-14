<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Cad\AddUnitController;
use App\Http\Controllers\Cad\CadPageController;
use App\Http\Controllers\Cad\CallController;
use App\Http\Controllers\Cad\CallLogController;
use App\Http\Controllers\Cad\OffDutyController;
use App\Http\Controllers\Cad\ReportController;
use App\Http\Controllers\Cad\TicketController;
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
    Route::resource('application', ApplicationController::class);
});

Route::middleware(['auth', 'member.check'])->group(function () {
    Route::name('portal.')->prefix('portal')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('penalcode', [DashboardController::class, 'penalcode'])->name('penalcode');

        Route::get('user/settings', [UserSettingsController::class, 'index'])->name('user.settings.index');
        Route::put('user/settings', [UserSettingsController::class, 'update'])->name('user.settings.update');

        Route::post('user/loa', [UserLoaController::class, 'store'])->name('user.loa.store');
        Route::get('user/loa/{loa}', [UserLoaController::class, 'show'])->name('user.loa.show');



        Route::get('department/{department}/roster', [DepartmentController::class, 'roster_index'], ['department' => 'department'])->name('department.roster.index');
        Route::get('department/{department}', [DepartmentController::class, 'show'])->name('department.show');
    });

    Route::name('cad.')->prefix('cad')->group(function () {
        Route::get('home', [CadPageController::class, 'home'])->name('home');
        Route::get('cad', [CadPageController::class, 'cad'])->name('cad');

        Route::get('landing', [CadPageController::class, 'landing'])->name('landing');
        Route::post('add_unit', AddUnitController::class)->name('add_unit');

        Route::resource('call', CallController::class);
        Route::resource('report', ReportController::class);

        Route::get('civilan/{civilian}/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
        Route::post('civilan/{civilian}/ticket', [TicketController::class, 'store'])->name('ticket.store');
        Route::get('ticket/{ticket}/add_charges', [TicketController::class, 'add_charges'])->name('ticket.add_charges');
        Route::post('ticket/{ticket}/add_charges', [TicketController::class, 'add_charges_store'])->name('ticket.add_charges_store');
        Route::get('ticket/{ticket}/sign_ticket', [TicketController::class, 'sign_ticket'])->name('ticket.sign_ticket');
        Route::get('ticket/{ticket}', [TicketController::class, 'show'])->name('ticket.show');




        Route::get('name', [CadPageController::class, 'name'])->name('name');
        Route::get('vehicle', [CadPageController::class, 'vehicle'])->name('vehicle');

        Route::get('offduty', [OffDutyController::class, 'create'])->name('offduty.create');
        Route::post('offduty', [OffDutyController::class, 'store'])->name('offduty.store');
        Route::post('call/{call}/update_call_log', [CallLogController::class, 'store'])->name('call_log.store');
    });

    Route::name('civilian.')->prefix('civilian')->group(function () {
        require __DIR__ . '/civilian.php';
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

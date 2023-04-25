<?php

use App\Events\CadTableUpdate;
use App\Http\Controllers\Admin\Applications\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\Applications\ApproveApplicationController;
use App\Http\Controllers\Admin\Applications\ApproveInterviewController;
use App\Http\Controllers\Admin\Applications\DenyApplicationController;
use App\Http\Controllers\Admin\Applications\DenyInterviewController;
use App\Http\Controllers\Admin\Applications\FlagApplicationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\User\NotesController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\User\UserRoleController;
use App\Http\Controllers\Admin\User\UserStatusController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Cad\CallController;
use App\Http\Controllers\Cad\PageController;
use App\Http\Controllers\Civilian\CivilianController;
use App\Http\Controllers\Civilian\LicenseController;
use App\Http\Controllers\Civilian\MedicalRecordController;
use App\Http\Controllers\Civilian\VehicleController;
use App\Http\Controllers\Civilian\WeaponController;
use App\Http\Controllers\Portal\DashboardController;
use App\Http\Controllers\Portal\DepartmentController;
use App\Models\Admin\User\UserNotes;
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

// Route::get('/event', function () {
//     event(new CadTableUpdate());
// });

Route::middleware(['auth'])->group(function () {
    Route::resource('application', ApplicationController::class);
});
Route::middleware(['auth', 'member.check'])->group(function () {
    Route::name('portal.')->prefix('portal')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('department/{department}', [DepartmentController::class, 'show'])->name('department.show');
    });

    Route::name('cad.')->prefix('cad')->group(function () {
        Route::get('landing', [PageController::class, 'landing'])->name('landing');
        Route::get('home', [PageController::class, 'home'])->name('home');
        Route::get('cad', [PageController::class, 'cad'])->name('cad');
        Route::resource('call', CallController::class);
        Route::get('name', [PageController::class, 'name'])->name('name');
        Route::get('vehicle', [PageController::class, 'vehicle'])->name('vehicle');
    });

    Route::name('civilian.')->prefix('civilian')->group(function () {
        Route::resource('civilians', CivilianController::class);

        Route::get('/civilians/{civilian}/license/{license}/renew', [LicenseController::class, 'renew'])->name('license.renew');
        Route::resource('civilians/{civilian}/license', LicenseController::class);

        Route::resource('civilians/{civilian}/medical_record', MedicalRecordController::class);

        Route::resource('civilians/{civilian}/weapon', WeaponController::class);


        Route::get('/civilians/{civilian}/vehicle/{vehicle}/renew', [VehicleController::class, 'renew'])->name('vehicle.renew');
        Route::get('/civilians/{civilian}/vehicle/{vehicle}/stolen', [VehicleController::class, 'stolen'])->name('vehicle.stolen');
        Route::resource('civilians/{civilian}/vehicle', VehicleController::class);
    });

    Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('application/status/{status?}', [AdminApplicationController::class, 'index'])->name('application.index');

        Route::get('/application/approve_application/{application}', ApproveApplicationController::class)->name('application.approve_application');
        Route::get('/application/approve_interview/{application}', ApproveInterviewController::class)->name('application.approve_interview');

        Route::get('/application/deny_application/{application}', [DenyApplicationController::class, 'edit'])->name('application.deny_application.edit');
        Route::put('/application/deny_application/{application}', [DenyApplicationController::class, 'store'])->name('application.deny_application.store');

        Route::get('/application/flag_application/{application}', [FlagApplicationController::class, 'edit'])->name('application.flag_application.edit');
        Route::put('/application/flag_application/{application}', [FlagApplicationController::class, 'store'])->name('application.flag_application.store');

        Route::get('/application/deny_interview/{application}', [DenyInterviewController::class, 'edit'])->name('application.deny_interview.edit');
        Route::put('/application/deny_interview/{application}', [DenyInterviewController::class, 'store'])->name('application.deny_interview.store');

        Route::get('application/{application}', [AdminApplicationController::class, 'show'])->name('application.show');


        Route::resource('/roles', RoleController::class);
        Route::resource('/permissions', PermissionController::class);

        Route::get('/users/advanced', [UserController::class, 'all_users'])->name('users.advanced.index');
        Route::get('/user/{user}/roles/edit', [UserRoleController::class, 'edit'])->name('users.roles.edit');
        Route::put('/user/{user}/roles', [UserRoleController::class, 'update'])->name('users.roles.update');
        Route::get('/user/{user}/status/edit', [UserStatusController::class, 'edit'])->name('users.status.edit');
        Route::put('/user/{user}/status', [UserStatusController::class, 'update'])->name('users.status.update');

        Route::post('/user/{user}/note', [NotesController::class, 'store'])->name('users.notes.store');
        Route::delete('/user/{user}/note/{userNotes}', [NotesController::class, 'destroy'])->name('users.notes.destroy');

        Route::resource('/users', UserController::class);
    });
});




require __DIR__ . '/auth.php';

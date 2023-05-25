<?php

use App\Events\CadTableUpdate;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\Applications\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\Applications\ApproveApplicationController;
use App\Http\Controllers\Admin\Applications\ApproveInterviewController;
use App\Http\Controllers\Admin\Applications\DenyApplicationController;
use App\Http\Controllers\Admin\Applications\DenyInterviewController;
use App\Http\Controllers\Admin\Applications\FlagApplicationController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\User\DepartmentController as UserDepartmentController;
use App\Http\Controllers\Admin\User\NotesController;
use App\Http\Controllers\Admin\User\UserAccommodationController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\User\UserDisciplinaryActionController;
use App\Http\Controllers\Admin\User\UserRoleController;
use App\Http\Controllers\Admin\User\UserStatusController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Cad\AddUnitController;
use App\Http\Controllers\Cad\CallController;
use App\Http\Controllers\Cad\PageController;

use App\Http\Controllers\Portal\DashboardController;
use App\Http\Controllers\Portal\DepartmentController;
use App\Http\Controllers\Staff\StaffPageController;
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
        Route::post('/add_unit', AddUnitController::class)->name('add_unit');

        Route::get('home', [PageController::class, 'home'])->name('home');
        Route::get('cad', [PageController::class, 'cad'])->name('cad');
        Route::resource('call', CallController::class);
        Route::get('name', [PageController::class, 'name'])->name('name');
        Route::get('vehicle', [PageController::class, 'vehicle'])->name('vehicle');
    });

    Route::name('civilian.')->prefix('civilian')->group(function () {
        require __DIR__ . '/civilian.php';
    });

    Route::middleware(['auth'])->name('staff.')->prefix('staff')->group(function () {
        Route::get('/', [StaffPageController::class, 'index'])->name('index');
    });

    Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {

        Route::get('/', [AdminPageController::class, 'index'])->name('index');



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

        Route::get('/user/{user}/roles/edit', [UserRoleController::class, 'edit'])->name('users.roles.edit');
        Route::put('/user/{user}/roles', [UserRoleController::class, 'update'])->name('users.roles.update');
        Route::get('/user/{user}/status/edit', [UserStatusController::class, 'edit'])->name('users.status.edit');
        Route::put('/user/{user}/status', [UserStatusController::class, 'update'])->name('users.status.update');

        Route::post('/user/{user}/note', [NotesController::class, 'store'])->name('users.notes.store');
        Route::delete('/user/{user}/note/{userNotes}', [NotesController::class, 'destroy'])->name('users.notes.destroy');

        Route::post('/user/{user}/accommodation', [UserAccommodationController::class, 'store'])->name('users.accommodation.store');
        Route::delete('/user/{user}/accommodation/{userAccommodation}', [UserAccommodationController::class, 'destroy'])->name('users.accommodation.destroy');

        Route::post('/user/{user}/da', [UserDisciplinaryActionController::class, 'store'])->name('users.da.store');
        Route::delete('/user/{user}/da/{disciplinaryAction}', [UserDisciplinaryActionController::class, 'destroy'])->name('users.da.destroy');

        Route::put('/user/{user}/super_user', [UserStatusController::class, 'super_user'])->name('users.super_user.update');
        Route::put('/user/{user}/protected_user', [UserStatusController::class, 'protected_user'])->name('users.protected_user.update');

        Route::resource('/user/{user}/departments', UserDepartmentController::class, ['name' => 'users'])->names([
            'index' => 'users.departments.index',
            'create' => 'users.departments.create',
            'store' => 'users.departments.store',
            'edit' => 'users.departments.edit',
            'update' => 'users.departments.update',
            'destroy' => 'users.departments.destroy',
        ]);

        Route::resource('users', UserController::class);

        Route::resource('announcement', AnnouncementController::class)->except('index');

        Route::resource('department', AdminDepartmentController::class)->except('show');
    });
});




require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\CadSettingController;
use App\Http\Controllers\Admin\CivilianLevelController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\DisciplinaryActionTypeController;
use App\Http\Controllers\Admin\LicenseTypeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\User\DepartmentController as UserDepartmentController;
use App\Http\Controllers\Admin\User\NotesController;
use App\Http\Controllers\Admin\User\UserAccommodationController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\User\UserDisciplinaryActionController;
use App\Http\Controllers\Admin\User\UserRoleController;
use App\Http\Controllers\Admin\User\UserStatusController;
use Illuminate\Support\Facades\Route;

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
Route::resource('cad_setting', CadSettingController::class)->only('index', 'edit', 'update');
Route::resource('disciplinary_action_type', DisciplinaryActionTypeController::class)->except('show');
Route::resource('license_type', LicenseTypeController::class)->except('show');
Route::resource('civilian_level', CivilianLevelController::class)->except('show');

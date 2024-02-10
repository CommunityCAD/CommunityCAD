<?php

use App\Http\Controllers\Admin\CadSettingController;
use App\Http\Controllers\Admin\CivilianLevelController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DisciplinaryActionTypeController;
use App\Http\Controllers\Admin\LicenseTypeController;
use App\Http\Controllers\Admin\PenalCode\PenalCodeClassController;
use App\Http\Controllers\Admin\PenalCode\PenalCodeController;
use App\Http\Controllers\Admin\PenalCode\PenalCodeTitleController;
use App\Http\Controllers\Admin\ReportTypeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TenCodeController;
use App\Http\Controllers\Admin\User\NotesController;
use App\Http\Controllers\Admin\User\UserAccommodationController;
use App\Http\Controllers\Admin\User\UserCommunityRankController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\User\UserDisciplinaryActionController;
use App\Http\Controllers\Admin\User\UserRoleController;
use App\Http\Controllers\Admin\User\UserStatusController;
use Illuminate\Support\Facades\Route;

Route::resource('/roles', RoleController::class)->middleware('can:role_manage');

Route::put('/user/{user}/roles', [UserRoleController::class, 'update'])->name('users.roles.update')->middleware('can:user_manage_user_roles');
Route::get('/user/{user}/status/edit', [UserStatusController::class, 'edit'])->name('users.status.edit')->middleware('can:user_manage_user_status');
Route::put('/user/{user}/status', [UserStatusController::class, 'update'])->name('users.status.update')->middleware('can:user_manage_user_status');

Route::put('/user/{user}/super_user', [UserStatusController::class, 'super_user'])->name('users.super_user.update')->middleware('can:is_super_user');
Route::put('/user/{user}/protected_user', [UserStatusController::class, 'protected_user'])->name('users.protected_user.update')->middleware('can:is_super_user');

Route::post('/user/{user}/note', [NotesController::class, 'store'])->name('users.notes.store')->middleware('can:user_manage_user_notes');
Route::delete('/user/{user}/note/{userNotes}', [NotesController::class, 'destroy'])->name('users.notes.destroy')->middleware('can:user_manage_user_notes');

Route::post('/user/{user}/accommodation', [UserAccommodationController::class, 'store'])->name('users.accommodation.store')->middleware('can:user_manage_user_accommodation');
Route::delete('/user/{user}/accommodation/{userAccommodation}', [UserAccommodationController::class, 'destroy'])->name('users.accommodation.destroy')->middleware('can:user_manage_user_accommodation');

Route::post('/user/{user}/da', [UserDisciplinaryActionController::class, 'store'])->name('users.da.store')->middleware('can:user_manage_user_disciplinary_actions');
Route::delete('/user/{user}/da/{disciplinaryAction}', [UserDisciplinaryActionController::class, 'destroy'])->name('users.da.destroy')->middleware('can:user_manage_user_disciplinary_actions');

Route::put('/user/{user}/community_rank', [UserCommunityRankController::class, 'update'])->name('users.community_rank.update')->middleware('can:user_manage_user_status');

Route::resource('users', UserController::class)->middleware('can:user_access');

// Setting Pages
Route::resource('department', DepartmentController::class)->except('show')->middleware('can:department_manage');
Route::resource('cad_setting', CadSettingController::class)->only('index', 'edit', 'update')->middleware('can:cad_settings');
Route::resource('disciplinary_action_type', DisciplinaryActionTypeController::class)->except('show')->middleware('can:disciplinary_action_type_manage');
Route::resource('license_type', LicenseTypeController::class)->except('show')->middleware('can:license_type_manage');
Route::resource('report_type', ReportTypeController::class)->except('show')->middleware('can:report_type_manage');
Route::resource('civilian_level', CivilianLevelController::class)->except('show')->middleware('can:civilian_level_manage');
Route::resource('ten_code', TenCodeController::class)->except('edit', 'update')->middleware('can:ten_code_manage');

Route::middleware(['can:penal_code_manage'])->name('penalcode.')->prefix('penalcode')->group(function () {
    Route::resource('title', PenalCodeTitleController::class)->except('show')->middleware('can:penal_code_manage');
    Route::resource('class', PenalCodeClassController::class)->except('show')->middleware('can:penal_code_manage');
    Route::resource('code', PenalCodeController::class)->except('show')->middleware('can:penal_code_manage');
});

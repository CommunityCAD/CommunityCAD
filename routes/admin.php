<?php

use App\Http\Controllers\Admin\CadSettingController;
use App\Http\Controllers\Admin\CivilianLevelController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DisciplinaryActionTypeController;
use App\Http\Controllers\Admin\DiscordChannelController;
use App\Http\Controllers\Admin\LicenseTypeController;
use App\Http\Controllers\Admin\PenalCode\PenalCodeClassController;
use App\Http\Controllers\Admin\PenalCode\PenalCodeController;
use App\Http\Controllers\Admin\PenalCode\PenalCodeTitleController;
use App\Http\Controllers\Admin\ReportTypeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingsController;
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

Route::put('/user/{user}/super_user', [UserStatusController::class, 'super_user'])->name('users.super_user.update')->middleware('can:is_owner_user');
Route::put('/user/{user}/protected_user', [UserStatusController::class, 'protected_user'])->name('users.protected_user.update')->middleware('can:is_owner_user');

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


Route::get('settings/general', [SettingsController::class, 'general'])->name('settings.general')->middleware('can:cad_settings');
Route::get('settings/roleplay', [SettingsController::class, 'roleplay'])->name('settings.roleplay')->middleware('can:cad_settings');
Route::get('settings/application', [SettingsController::class, 'application'])->name('settings.application')->middleware('can:cad_settings');
Route::get('settings/discord', [SettingsController::class, 'discord'])->name('settings.discord')->middleware('can:cad_settings');
Route::get('settings/api_key', [SettingsController::class, 'api_key'])->name('settings.api_key')->middleware('can:is_owner_user');
Route::get('settings/generate_api_key', [SettingsController::class, 'generate_api_key'])->name('settings.generate_api_key')->middleware('can:is_owner_user');
Route::get('settings/discord_roles', [SettingsController::class, 'discord_roles'])->name('settings.discord_roles')->middleware('can:cad_settings');

Route::post('settings', [SettingsController::class, 'update'])->name('settings.update')->middleware('can:cad_settings');
Route::post('settings/update_discord', [SettingsController::class, 'update_discord'])->name('settings.update_discord')->middleware('can:cad_settings');

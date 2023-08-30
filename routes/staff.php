<?php

use App\Http\Controllers\Staff\AnnouncementController;
use App\Http\Controllers\Staff\Applications\ApplicationController;
use App\Http\Controllers\Staff\Applications\ApproveApplicationController;
use App\Http\Controllers\Staff\Applications\ApproveInterviewController;
use App\Http\Controllers\Staff\Applications\DenyApplicationController;
use App\Http\Controllers\Staff\Applications\DenyInterviewController;
use App\Http\Controllers\Staff\Applications\FlagApplicationController;
use App\Http\Controllers\Staff\LoaController;
use App\Http\Controllers\Staff\StaffPageController;
use App\Http\Controllers\Staff\UserDepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/application/approve_application/{application}', ApproveApplicationController::class)->name('application.approve_application')->middleware('can:application_action');

Route::get('/application/approve_interview/{application}', ApproveInterviewController::class)->name('application.approve_interview')->middleware('can:application_action');

Route::get('/application/deny_application/{application}', [DenyApplicationController::class, 'edit'])->name('application.deny_application.edit')->middleware('can:application_action');
Route::put('/application/deny_application/{application}', [DenyApplicationController::class, 'store'])->name('application.deny_application.store')->middleware('can:application_action');

Route::get('/application/flag_application/{application}', [FlagApplicationController::class, 'edit'])->name('application.flag_application.edit')->middleware('can:application_action');
Route::put('/application/flag_application/{application}', [FlagApplicationController::class, 'store'])->name('application.flag_application.store')->middleware('can:application_action');

Route::get('/application/deny_interview/{application}', [DenyInterviewController::class, 'edit'])->name('application.deny_interview.edit')->middleware('can:application_action');
Route::put('/application/deny_interview/{application}', [DenyInterviewController::class, 'store'])->name('application.deny_interview.store')->middleware('can:application_action');

Route::get('application/status/{status?}', [ApplicationController::class, 'index'])->name('application.index')->middleware('can:application_access');
Route::get('application/{application}', [ApplicationController::class, 'show'])->name('application.show')->middleware('can:application_access');

Route::resource('announcement', AnnouncementController::class)->except('')->middleware('can:announcement_manage');

Route::get('/user/search', [StaffPageController::class, 'user_search'])->name('user_search.index')->middleware('can:user_departments_manage');

Route::resource('user.user_department', UserDepartmentController::class)->except('show')->names([
    'index' => 'user_department.index',
    'create' => 'user_department.create',
    'store' => 'user_department.store',
    'edit' => 'user_department.edit',
    'update' => 'user_department.update',
    'destroy' => 'user_department.destroy',
]);

Route::get('loa/{status?}', [LoaController::class, 'index'])->name('loa.index')->middleware('can:loa_manage');
Route::get('loa/view/{loa}', [LoaController::class, 'show'])->name('loa.show')->middleware('can:loa_manage');
Route::get('loa/view/{loa}/approve', [LoaController::class, 'approve'])->name('loa.approve')->middleware('can:loa_manage');
Route::get('loa/view/{loa}/deny', [LoaController::class, 'deny'])->name('loa.deny')->middleware('can:loa_manage');

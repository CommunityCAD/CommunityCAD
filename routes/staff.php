<?php

use App\Http\Controllers\Staff\Applications\ApplicationController;
use App\Http\Controllers\Staff\Applications\ApproveApplicationController;
use App\Http\Controllers\Staff\Applications\ApproveInterviewController;
use App\Http\Controllers\Staff\Applications\DenyApplicationController;
use App\Http\Controllers\Staff\Applications\DenyInterviewController;
use App\Http\Controllers\Staff\Applications\FlagApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/application/approve_application/{application}', ApproveApplicationController::class)->name('application.approve_application');

Route::get('/application/approve_interview/{application}', ApproveInterviewController::class)->name('application.approve_interview');

Route::get('/application/deny_application/{application}', [DenyApplicationController::class, 'edit'])->name('application.deny_application.edit');
Route::put('/application/deny_application/{application}', [DenyApplicationController::class, 'store'])->name('application.deny_application.store');

Route::get('/application/flag_application/{application}', [FlagApplicationController::class, 'edit'])->name('application.flag_application.edit');
Route::put('/application/flag_application/{application}', [FlagApplicationController::class, 'store'])->name('application.flag_application.store');

Route::get('/application/deny_interview/{application}', [DenyInterviewController::class, 'edit'])->name('application.deny_interview.edit');
Route::put('/application/deny_interview/{application}', [DenyInterviewController::class, 'store'])->name('application.deny_interview.store');

Route::get('application/status/{status?}', [ApplicationController::class, 'index'])->name('application.index');
Route::get('application/{application}', [ApplicationController::class, 'show'])->name('application.show');

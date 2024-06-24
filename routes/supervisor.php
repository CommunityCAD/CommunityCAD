<?php

use App\Http\Controllers\Supervisor\BusinessController;
use App\Http\Controllers\Supervisor\ReportController;
use Illuminate\Support\Facades\Route;

Route::resource('reports', ReportController::class)->only('index', 'show')->middleware('can:reports_manage');

Route::get('businesses/{status?}', [BusinessController::class, 'index'])->name('businesses.index')->middleware('can:business_manage');
Route::get('businesses/view/{business}', [BusinessController::class, 'show'])->name('businesses.show')->middleware('can:business_manage');
Route::get('businesses/view/{business}/approve', [BusinessController::class, 'approve'])->name('businesses.approve')->middleware('can:business_manage');
Route::get('businesses/view/{business}/deny', [BusinessController::class, 'deny'])->name('businesses.deny')->middleware('can:business_manage');
Route::get('businesses/view/{business}/suspend', [BusinessController::class, 'suspend'])->name('businesses.suspend')->middleware('can:business_manage');
Route::get('businesses/view/{business}/destroy', [BusinessController::class, 'destroy'])->name('businesses.destroy')->middleware('can:business_manage');

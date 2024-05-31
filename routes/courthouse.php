<?php

use App\Http\Controllers\Courthouse\CaseController;
use App\Http\Controllers\Courthouse\CourthousePageController;
use App\Http\Controllers\Courthouse\ImpoundController;
use App\Http\Controllers\Courthouse\NotguiltyController;
use App\Http\Controllers\Courthouse\SuspendedLicenseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourthousePageController::class, 'home'])->name('home');

Route::resource('impound', ImpoundController::class)->only('index', 'update')->parameters(['impound' => 'vehicle'])->middleware('can:impound_lot_manage');
Route::resource('suspended', SuspendedLicenseController::class)->only('index', 'update')->parameters(['suspended' => 'license'])->middleware('can:suspended_license_manage');
Route::get('not_guilty', [NotguiltyController::class, 'index'])->name('not_guilty.index')->middleware('can:manage_not_guilty_tickets');
Route::get('ticket/{ticket}', [CourthousePageController::class, 'show_ticket'])->name('ticket.show');
Route::put('ticket/{ticket}', [NotguiltyController::class, 'update'])->name('ticket.update');



Route::resource('case', CaseController::class)->parameters(['case' => 'call']);

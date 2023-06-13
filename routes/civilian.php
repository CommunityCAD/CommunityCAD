<?php

use App\Http\Controllers\Civilian\CivilianController;
use App\Http\Controllers\Civilian\LicenseController;
use App\Http\Controllers\Civilian\MedicalRecordController;
use App\Http\Controllers\Civilian\VehicleController;
use App\Http\Controllers\Civilian\WeaponController;
use Illuminate\Support\Facades\Route;

Route::get('/civilians/{civilian}/license/{license}/renew', [LicenseController::class, 'renew'])->name('license.renew');
Route::resource('civilians/{civilian}/license', LicenseController::class)->only(['create', 'store', 'destroy']);
Route::resource('civilians/{civilian}/medical_record', MedicalRecordController::class)->only(['create', 'store', 'destroy']);
Route::resource('civilians/{civilian}/weapon', WeaponController::class)->only(['create', 'store', 'destroy']);

Route::resource('civilians', CivilianController::class);

Route::get('/civilians/{civilian}/vehicle/{vehicle}/renew', [VehicleController::class, 'renew'])->name('vehicle.renew');
Route::get('/civilians/{civilian}/vehicle/{vehicle}/stolen', [VehicleController::class, 'stolen'])->name('vehicle.stolen');
Route::resource('civilians/{civilian}/vehicle', VehicleController::class)->only(['create', 'store', 'destroy']);

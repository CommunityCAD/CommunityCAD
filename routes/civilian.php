<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\Civilian\CallController;
use App\Http\Controllers\Civilian\CivilianController;
use App\Http\Controllers\Civilian\CivilianPageController;
use App\Http\Controllers\Civilian\CivilianPleaController;
use App\Http\Controllers\Civilian\LicenseController;
use App\Http\Controllers\Civilian\MedicalRecordController;
use App\Http\Controllers\Civilian\OfficerController;
use App\Http\Controllers\Civilian\VehicleController;
use App\Http\Controllers\Civilian\WeaponController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CivilianPageController::class, 'home'])->name('home');

Route::get('/civilians/{civilian}/license/{license}/renew', [LicenseController::class, 'renew'])->name('license.renew');
Route::resource('civilians/{civilian}/license', LicenseController::class)->only(['create', 'store', 'destroy']);
Route::resource('civilians/{civilian}/medical_record', MedicalRecordController::class)->only(['create', 'store', 'destroy']);
Route::resource('civilians/{civilian}/weapon', WeaponController::class)->only(['create', 'store', 'destroy']);



Route::get('/civilians/{civilian}/vehicle/{vehicle}/renew', [VehicleController::class, 'renew'])->name('vehicle.renew');
Route::get('/civilians/{civilian}/vehicle/{vehicle}/found', [VehicleController::class, 'found'])->name('vehicle.found');
Route::get('/civilians/{civilian}/vehicle/{vehicle}/expire', [VehicleController::class, 'expire'])->name('vehicle.expire');
Route::get('/civilians/{civilian}/vehicle/{vehicle}/stolen', [VehicleController::class, 'stolen'])->name('vehicle.stolen');
Route::resource('civilians/{civilian}/vehicle', VehicleController::class)->only(['create', 'store', 'destroy']);

Route::get('/civilians/{civilian}/911/create', [CallController::class, 'create'])->name('call.create');
Route::post('/civilians/{civilian}/911', [CallController::class, 'store'])->name('call.store');

Route::resource('civilians', CivilianController::class);

Route::resource('businesses', BusinessController::class);

Route::get('/ticket/{ticket}/plea_guilty', [CivilianPleaController::class, 'plea_guilty'])->name('civlian.plea.guilty');
Route::get('/ticket/{ticket}/plea_not_guilty', [CivilianPleaController::class, 'plea_not_guilty'])->name('civlian.plea.not_guilty');

Route::resource('officers', OfficerController::class);

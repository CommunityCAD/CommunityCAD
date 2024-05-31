<?php

use App\Http\Controllers\Civilian\Business\BusinessEmployeeController;
use App\Http\Controllers\Civilian\Business\BusinessVehicleController;
use App\Http\Controllers\Civilian\BusinessController;
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

Route::get('/civilian/ticket/{ticket}', [CivilianPageController::class, 'show_ticket'])->name('ticket.show');

Route::get('/businesses/{business}/approve_interview/{businessEmployee}', [BusinessEmployeeController::class, 'approve_interview'])->name('business.approve_interview');
Route::get('/businesses/{business}/deny_interview/{businessEmployee}', [BusinessEmployeeController::class, 'deny_interview'])->name('business.deny_interview');

Route::get('/businesses/{business}/quit/{businessEmployee}', [BusinessEmployeeController::class, 'quit'])->name('business.quit');

Route::get('/businesses/{business}/promote_to_manager/{businessEmployee}', [BusinessEmployeeController::class, 'promote_to_manager'])->name('business.promote_to_manager');
Route::get('/businesses/{business}/promote_to_owner/{businessEmployee}', [BusinessEmployeeController::class, 'promote_to_owner'])->name('business.promote_to_owner');

Route::get('/businesses/{business}/demote_to_manager/{businessEmployee}', [BusinessEmployeeController::class, 'demote_to_manager'])->name('business.demote_to_manager');
Route::get('/businesses/{business}/demote_to_employee/{businessEmployee}', [BusinessEmployeeController::class, 'demote_to_employee'])->name('business.demote_to_employee');

Route::post('/businesses/{business}/transfer_ownership', [BusinessEmployeeController::class, 'transfer_ownership'])->name('business.transfer_ownership');
Route::post('/businesses/{business}/apply', [BusinessEmployeeController::class, 'apply'])->name('business.apply');

Route::get('businesses/{business}/vehicle/{vehicle}/renew', [BusinessVehicleController::class, 'renew'])->name('businesses.vehicle.renew');
Route::get('businesses/{business}/vehicle/{vehicle}/found', [BusinessVehicleController::class, 'found'])->name('businesses.vehicle.found');
Route::get('businesses/{business}/vehicle/{vehicle}/expire', [BusinessVehicleController::class, 'expire'])->name('businesses.vehicle.expire');
Route::get('businesses/{business}/vehicle/{vehicle}/stolen', [BusinessVehicleController::class, 'stolen'])->name('businesses.vehicle.stolen');
Route::resource('businesses/{business}/vehicle', BusinessVehicleController::class)->only(['create', 'store', 'destroy'])->names('businesses.vehicle');

Route::resource('businesses', BusinessController::class);

Route::get('/ticket/{ticket}/plea_guilty', [CivilianPleaController::class, 'plea_guilty'])->name('civlian.plea.guilty');
Route::get('/ticket/{ticket}/plea_not_guilty', [CivilianPleaController::class, 'plea_not_guilty'])->name('civlian.plea.not_guilty');

Route::post('/officers/{officer}/update_department_information', [OfficerController::class, 'update_department_information'])->name('officer.update_department_information');
Route::get('officer/sync_discord_roles', [OfficerController::class, 'sync_discord_roles'])->name('officer.sync_discord_roles');
Route::resource('officers', OfficerController::class);

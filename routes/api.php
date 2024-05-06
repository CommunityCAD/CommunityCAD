<?php

use App\Http\Controllers\Api\v1\Civilian\CivilianController;
use App\Http\Controllers\Api\v1\Emergency\CallController;
use App\Http\Controllers\Api\v1\Emergency\GetActiveUnitController;
use App\Http\Controllers\Api\v1\Emergency\LookupController;
use App\Http\Controllers\Api\v1\Emergency\PanicController;
use App\Http\Controllers\Api\v1\Emergency\UnitLocationController;
use App\Http\Controllers\Api\v1\Emergency\UnitStatusController;
// use App\Http\Controllers\Api\v1\Fivem\Leo\PanicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('v1', function (Request $request) {
    return response(['message' => 'The API is running. Better go catch it.'], 200, ['Content-Type', 'application/json']);
});

Route::name('v1.emergency.')->prefix('v1/emergency')->group(function () {
    Route::post('panic', [PanicController::class, 'panic']);
    Route::post('unit_status', [UnitStatusController::class, 'unit_status']);
    Route::post('unit_location', [UnitLocationController::class, 'unit_location']);
    Route::post('get_active_unit', [GetActiveUnitController::class, 'get_active_unit']);


    Route::post('get_calls', [CallController::class, 'get_calls']);
    Route::post('create_call', [CallController::class, 'create_call']);
    Route::post('get_call', [CallController::class, 'get_call']);
    Route::post('add_call_note', [CallController::class, 'add_call_note']);
    Route::post('edit_call', [CallController::class, 'edit_call']);
    Route::post('attach_unit', [CallController::class, 'attach_unit']);
    Route::post('detach_unit', [CallController::class, 'detach_unit']);
    Route::post('close_call', [CallController::class, 'close_call']);

    Route::post('vehicle_lookup', [LookupController::class, 'vehicle_lookup']);
    Route::post('civilian_lookup', [LookupController::class, 'civilian_lookup']);
});

Route::name('v1.civilian.')->prefix('v1/civilian')->group(function () {
    Route::post('set_active_civilian', [CivilianController::class, 'set_active_civilian']);
    Route::post('get_active_civilian', [CivilianController::class, 'get_active_civilian']);
    Route::post('get_civilians', [CivilianController::class, 'get_civilians']);
    Route::post('get_civilian', [CivilianController::class, 'get_civilian']);
    Route::post('create_civilian', [CivilianController::class, 'create_civilian']);
    Route::post('edit_civilian', [CivilianController::class, 'edit_civilian']);
    Route::post('register_vehicle', [CivilianController::class, 'register_vehicle']);
});

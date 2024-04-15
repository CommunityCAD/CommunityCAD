<?php

use App\Http\Controllers\Api\v1\Emergency\PanicController;
use App\Http\Controllers\Api\v1\Fivem\Civilian\CivilianController;
use App\Http\Controllers\Api\v1\Fivem\Civilian\CreateCallController;
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

// Route::get('v1/vehicles', function (Request $request) {
//     return $request->header('token');
// });

Route::get('v1', function (Request $request) {
    return response(['message' => 'The API is running. Better go catch it.'], 200, ['Content-Type', 'application/json']);
});

// Route::post('v1/fivem/leo/panic', [PanicController::class, 'panic']);
// Route::post('v1/fivem/leo/stop_panic', [PanicController::class, 'stop_panic']);

Route::post('v1/fivem/civilian/create_call', [CreateCallController::class, 'create']);
Route::post('v1/fivem/civilian/civilians', [CivilianController::class, 'index']);
Route::post('v1/fivem/civilian/create', [CivilianController::class, 'store']);


Route::name('v1.emergency.')->prefix('v1/emergency')->group(function () {
    Route::post('/panic', [PanicController::class, 'panic']);
});

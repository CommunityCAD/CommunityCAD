<?php

use App\Http\Controllers\Api\v1\Fivem\Leo\PanicController;
use App\Http\Controllers\Api\v1\Fivem\Civilian\CreateCallController;
use App\Models\Cad\ActiveUnit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::get('v1/vehicles', function (Request $request) {
    return $request->header('token');
});

Route::post('v1/fivem/leo/panic', [PanicController::class, 'panic']);
Route::post('v1/fivem/leo/stop_panic', [PanicController::class, 'stop_panic']);

Route::post('v1/fivem/civilian/create_call', [CreateCallController::class, 'create']);

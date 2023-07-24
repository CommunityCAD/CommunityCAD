<?php

use App\Http\Controllers\Dispatch\AddUnitController;
use App\Http\Controllers\Dispatch\DispatchPageController;
use Illuminate\Support\Facades\Route;


Route::get('landing', [DispatchPageController::class, 'landing'])->name('landing');
Route::post('add_unit', AddUnitController::class)->name('add_unit');

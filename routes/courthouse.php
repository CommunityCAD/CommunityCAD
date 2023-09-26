<?php

use App\Http\Controllers\Courthouse\CourthousePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourthousePageController::class, 'home'])->name('home');

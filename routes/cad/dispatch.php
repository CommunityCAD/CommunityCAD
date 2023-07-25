<?php

use App\Http\Controllers\Dispatch\DispatchPageController;
use Illuminate\Support\Facades\Route;

Route::get('home', [DispatchPageController::class, 'home'])->name('home');

<?php

use App\Http\Controllers\Cad\Mdt\MdtPageController;
use Illuminate\Support\Facades\Route;

Route::get('home', [MdtPageController::class, 'home'])->name('home');
Route::get('cad', [MdtPageController::class, 'cad'])->name('cad');

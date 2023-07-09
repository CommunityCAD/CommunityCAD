<?php

use App\Http\Controllers\Supervisor\ReportController;
use Illuminate\Support\Facades\Route;

Route::resource('reports', ReportController::class)->only('index', 'show')->middleware('can:report_manage');

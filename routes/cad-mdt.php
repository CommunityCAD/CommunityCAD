<?php

use App\Http\Controllers\Cad\AddUnitController;
use App\Http\Controllers\Cad\CadController;
use App\Http\Controllers\Cad\CallController;
use App\Http\Controllers\Cad\Mdt\MdtController;
use Illuminate\Support\Facades\Route;


Route::get('landing', [CadController::class, 'landing'])->name('landing');
Route::post('add_unit', AddUnitController::class)->name('add_unit');
Route::get('home', [CadController::class, 'home'])->name('home');

Route::get('stop_panic', [CadController::class, 'stop_panic'])->name('stop_panic');
Route::get('clear_panic', [CadController::class, 'clear_panic'])->name('clear_panic');
Route::get('panic', [CadController::class, 'panic'])->name('panic');

Route::resource('call', CallController::class);

Route::get('mdt/home', [CadController::class, 'mdt_home'])->name('mdt.home');
Route::get('mdt', [MdtController::class, 'mdt'])->name('mdt');






// Route::get('cad', [CadPageController::class, 'cad'])->name('cad');

// Route::get('landing', [CadPageController::class, 'landing'])->name('landing');
// Route::post('add_unit', AddUnitController::class)->name('add_unit');
// Route::get('stop_panic', [CadPageController::class, 'stop_panic'])->name('stop_panic');
// Route::get('clear_panic', [CadPageController::class, 'clear_panic'])->name('clear_panic');
// Route::get('panic', [CadPageController::class, 'panic'])->name('panic');

// Route::resource('call', CallController::class);
// Route::resource('report', ReportController::class);

// Route::get('civilan/{civilian}/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
// Route::post('civilan/{civilian}/ticket', [TicketController::class, 'store'])->name('ticket.store');
// Route::get('ticket/{ticket}/add_charges', [TicketController::class, 'add_charges'])->name('ticket.add_charges');
// Route::post('ticket/{ticket}/add_charges', [TicketController::class, 'add_charges_store'])->name('ticket.add_charges_store');
// Route::get('ticket/{ticket}/sign_ticket', [TicketController::class, 'sign_ticket'])->name('ticket.sign_ticket');
// Route::get('ticket/{ticket}', [TicketController::class, 'show'])->name('ticket.show');

// Route::get('name/search', [CivilianSearchController::class, 'search'])->name('name.search');
// Route::get('name/{civilian}', [CivilianSearchController::class, 'return'])->name('name.return');
// Route::post('name/{civilian}/link_to_call', [CivilianSearchController::class, 'link_civilian_to_call'])->name('name.link_to_call');
// Route::post('name/{civilian}/update_alerts', UpdateCivilianAlertsController::class)->name('name.update_alerts');

// Route::get('vehicle/search', [VehicleSearchController::class, 'search'])->name('vehicle.search');
// Route::get('vehicle/{vehicle:plate}', [VehicleSearchController::class, 'return'])->name('vehicle.return');

// Route::get('offduty', [OffDutyController::class, 'create'])->name('offduty.create');
// Route::post('offduty', [OffDutyController::class, 'store'])->name('offduty.store');
// Route::get('offdutyskipreport', [OffDutyController::class, 'skipreport'])->name('offduty.skipreport');

// Route::post('call/{call}/update_call_log', [CallLogController::class, 'store'])->name('call_log.store');
// Route::post('call/{call}/add_persons', [CallController::class, 'add_persons'])->name('add_persons');

<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Civilian\Vehicle;
use Illuminate\Http\Request;

class StolenVehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::where('vehicle_status', 2)->get();
        return view('cad.stolen_vehicles.index', compact('vehicles'));
    }
}

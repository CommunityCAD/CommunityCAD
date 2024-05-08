<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Civilian\Vehicle;

class StolenVehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::where('vehicle_status', 2)->get();

        return view('cad.stolen_vehicles.index', compact('vehicles'));
    }

    public function clear(Vehicle $vehicle)
    {
        // dd($vehicle);
        $vehicle->update(['vehicle_status' => 1]);
        return redirect()->route('cad.message_center');
    }
}

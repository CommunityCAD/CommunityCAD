<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\CallCivilian;
use App\Models\CallVehicle;
use App\Models\Civilian\Vehicle;
use Illuminate\Http\Request;

class CallVehicleController extends Controller
{
    public function add_vehicle()
    {
    }

    public function remove_vehicle(Call $call, Vehicle $vehicle)
    {
        $call_vehicles = CallVehicle::where('call_id', $call->id)->where('vehicle_id', $vehicle->id)->get();

        foreach ($call_vehicles as $call_vehicle) {
            $call_vehicle->delete();
        }

        return redirect()->route('cad.call.show', $call->id);
    }
}

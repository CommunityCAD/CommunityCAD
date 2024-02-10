<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\CallVehicle;
use App\Models\Civilian\Vehicle;
use Illuminate\Http\Request;

class VehicleSearchController extends Controller
{
    public function search()
    {
        return view('cad.vehicle_search.search');
    }

    public function return(Vehicle $vehicle)
    {
        $calls = Call::where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->orderBy('priority', 'desc')->get();

        return view('cad.vehicle_search.return', compact('vehicle', 'calls'));
    }

    public function link_vehicle_to_call(Vehicle $vehicle, Call $call, Request $request)
    {
        $validated = $request->validate([
            'call_id' => 'required',
            'type' => 'required',
        ]);

        CallVehicle::create([
            'call_id' => $validated['call_id'],
            'vehicle_id' => $vehicle->id,
            'type' => $validated['type'],
        ]);

        return redirect()->route('cad.vehicle.return', $vehicle->plate)->with('alerts', [['message' => 'Vehicle linked to call '.$call->id, 'level' => 'success']]);
    }
}

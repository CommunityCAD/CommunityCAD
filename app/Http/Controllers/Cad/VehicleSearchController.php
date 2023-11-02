<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\Civilian\Vehicle;

class VehicleSearchController extends Controller
{
    public function search()
    {
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->count();

        if ($active_unit == 0) {
            return redirect()->route('cad.landing');
        }

        return view('cad.vehicle_search.search');
    }

    public function return(Vehicle $vehicle)
    {
        return view('cad.vehicle_search.return', compact('vehicle'));
    }
}

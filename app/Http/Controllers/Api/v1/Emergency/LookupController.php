<?php

namespace App\Http\Controllers\Api\v1\Emergency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Emergency\CivilianLookupRequest;
use App\Http\Requests\Api\v1\Emergency\VehicleLookupRequest;
use App\Http\Resources\Api\v1\Emergency\CivilianResource;
use App\Http\Resources\Api\v1\Emergency\VehicleResource;
use App\Models\Civilian;
use App\Models\Civilian\Vehicle;
use Illuminate\Http\Request;

class LookupController extends Controller
{
    public function vehicle_lookup(VehicleLookupRequest $request)
    {
        $vehicle = Vehicle::where('plate', $request->plate)->get()->first();

        if (!$vehicle) {
            return response()->json([
                'success'   => false,
                'message'   => 'No plate found.',
                'data'      => []
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new VehicleResource($vehicle),
            ]
        ]);
    }

    public function civilian_lookup(CivilianLookupRequest $request)
    {

        if ($request->name) {
            $name = explode(' ', $request->name, 2);

            if (!isset($name[1])) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'You must have both first name and last name.',
                    'data'      => []
                ]);
            }

            $civilian = Civilian::where('first_name', $name[0])->where('last_name', $name[1])->get()->first();
        }

        if ($request->ssn) {
            $civilian = Civilian::where('id', $request->ssn)->get()->first();
        }

        if (!$request->ssn && !$request->name) {
            return response()->json([
                'success'   => false,
                'message'   => 'You must have the name or SSN.',
                'data'      => []
            ]);
        }

        if (!$civilian) {
            return response()->json([
                'success'   => false,
                'message'   => 'No civilian found.',
                'data'      => []
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new CivilianResource($civilian),
            ]
        ]);
    }
}

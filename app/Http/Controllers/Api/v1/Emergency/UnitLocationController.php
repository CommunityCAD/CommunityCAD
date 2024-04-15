<?php

namespace App\Http\Controllers\Api\v1\Emergency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Emergency\UnitLocationRequest;
use App\Models\Cad\ActiveUnit;
use Illuminate\Http\Request;

class UnitLocationController extends Controller
{
    public function unit_location(UnitLocationRequest $request)
    {

        $active_unit = ActiveUnit::where('user_id', $request->user_id)->get()->first();

        if (!$active_unit) {
            return response()->json([
                'success'   => false,
                'message'   => 'No active unit found for the given user.',
                'data'      => []
            ]);
        }
        $active_unit->location = $request->location;
        $active_unit->save();

        return response()->json([
            'success'   => true,
            'message'   => "Location updated.",
            'data'      => []
        ]);
    }
}

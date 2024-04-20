<?php

namespace App\Http\Controllers\Api\v1\Emergency;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\Emergency\ActiveUnitResource;
use App\Models\Cad\ActiveUnit;
use Illuminate\Http\Request;

class GetActiveUnitController extends Controller
{
    public function get_active_unit(Request $request)
    {
        $active_unit = ActiveUnit::where('user_id', $request->user_id)->get()->first();

        if (!$active_unit) {
            return response()->json([
                'success'   => false,
                'message'   => 'No active unit found for the given user.',
                'data'      => []
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new ActiveUnitResource($active_unit),
            ]
        ]);
    }
}

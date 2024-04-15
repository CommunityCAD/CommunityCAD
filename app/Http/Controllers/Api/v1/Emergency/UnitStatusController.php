<?php

namespace App\Http\Controllers\Api\v1\Emergency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Emergency\UnitStatusRequest;
use App\Models\Cad\ActiveUnit;
use Illuminate\Http\Request;

class UnitStatusController extends Controller
{
    public function unit_status(UnitStatusRequest $request)
    {

        $active_unit = ActiveUnit::where('user_id', $request->user_id)->get()->first();

        if (!$active_unit) {
            return response()->json([
                'success'   => false,
                'message'   => 'No active unit found for the given user.',
                'data'      => []
            ]);
        }
        $active_unit->status = $request->status;
        $active_unit->is_panic = 0;
        $active_unit->save();

        return response()->json([
            'success'   => true,
            'message'   => "Status updated.",
            'data'      => []
        ]);
    }
}

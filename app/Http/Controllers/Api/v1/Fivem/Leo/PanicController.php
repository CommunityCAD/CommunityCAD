<?php

namespace App\Http\Controllers\Api\v1\Fivem\Leo;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use Illuminate\Http\Request;

class PanicController extends Controller
{
    public function panic(Request $request)
    {

        $active_unit = ActiveUnit::where('user_id', $request->user_id)->get()->first();

        if (!$active_unit) {
            return response(['error' => "No unit for that user id."], 404, ['Content-Type', 'application/json']);
        }

        $active_unit->status = "PANIC";
        $active_unit->is_panic = 1;

        $active_unit->save();


        return response($active_unit, 200, ['Content-Type', 'application/json']);
    }

    public function stop_panic(Request $request)
    {

        $active_unit = ActiveUnit::where('user_id', $request->user_id)->get()->first();

        if (!$active_unit) {
            return response(['error' => "No unit for that user id."], 404, ['Content-Type', 'application/json']);
        }

        $active_unit->status = "AVL";
        $active_unit->is_panic = 0;

        $active_unit->save();


        return response($active_unit, 200, ['Content-Type', 'application/json']);
    }
}

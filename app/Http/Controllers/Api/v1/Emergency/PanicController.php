<?php

namespace App\Http\Controllers\Api\v1\Emergency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Emergency\PanicRequest;
use App\Models\Cad\ActiveUnit;
use Illuminate\Http\Request;

class PanicController extends Controller
{
    public function panic(PanicRequest $request)
    {

        $active_unit = ActiveUnit::where('user_id', $request->user_id)->get()->first();

        if (!$active_unit) {
            return response()->json([
                'success'   => false,
                'message'   => 'Active unit not found.',
                'data'      => [
                    'error' => 'No active unit found for the given user.'
                ]
            ]);
        }

        $active_unit->status = 'PANIC';
        $active_unit->is_panic = 1;
        $active_unit->location = $request->location;
        $message = 'You have pressed your panic button.';

        if (!$request->is_panic) {
            $active_unit->status = 'AVL';
            $active_unit->is_panic = 0;
            $message = 'You have cleared your panic button.';
        }

        $active_unit->save();

        return response()->json([
            'success'   => true,
            'message'   => $message,
            'data'      => []
        ]);
    }
}

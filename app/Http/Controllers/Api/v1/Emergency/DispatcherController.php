<?php

namespace App\Http\Controllers\Api\v1\Emergency;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use Illuminate\Http\Request;

class DispatcherController extends Controller
{
    public function get_active_dispatcher()
    {
        $active_dispatch = ActiveUnit::where('department_type', 2)->where('status', '!=', 'OFFDTY')->orderBy('created_at')->get()->first();
        if (!$active_dispatch) {
            return response()->json([
                'success'   => true,
                'message'   => 'No active dispatcher.',
                'data'      => []
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Active Dispatcher on duty.',
            'data'      => [
                $active_dispatch
            ]
        ]);
    }
}

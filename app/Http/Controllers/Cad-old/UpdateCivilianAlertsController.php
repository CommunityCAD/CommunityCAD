<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Civilian;
use Illuminate\Http\Request;

class UpdateCivilianAlertsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Civilian $civilian, Request $request)
    {
        $data = [];
        if ($request->is_violent == 'on') {
            $data['is_violent'] = true;
        } else {
            $data['is_violent'] = false;
        }

        if ($request->is_weapon == 'on') {
            $data['is_weapon'] = true;
        } else {
            $data['is_weapon'] = false;
        }

        if ($request->is_ill == 'on') {
            $data['is_ill'] = true;
        } else {
            $data['is_ill'] = false;
        }

        $civilian->update($data);

        return redirect()->route('cad.name.return', $civilian->id)->with('alerts', [['message' => 'Alerts Updated.', 'level' => 'success']]);
    }
}

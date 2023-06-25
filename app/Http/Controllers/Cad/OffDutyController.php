<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use Illuminate\Http\Request;

class OffDutyController extends Controller
{

    public function edit()
    {
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();

        $active_unit->update(['status' => 'OFFDTY']);

        return view('cad.offduty.edit');
    }


    public function update(Request $request)
    {
        //
    }
}

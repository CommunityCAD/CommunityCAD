<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\Report;
use Illuminate\Http\Request;

class OffDutyController extends Controller
{
    public function create()
    {
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();

        $active_unit->update(['status' => 'OFFDTY']);

        return view('cad.offduty.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['title'] = 'End of Watch for '.auth()->user()->officer_name_check.' on '.date('m/d/Y H:i');
        $validated['report_type_id'] = 1;

        Report::create($validated);

        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();
        $active_unit->delete();

        return redirect()->route('portal.dashboard')->with('alerts', [['message' => 'Report Submitted.', 'level' => 'success']]);
    }
}

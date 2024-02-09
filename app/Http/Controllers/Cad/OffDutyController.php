<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\Call;
use App\Models\Report;
use App\Models\ReportType;
use Illuminate\Http\Request;

class OffDutyController extends Controller
{
    public function create()
    {
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();
        $calls = Call::where('status', '!=', 'CLO')->get();
        foreach ($calls as $call) {
            $call->attached_units()->detach($active_unit->id);
        }

        $active_unit->update(['status' => 'OFFDTY']);

        return view('cad.offduty.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => '',
            'mdcontent' => 'required',
            'report_type_id' => 'required|numeric',
            'title' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['report_type_id'] = 1;
        $validated['text'] = $validated['mdcontent'];
        unset($validated['mdcontent']);

        Report::create($validated);

        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();
        $active_unit->delete();

        return redirect()->route('portal.dashboard')->with('alerts', [['message' => 'Report Submitted.', 'level' => 'success']]);
    }

    public function skipreport()
    {
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();
        $calls = Call::where('status', '!=', 'CLO')->get();
        foreach ($calls as $call) {
            $call->attached_units()->detach($active_unit->id);
        }

        $active_unit->delete();
        return redirect()->route('portal.dashboard')->with('alerts', [['message' => 'Marked Off Duty.', 'level' => 'success']]);
    }
}

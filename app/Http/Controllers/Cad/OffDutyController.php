<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\Cad\Call;
use App\Models\CallLog;
use App\Models\Report;
use App\Models\ReportType;
use Illuminate\Http\Request;

class OffDutyController extends Controller
{
    public function create()
    {
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();
        $calls = Call::where('status', '!=', 'CLO')->get();
        $report_types = ReportType::all();

        foreach ($calls as $call) {
            if (in_array($active_unit->badge_number, $call->nice_units)) {
                $this->remove_unit_from_call($active_unit, $call);
            }
        }

        $active_unit->update(['status' => 'OFFDTY']);

        return view('cad.offduty.create', compact('report_types'));
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
        $active_unit->delete();

        return redirect()->route('portal.dashboard')->with('alerts', [['message' => 'Marked Off Duty.', 'level' => 'success']]);
    }

    private function remove_unit_from_call(ActiveUnit $activeUnit, Call $call)
    {
        $this->update_call_with_units($activeUnit, $call, 'delete');
        $this->update_units_for_call($activeUnit, $call, 'delete');
        CallLog::create([
            'from' => 'SYSTEM',
            'text' => 'Unit ' . $activeUnit->badge_number . ' has been removed from call.',
            'call_id' => $call->id,
        ]);

        $call->touch();
    }

    private function update_call_with_units(ActiveUnit $activeUnit, Call $call, $action)
    {
        $call_units = $call->nice_units;
        if ($action === 'add') {
            if (($key = array_search($activeUnit->badge_number, $call_units)) === false) {
                $call_units[] = $activeUnit->badge_number;
                $new_call_units['data'] = array_values($call_units);
                $new_call_units = json_encode(collect($new_call_units));
                $call->update(['units' => $new_call_units]);

                $activeUnit->update(['status' => $call->status]);
            }
        } else {
            if (($key = array_search($activeUnit->badge_number, $call_units)) !== false) {
                unset($call_units[$key]);
                $new_call_units['data'] = array_values($call_units);
                $new_call_units = json_encode(collect($new_call_units));
                $call->update(['units' => $new_call_units]);

                $activeUnit->update(['status' => 'AVL']);
            }
        }
    }

    private function update_units_for_call(ActiveUnit $activeUnit, Call $call, $action)
    {
        $unit_calls = $activeUnit->nice_calls;
        if ($action === 'add') {
            if (($key = array_search($call->id, $unit_calls)) === false) {
                $unit_calls[] = $call->id;
                $new_unit_calls['data'] = array_values($unit_calls);
                $new_unit_calls = json_encode(collect($new_unit_calls));
                $activeUnit->update(['calls' => $new_unit_calls]);
            }
        } else {
            if (($key = array_search($call->id, $unit_calls)) !== false) {
                unset($unit_calls[$key]);
                $new_unit_calls['data'] = array_values($unit_calls);
                $new_unit_calls = json_encode(collect($new_unit_calls));
                $activeUnit->update(['calls' => $new_unit_calls]);
            }
        }
    }
}

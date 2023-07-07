<?php

namespace App\Http\Livewire\Cad\Leo;

use App\Models\Cad\ActiveUnit;
use App\Models\Cad\Call;
use App\Models\CallLog;
use Livewire\Component;

class LeoCad extends Component
{
    public $active_units;

    public $calls;

    public function render()
    {
        $this->active_units = ActiveUnit::get();
        $this->calls = Call::where('status', '!=', 'CLO')->orderBy('priority', 'desc')->get(['id', 'nature', 'location', 'city', 'priority', 'status', 'updated_at', 'units', 'type']);

        return view('livewire.cad.leo.leo-cad');
    }

    public function set_status(ActiveUnit $activeUnit, $status)
    {
        $activeUnit->update(['status' => $status]);
    }

    public function set_call_status(Call $call, $status)
    {
        $call->update(['status' => $status]);

        foreach ($call->nice_units as $unit) {
            $unit = ActiveUnit::where('badge_number', $unit)->get()->first();
            $unit->update(['status' => $status]);
        }
    }

    public function set_call_priority(Call $call, $status)
    {
        $call->update(['priority' => $status]);
    }

    public function remove_unit_from_call(ActiveUnit $activeUnit, Call $call)
    {
        $this->update_call_with_units($activeUnit, $call, 'delete');
        $this->update_units_for_call($activeUnit, $call, 'delete');
        CallLog::create([
            'from' => 'SYSTEM',
            'text' => 'Unit ' . $activeUnit->badge_number . ' has been removed from call.',
            'call_id' => $call->id,
        ]);
    }

    public function add_unit_to_call(ActiveUnit $activeUnit, Call $call)
    {
        $this->update_call_with_units($activeUnit, $call, 'add');
        $this->update_units_for_call($activeUnit, $call, 'add');
        CallLog::create([
            'from' => 'SYSTEM',
            'text' => 'Unit ' . $activeUnit->badge_number . ' has been added to call.',
            'call_id' => $call->id,
        ]);
    }

    public function close_call(Call $call)
    {
        $call_units = $call->nice_units;

        // Make Units avail
        foreach ($call_units as $unit) {
            $unit = ActiveUnit::where('badge_number', $unit)->get()->first();
            $unit->update(['status' => 'AVL']);
            $this->update_units_for_call($unit, $call, 'delete');
        }


        // Mark call as CLO and Mark all units off call

        $call->update(['status' => 'CLO', 'units' => '{\"data\":[]}']);
        CallLog::create([
            'from' => 'SYSTEM',
            'text' => 'Call ' . $call->id . ' has been closed and units (' . implode(', ', $call_units) . ') removed from call.',
            'call_id' => $call->id,
        ]);
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

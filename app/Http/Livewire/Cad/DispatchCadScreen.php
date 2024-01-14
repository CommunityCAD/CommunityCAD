<?php

namespace App\Http\Livewire\Cad;

use App\Models\Cad\ActiveUnit;
use App\Models\Cad\Call;
use App\Models\Cad\CallNatures;
use App\Models\Cad\CallStatuses;
use App\Models\CallLog;
use Livewire\Component;

class DispatchCadScreen extends Component
{
    public $active_units;

    public $active_dispatcher;

    public $calls;

    public $active_dispatch = 'OFFDTY';

    public $active_panic = false;

    public $call_natures = CallNatures::NATURECODES;

    public $call_statuses = CallStatuses::STATUSCODES;

    public function render()
    {
        $this->active_units = ActiveUnit::where('department_type', '!=', 2)->orderBy('department_type', 'asc')->get();
        $this->calls = Call::where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->orderBy('priority', 'desc')->get();
        $this->active_dispatcher = ActiveUnit::where('department_type', 2)->where('status', '!=', 'OFFDTY')->orderBy('created_at')->get()->first();

        if (ActiveUnit::where('is_panic', '1')->count() > 0) {
            $this->active_panic = true;
        }

        // dd($this->active_dispatcher);

        if ($this->active_dispatcher) {
            switch ($this->active_dispatcher->status) {
                case 'AVL':
                    $this->active_dispatch = 'AVL';
                    break;
                case 'CALL':
                    $this->active_dispatch = 'BUSY';
                    break;
                case 'BRK':
                    $this->active_dispatch = 'BUSY';
                    break;

                default:
                    $this->active_dispatch = 'OFFDTY';
                    break;
            }
        } else {
            $this->active_dispatch = 'OFFDTY';
        }

        return view('livewire.cad.dispatch-cad-screen');
    }

    public function set_status(ActiveUnit $activeUnit, $status)
    {
        $activeUnit->update(['status' => $status]);
        if ($status == 'AVL') {
            $activeUnit->touch('created_at');
        }

        $this->reset();
    }

    public function hard_offduty(ActiveUnit $activeUnit)
    {
        $calls = Call::where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->get();

        foreach ($calls as $call) {
            if (in_array($activeUnit->badge_number, $call->nice_units)) {
                $this->remove_unit_from_call($activeUnit, $call);
            }
        }

        $activeUnit->delete();

        $this->reset();
    }

    public function set_call_status(Call $call, $status)
    {
        $call->update(['status' => $status]);

        $status_array = explode('-', $status);
        if ($status_array[0] == 'CLO') {
            $this->close_call($call);
        }

        CallLog::create([
            'from' => 'Dispatch ' . $this->active_dispatcher->badge_number,
            'text' => 'Call Status Updated To ' . $status,
            'call_id' => $call->id,
        ]);
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
            'from' => 'Dispatch ' . $this->active_dispatcher->badge_number,
            'text' => 'Officer ' . $activeUnit->badge_number . ' has been unassigned.',
            'call_id' => $call->id,
        ]);

        $call->touch();
    }

    public function add_unit_to_call(ActiveUnit $activeUnit, Call $call)
    {
        $this->update_call_with_units($activeUnit, $call, 'add');
        $this->update_units_for_call($activeUnit, $call, 'add');
        CallLog::create([
            'from' => 'Dispatch ' . $this->active_dispatcher->badge_number,
            'text' => 'Officer ' . $activeUnit->badge_number . ' has been assigned.',
            'call_id' => $call->id,
        ]);

        $call->touch();
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

        $call->update(['units' => '{"data":[]}']);
        CallLog::create([
            'from' => 'Dispatch ' . $this->active_dispatcher->badge_number,
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

                $activeUnit->update(['status' => "ENRUTE"]);
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
                $activeUnit->update(['calls' => $new_unit_calls, 'description' => 'Added to call: ' . $call->id]);
            }
        } else {
            if (($key = array_search($call->id, $unit_calls)) !== false) {
                unset($unit_calls[$key]);
                $new_unit_calls['data'] = array_values($unit_calls);
                $new_unit_calls = json_encode(collect($new_unit_calls));
                $activeUnit->update(['calls' => $new_unit_calls, 'description' => 'Removed from call: ' . $call->id]);
            }
        }
    }
}

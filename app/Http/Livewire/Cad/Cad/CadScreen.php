<?php

namespace App\Http\Livewire\Cad\Cad;

use App\Models\Cad\ActiveUnit;
use App\Models\Call;
use App\Models\Cad\CallNatures;
use App\Models\Cad\CallStatuses;
use App\Models\CallLog;
use Livewire\Component;

class CadScreen extends Component
{
    public $active_units;

    public $online_dispatcher;

    public $calls;

    public $active_panic = false;

    public $call_natures = CallNatures::NATURECODES;

    public $call_statuses = CallStatuses::STATUSCODES;

    protected $listeners = ['updated-page' => '$refresh'];

    public function mount()
    {
    }

    public function render()
    {
        $this->active_units = ActiveUnit::with(['officer', 'user_department', 'calls'])->get()->sortBy('user_department.department.type')->sortBy('user_department.department.initials');
        $this->calls = Call::where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->orderBy('priority', 'desc')->get();
        $this->online_dispatcher = ActiveUnit::where('department_type', 2)->where('status', '!=', 'OFFDTY')->orderBy('created_at')->get()->first();

        return view('livewire.cad.cad.cad-screen');
    }

    public function set_status(ActiveUnit $activeUnit, $status)
    {
        $activeUnit->update(['status' => $status, 'description' => 'Status Set To: ' . $status]);
        $this->emit('updated-page');
    }

    public function set_call_status(Call $call, $status)
    {
        $call->update(['status' => $status]);

        $status_array = explode('-', $status);
        if ($status_array[0] == 'CLO') {
            $this->close_call($call);
        }

        CallLog::create([
            'from' => auth()->user()->active_unit->officer->name . ' (' . auth()->user()->active_unit->user_department->badge_number . ')',
            'text' => 'Call Status Updated To ' . $status,
            'call_id' => $call->id,
        ]);
        $this->emit('updated-page');
    }

    public function set_call_priority(Call $call, $priority)
    {
        CallLog::create([
            'from' => auth()->user()->active_unit->officer->name . ' (' . auth()->user()->active_unit->user_department->badge_number . ')',
            'text' => 'Call Priority Updated To ' . $priority,
            'call_id' => $call->id,
        ]);

        $call->update(['priority' => $priority]);
        $this->emit('updated-page');
    }

    public function remove_unit_from_call(ActiveUnit $activeUnit, Call $call)
    {

        $call->attached_units()->detach($activeUnit->id);

        CallLog::create([
            'from' => auth()->user()->active_unit->officer->name . ' (' . auth()->user()->active_unit->user_department->badge_number . ')',
            'text' => 'Officer ' . $activeUnit->badge_number . ' has been unassigned.',
            'call_id' => $call->id,
        ]);

        $activeUnit->update(['description' => 'Removed from call: ' . $call->id]);

        $call->touch();
        $activeUnit->touch();
        $this->emit('updated-page');
    }

    public function add_unit_to_call(ActiveUnit $activeUnit, Call $call)
    {
        $call->attached_units()->attach($activeUnit->id);

        CallLog::create([
            'from' => auth()->user()->active_unit->officer->name . ' (' . auth()->user()->active_unit->user_department->badge_number . ')',
            'text' => 'Officer ' . $activeUnit->badge_number . ' has been assigned.',
            'call_id' => $call->id,
        ]);

        $activeUnit->update(['description' => 'Added to call: ' . $call->id]);
        $call->touch();
        $activeUnit->touch();
        $this->emit('updated-page');
    }

    public function close_call(Call $call)
    {
        foreach ($call->attached_units as $unit) {
            $unit->update(['status' => 'AVL']);
            $call->attached_units()->detach($unit->id);
        }

        $call->attached_units()->detach();

        CallLog::create([
            'from' => auth()->user()->active_unit->officer->name . ' (' . auth()->user()->active_unit->user_department->badge_number . ')',
            'text' => 'Call ' . $call->id . ' has been closed and all units removed from call.',
            'call_id' => $call->id,
        ]);
        $this->emit('updated-page');
    }

    public function hard_offduty(ActiveUnit $activeUnit)
    {
        $activeUnit->calls()->detach();

        $activeUnit->delete();
        $this->emit('updated-page');
    }
}

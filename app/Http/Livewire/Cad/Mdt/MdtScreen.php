<?php

namespace App\Http\Livewire\Cad\Mdt;

use App\Models\Cad\ActiveUnit;
use App\Models\Cad\Call;
use App\Models\Cad\CallNatures;
use App\Models\Cad\CallStatuses;
use Livewire\Component;

class MdtScreen extends Component
{
    public $active_units;

    public $calls;

    public $active_panic = false;

    public $call_natures = CallNatures::NATURECODES;

    public $call_statuses = CallStatuses::STATUSCODES;

    public function render()
    {
        $active_units = ActiveUnit::all();

        $this->active_units['fire-ems'] = [];
        $this->active_units['leo'] = [];
        $this->active_units['dispatch'] = [];

        foreach ($active_units as $active_unit) {
            switch ($active_unit->user_department->department->type) {
                case 1:
                    array_push($this->active_units['leo'], $active_unit);
                    break;

                case 2:
                    array_push($this->active_units['dispatch'], $active_unit);

                    break;

                case 4:
                    array_push($this->active_units['fire-ems'], $active_unit);

                    break;

                default:
                    # code...
                    break;
            }
        }

        // dd($this->a);


        $this->calls = Call::where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->orderBy('priority', 'desc')->get();
        // $this->active_dispatcher = ActiveUnit::where('department_type', 2)->orderBy('created_at')->get()->first();

        return view('livewire.cad.mdt.mdt-screen');
    }
}

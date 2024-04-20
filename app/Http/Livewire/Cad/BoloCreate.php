<?php

namespace App\Http\Livewire\Cad;

use App\Models\Call;
use App\Models\Civilian;
use App\Models\Civilian\Vehicle;
use Carbon\Carbon;
use Livewire\Component;

class BoloCreate extends Component
{
    public $vehicle_search = '';

    public $vehicles;

    public $linked_vehicle = "";

    public $civilian_search = '';

    public $civilians;

    public $linked_civilian = "";

    public $calls;


    public function render()
    {
        if (!empty($this->civilian_search)) {
            $this->civilians = Civilian::where('first_name', 'like', '%' . $this->civilian_search . '%')->orWhere('last_name', 'like', '%' . $this->civilian_search . '%')->get();
        } else {
            $this->civilians = Civilian::where('id', $this->civilian_search)->get();
        }

        if (!empty($this->vehicle_search)) {
            $this->vehicles = Vehicle::where('plate', 'like', '%' . $this->vehicle_search . '%')->get();
        } else {
            $this->vehicles = Civilian::where('id', $this->vehicle_search)->get();
        }

        $this->calls = Call::where('updated_at', '>', Carbon::now()->subDays(30)->format('Y-m-d 00:00:00'))->get();

        return view('livewire.cad.bolo-create');
    }

    public function add_civilian($civilian_id)
    {
        $this->linked_civilian = Civilian::where('id', $civilian_id)->get()->first();
        $this->civilian_search = '';
    }

    public function remove_civilian($civilian_id)
    {
        $this->civilian_search = '';
        $this->linked_civilian = '';
    }

    public function add_vehicle($vehicle_id)
    {
        $this->linked_vehicle = Vehicle::where('id', $vehicle_id)->get()->first();
        $this->vehicle_search = '';
    }

    public function remove_vehicle($vehicle_id)
    {
        $this->vehicle_search = '';
        $this->linked_vehicle = '';
    }
}

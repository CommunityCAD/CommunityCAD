<?php

namespace App\Http\Livewire\Cad\Leo;

use App\Models\Civilian\Vehicle;
use Livewire\Component;

class VehicleSearch extends Component
{
    public $search_plate = '';

    public $vehicles;
    public $vehicle_return;

    public function render()
    {
        if (!empty($this->search_plate)) {
            $this->vehicles = Vehicle::where('plate', 'like', '%' . $this->search_plate . '%')->with(['civilian'])->get();
        } else {
            $this->vehicles = Vehicle::where('plate', '333')->get();
        }
        return view('livewire.cad.leo.vehicle-search');
    }

    public function show_return(Vehicle $vehicle)
    {
        return $this->vehicle_return = $vehicle;
    }

    public function clear_return()
    {
        $this->reset();
        return $this->vehicle_return = null;
    }
}

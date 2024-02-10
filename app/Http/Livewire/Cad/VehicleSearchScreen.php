<?php

namespace App\Http\Livewire\Cad;

use App\Models\Civilian\Vehicle;
use Livewire\Component;

class VehicleSearchScreen extends Component
{
    public $search_plate = '';

    public $vehicles;

    public function render()
    {
        if (! empty($this->search_plate)) {
            $this->vehicles = Vehicle::where('plate', 'like', '%'.$this->search_plate.'%')->with(['civilian', 'business'])->get();
        } else {
            $this->vehicles = Vehicle::where('plate', '333')->get();
        }

        return view('livewire.cad.vehicle-search-screen');
    }
}

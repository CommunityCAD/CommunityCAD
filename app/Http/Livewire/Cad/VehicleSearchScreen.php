<?php

namespace App\Http\Livewire\Cad;

use App\Models\Civilian\Vehicle;
use Livewire\Component;

class VehicleSearchScreen extends Component
{
    public $search_plate = '';

    public $vehicles;

    protected $queryString = ['search_plate' => ['except' => '', 'as' => 'plate']];

    public $vehicle_return;

    public function render()
    {
        if (! empty($this->search_plate)) {
            $this->vehicles = Vehicle::where('plate', 'like', '%'.$this->search_plate.'%')->with(['civilian'])->get();
        } else {
            $this->vehicles = Vehicle::where('plate', '333')->get();
        }
        // dd($this->vehicles);
        return view('livewire.cad.vehicle-search-screen');
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

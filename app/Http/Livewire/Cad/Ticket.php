<?php

namespace App\Http\Livewire\Cad;

use App\Models\Civilian\Vehicle;
use App\Models\License;
use App\Models\PenalCodeTitle;
use Livewire\Component;

class Ticket extends Component
{
    public $civilian;

    public $calls;

    public $licenseId;

    public $chosen_license = false;

    public $vehicle_plate;

    public $chosen_vehicle = false;

    public $penal_code_title;

    public $charges = [];

    public function mount()
    {
        $this->penal_code_title = PenalCodeTitle::orderBy('number', 'asc')->get();
    }

    public function render()
    {
        $this->chosen_license = License::where('id', $this->licenseId)->get()->first();
        $this->chosen_vehicle = Vehicle::where('plate', $this->vehicle_plate)->get()->first();

        return view('livewire.cad.ticket');
    }

    public function getLicense()
    {
        $this->chosen_license = true;
    }
}

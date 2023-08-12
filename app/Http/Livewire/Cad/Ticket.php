<?php

namespace App\Http\Livewire\Cad;

use App\Models\Civilian;
use App\Models\Civilian\Vehicle;
use App\Models\License;
use App\Models\PenalCode;
use App\Models\PenalCodeTitle;
use Livewire\Component;

class Ticket extends Component
{
    public $civilian;
    public $licenseId;
    public $chosen_license = false;

    public $vehicleId;
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
        $this->chosen_vehicle = Vehicle::where('id', $this->vehicleId)->get()->first();
        return view('livewire.cad.ticket');
    }

    public function getLicense()
    {
        $this->chosen_license = true;
    }
}

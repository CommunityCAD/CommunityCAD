<?php

namespace App\Http\Livewire\Cad;

use App\Models\Call;
use App\Models\Civilian\Vehicle;
use App\Models\License;
use App\Models\PenalCodeTitle;
use Livewire\Component;

class CreateCitation extends Component
{
    public $civilian;

    public $calls;

    public $licenseId;

    public $chosen_license = false;

    public $vehicle_plate;

    public $chosen_vehicle = false;

    public $vehicle_error = null;

    public $penal_code_title;

    public $charges = [];

    public function mount()
    {
        // $this->penal_code_title = PenalCodeTitle::orderBy('number', 'asc')->get();
        $this->licenseId = old('license_id');
        $this->chosen_license = License::where('id', $this->licenseId)->get()->first();

        $this->chosen_vehicle = Vehicle::where('id', old('vehicle_id'))->get()->first();
        $this->vehicle_plate = old('plate');
    }

    public function render()
    {
        $this->chosen_license = License::where('id', $this->licenseId)->get()->first();
        $this->chosen_vehicle = Vehicle::where('plate', $this->vehicle_plate)->get()->first();

        return view('livewire.cad.create-citation');
    }

    public function getLicense()
    {
        $this->chosen_license = true;
    }

    public function searchPlate()
    {
        $this->chosen_vehicle = Vehicle::where('plate', $this->vehicle_plate)->get()->first();
        if (is_null($this->chosen_vehicle)) {
            $this->vehicle_error = true;
        } else {
            $this->vehicle_error = false;
        }
    }
}

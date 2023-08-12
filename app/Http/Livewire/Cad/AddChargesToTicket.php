<?php

namespace App\Http\Livewire\Cad;

use App\Models\PenalCode;
use App\Models\PenalCodeTitle;
use Livewire\Component;

class AddChargesToTicket extends Component
{
    public $ticket;
    public $penal_code_id;
    public $penal_code;
    public $penal_code_titles;
    public function render()
    {
        $this->penal_code_titles = PenalCodeTitle::get();
        $this->penal_code = PenalCode::where('id', $this->penal_code_id)->get()->first();
        return view('livewire.cad.add-charges-to-ticket');
    }
}

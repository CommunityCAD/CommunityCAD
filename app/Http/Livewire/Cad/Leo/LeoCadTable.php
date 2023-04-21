<?php

namespace App\Http\Livewire\Cad\Leo;

use App\Models\Cad\Call;
use Livewire\Component;

class LeoCadTable extends Component
{

    public $calls;

    // protected $listeners = ['echo:cadtableupdatechannel,CadTableUpdate' => '$refresh'];

    public function mount()
    {
        $this->calls = Call::where('status', "!=", "CLO")->get(['id', 'nature', 'location', 'city', 'priority', 'status', 'updated_at', 'units']);
    }

    public function render()
    {
        return view('livewire.cad.leo.leo-cad-table');
    }
}

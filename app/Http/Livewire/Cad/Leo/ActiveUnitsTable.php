<?php

namespace App\Http\Livewire\Cad\Leo;

use App\Models\Cad\ActiveUnit;
use Livewire\Component;

class ActiveUnitsTable extends Component
{
    public $active_units;

    public function render()
    {
        $this->active_units = ActiveUnit::all();

        return view('livewire.cad.leo.active-units-table');
    }
}

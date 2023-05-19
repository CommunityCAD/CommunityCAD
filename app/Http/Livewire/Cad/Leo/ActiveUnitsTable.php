<?php

namespace App\Http\Livewire\Cad\Leo;

use App\Models\Cad\ActiveUnit;
use App\Models\Cad\Call;
use Livewire\Component;

class ActiveUnitsTable extends Component
{
    public $calls;
    public $active_units;

    public function render()
    {
        return view('livewire.cad.leo.active-units-table');
    }
}

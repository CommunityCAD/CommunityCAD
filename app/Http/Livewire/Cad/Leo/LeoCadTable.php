<?php

namespace App\Http\Livewire\Cad\Leo;

use App\Models\Cad\Call;
use Livewire\Component;

class LeoCadTable extends Component
{
    public $calls;

    public function render()
    {
        return view('livewire.cad.leo.leo-cad-table');
    }
}

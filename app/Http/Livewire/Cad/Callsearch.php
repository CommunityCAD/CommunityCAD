<?php

namespace App\Http\Livewire\Cad;

use App\Models\Cad\Call;
use Livewire\Component;

class Callsearch extends Component
{

    public $term = "";
    public $calls;

    public function render()
    {
        if (!empty($this->term)) {
            $this->calls = Call::where('id', 'like', '%' . $this->term . '%')->get();
        } else {
            $this->calls = Call::where('id', $this->term)->get();
        }

        return view('livewire.cad.callsearch');
    }
}

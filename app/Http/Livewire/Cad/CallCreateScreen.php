<?php

namespace App\Http\Livewire\Cad;

use App\Models\Cad\CallNatures;
use App\Models\Civilian;
use Livewire\Component;

class CallCreateScreen extends Component
{
    public $civilian_search = '';

    public $civilians;

    public $linked_civilians = [];

    public $call_natures = CallNatures::NATURECODES;

    public function render()
    {
        if (! empty($this->civilian_search)) {
            $this->civilians = Civilian::where('first_name', 'like', '%'.$this->civilian_search.'%')->orWhere('last_name', 'like', '%'.$this->civilian_search.'%')->get();
        } else {
            $this->civilians = Civilian::where('id', $this->civilian_search)->get();
        }

        return view('livewire.cad.call-create-screen');
    }

    public function add_civilian_to_call($civilian_id, $civilian_name)
    {
        $this->linked_civilians[$civilian_id] = $civilian_name;
        $this->civilian_search = '';
    }

    public function remove_civilian_from_call($civilian_id)
    {
        unset($this->linked_civilians[$civilian_id]);
        $this->civilian_search = '';
    }
}

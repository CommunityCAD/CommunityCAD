<?php

namespace App\Http\Livewire\Cad\Leo;

use App\Models\Civilian;
use Livewire\Component;

class CallCivilianSearch extends Component
{
    public $civilian_search = "";
    public $civilians;
    public $civilian_name = "";
    public $civilian_id = "";

    public function fill_rp_name($civilian_id, $civilian_name)
    {
        $this->civilian_name = $civilian_name;
        $this->civilian_id = $civilian_id;
        $this->civilian_search = "";
        // $this->render();
    }

    public function render()
    {
        if (!empty($this->civilian_search)) {
            $this->civilians = Civilian::where('first_name', 'like', '%' . $this->civilian_search . '%')->orWhere('last_name', 'like', '%' . $this->civilian_search . '%')->get();
        } else {
            $this->civilians = Civilian::where('id', $this->civilian_search)->get();
        }
        return view('livewire.cad.leo.call-civilian-search');
    }
}

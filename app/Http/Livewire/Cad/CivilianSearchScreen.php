<?php

namespace App\Http\Livewire\Cad;

use App\Models\Civilian;
use Livewire\Component;

class CivilianSearchScreen extends Component
{
    public $search_name = '';

    public $search_ssn = '';

    public $civilians;

    protected $queryString = ['search_ssn' => ['except' => '', 'as' => 'ssn']];

    public function render()
    {
        if (!empty($this->search_name)) {
            $this->civilians = Civilian::where('first_name', 'like', '%' . $this->search_name . '%')
                ->orWhere('last_name', 'like', '%' . $this->search_name . '%')
                ->without(['licenses', 'medical_records', 'vehicles', 'weapons'])
                ->get();
        } elseif (!empty($this->search_ssn)) {
            $this->civilians = Civilian::where('id', 'like', '%' . $this->search_ssn . '%')->get();
        } else {
            $this->civilians = Civilian::where('id', '333')->get();
        }

        return view('livewire.cad.civilian-search-screen');
    }
}

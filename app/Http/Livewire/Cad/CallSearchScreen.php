<?php

namespace App\Http\Livewire\Cad;

use App\Models\Cad\Call;
use Livewire\Component;

class CallSearchScreen extends Component
{
    public $search = '';

    public $calls;

    public $call_return;

    public function render()
    {
        if (!empty($this->search)) {
            $this->calls = Call::where('id', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->calls = Call::where('id', $this->search)->get();
        }

        return view('livewire.cad.call-search-screen');
    }

    public function show_return(Call $call)
    {
        return $this->call_return = $call;
    }

    public function clear_return()
    {
        $this->reset();

        return $this->call_return = null;
    }
}

<?php

namespace App\Http\Livewire\Cad;

use App\Models\CallLog as ModelsCallLog;
use Livewire\Component;

class CallLog extends Component
{
    public $call_logs;

    public $call;

    public function mount()
    {
        $this->call_logs = ModelsCallLog::where('call_id', $this->call)->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.cad.call-log');
    }
}

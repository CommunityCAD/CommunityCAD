<?php

namespace App\Http\Livewire\Cad;

use App\Models\CallLog as ModelsCallLog;
use Livewire\Component;

class CallChat extends Component
{
    public $call_chat;

    public $call;

    public function mount()
    {
        $this->call_chat = ModelsCallLog::where('call_id', $this->call->id)->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.cad.call-chat');
    }
}

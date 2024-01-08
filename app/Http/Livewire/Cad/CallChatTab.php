<?php

namespace App\Http\Livewire\Cad;

use App\Models\CallLog as ModelsCallLog;
use Livewire\Component;

class CallChatTab extends Component
{
    public $call_chat;

    public $call_id;

    public function mount()
    {
        $this->call_chat = ModelsCallLog::where('call_id', $this->call_id)->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.cad.call-chat-tab');
    }
}

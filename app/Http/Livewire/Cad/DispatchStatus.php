<?php

namespace App\Http\Livewire\Cad;

use App\Models\Cad\ActiveUnit;
use Livewire\Component;

class DispatchStatus extends Component
{
    public $active_dispatch;

    public $has_active_dispatch = 'OFF';

    public function mount()
    {
        $this->active_dispatch = ActiveUnit::where('department_type', 2)->where('status', '!=', 'OFFDTY')->orderBy('created_at')->get()->first();
        if ($this->active_dispatch) {
            if ($this->active_dispatch->status == 'AVL') {
                $this->has_active_dispatch = 'AVL';
            } elseif ($this->active_dispatch->status == 'CALL') {
                $this->has_active_dispatch = 'CALL';
            } elseif ($this->active_dispatch->status == 'BRK') {
                $this->has_active_dispatch = 'BRK';
            } else {
                $this->has_active_dispatch = 'OFF';
            }
        }
    }

    public function render()
    {
        return view('livewire.cad.dispatch-status');
    }
}

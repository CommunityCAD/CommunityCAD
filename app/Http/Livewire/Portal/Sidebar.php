<?php

namespace App\Http\Livewire\Portal;

use App\Models\Department;
use Carbon\Carbon;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {

        $expire = Carbon::now()->addHours(24);
        $departments = Department::where('id', '>', 0)->get(['name', 'slug', 'id', 'logo']);

        return view('livewire.portal.sidebar', compact('departments'));
    }
}

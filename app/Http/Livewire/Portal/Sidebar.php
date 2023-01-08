<?php

namespace App\Http\Livewire\Portal;

use App\Models\Department;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        $departments = Department::all(['name', 'slug', 'id']);
        return view('livewire.portal.sidebar', compact('departments'));
    }
}

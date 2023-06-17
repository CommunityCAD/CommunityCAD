<?php

namespace App\Http\Livewire\Portal;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {

        $expire = Carbon::now()->addHours(24);

        $departments = Cache::get('departments', function () {
            return Department::where('id', '>', 0)->get();
        });

        return view('livewire.portal.sidebar', compact('departments'));
    }
}

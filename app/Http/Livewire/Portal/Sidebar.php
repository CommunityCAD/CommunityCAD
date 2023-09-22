<?php

namespace App\Http\Livewire\Portal;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {

        $expire = Carbon::now()->addHours(24);

        // $departments = Cache::get('departments', function () {
        //     return Department::where('id', '>', 0)->get();
        // });

        $departments = Cache::remember('departments', 5, function () {
            return Department::where('id', '>', 0)->get();
        });

        // logger(Cache::get('departments'));

        return view('livewire.portal.sidebar', compact('departments'));
    }
}

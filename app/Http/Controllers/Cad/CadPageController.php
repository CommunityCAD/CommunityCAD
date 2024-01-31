<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\Cad\Call;
use App\Models\UserDepartment;

class CadPageController extends Controller
{
    public function landing()
    {
        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->get();
        $available_departments = [];

        foreach ($user_departments as $department) {
            if (
                $department->department->type == 1 || $department->department->type == 2
                || $department->department->type == 4
            ) {
                $available_departments[] = $department;
            }
        }

        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();

        if ($active_unit) {
            if ($active_unit->department_type == 1) {
                return redirect()->route('cad.home');
            } elseif ($active_unit->department_type == 2) {
                return redirect()->route('cad.home');
            } else {
                return abort(404, 'Department type is not set correctly.');
            }
        }

        return view('cad.landing', compact('available_departments'));
    }

    // public function home()
    // {

    //     $call_count = Call::where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->count();
    //     $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();

    //     if (!$active_unit) {
    //         return redirect()->route('cad.landing');
    //     }

    //     return view('cad.home', compact('call_count', 'active_unit'));
    // }

    // public function cad()
    // {
    //     $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();

    //     if (!$active_unit) {
    //         return redirect()->route('cad.landing');
    //     }

    //     return view('cad.cad', compact('active_unit'));
    // }

    // public function name()
    // {
    //     $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->count();

    //     if ($active_unit == 0) {
    //         return redirect()->route('cad.landing');
    //     }

    //     return view('cad.name');
    // }

    // public function vehicle()
    // {
    //     $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->count();

    //     if ($active_unit == 0) {
    //         return redirect()->route('cad.landing');
    //     }

    //     return view('cad.vehicle');
    // }

    // public function panic()
    // {
    //     auth()->user()->active_unit->update(['is_panic' => true, 'status' => 'PANIC']);

    //     return redirect()->route('cad.cad');
    // }

    // public function stop_panic()
    // {
    //     auth()->user()->active_unit->update(['is_panic' => false, 'status' => 'AVL']);

    //     return redirect()->route('cad.cad');
    // }

    // public function clear_panic()
    // {
    //     $active_panic_units = ActiveUnit::where('is_panic', '1')->get();

    //     foreach ($active_panic_units as $active_unit) {
    //         $active_unit->update(['is_panic' => false, 'status' => 'AVL']);
    //     }

    //     return redirect()->route('cad.cad');
    // }
}

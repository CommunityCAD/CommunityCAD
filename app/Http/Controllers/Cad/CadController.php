<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Bolo;
use App\Models\Cad\ActiveUnit;
use App\Models\Call;
use App\Models\Civilian\Vehicle;
use App\Models\UserDepartment;

class CadController extends Controller
{
    public function landing()
    {
        if (isset(auth()->user()->active_unit)) {
            return redirect()->route('cad.home');
        }

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

        return view('cad.landing', compact('available_departments'));
    }

    public function home()
    {
        if (!isset(auth()->user()->active_unit)) {
            return redirect(route('cad.landing'));
        }

        $call_count = Call::where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->count();

        return view('cad.home', compact('call_count'));
    }

    public function message_center()
    {
        $stolen_vehicles = Vehicle::where('vehicle_status', 2)->get();
        $bolos = Bolo::all();
        return view('cad.message_center', compact('stolen_vehicles', 'bolos'));
    }

    public function panic()
    {
        auth()->user()->active_unit->update(['is_panic' => true, 'status' => 'PANIC']);

        return redirect()->route('cad.mdt');
    }

    public function stop_panic()
    {
        auth()->user()->active_unit->update(['is_panic' => false, 'status' => 'AVL']);

        return redirect()->route('cad.mdt');
    }

    public function clear_panic()
    {
        $active_panic_units = ActiveUnit::where('is_panic', '1')->get();

        foreach ($active_panic_units as $active_unit) {
            $active_unit->update(['is_panic' => false, 'status' => 'AVL']);
        }

        return redirect()->route('cad.mdt');
    }
}

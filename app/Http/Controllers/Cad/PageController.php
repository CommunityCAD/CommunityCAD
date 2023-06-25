<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use App\Models\Cad\Call;
use App\Models\UserDepartment;

class PageController extends Controller
{
    public function landing()
    {
        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->get();

        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get();

        if ($active_unit->count() > 0) {
            return redirect()->route('cad.home');
        }

        return view('cad.landing', compact('user_departments'));
    }

    public function home()
    {
        // will have bolos and other important info
        $call_count = Call::where('status', '!=', 'CLO')->count();
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();

        if (!$active_unit) {
            return redirect()->route('cad.landing');
        }

        return view('cad.home', compact('call_count', 'active_unit'));
    }

    public function cad()
    {
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->count();

        if ($active_unit == 0) {
            return redirect()->route('cad.landing');
        }

        return view('cad.cad');
    }

    public function incident()
    {
        return view('cad.incident');
    }

    public function name()
    {
        return view('cad.name');
    }

    public function vehicle()
    {
        return view('cad.vehicle');
    }
}

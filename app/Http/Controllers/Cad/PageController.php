<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\UserDepartment;
use App\Models\Cad\ActiveUnit;
use App\Models\Cad\Call;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing()
    {
        // will control if officer is on duty. if not ask department/sub division etc. If so redirect to home
        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->get();

        return view('cad.landing', compact('user_departments'));
    }

    public function home()
    {
        // will have bolos and other important info
        $call_count = Call::where('status', "!=", "CLO")->count();
        $active_unit = ActiveUnit::where('user_id', auth()->user()->id)->get()->first();

        return view('cad.home', compact('call_count', 'active_unit'));
    }

    public function cad()
    {
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

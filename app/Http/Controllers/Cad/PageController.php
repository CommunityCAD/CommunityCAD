<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\Call;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing()
    {
        // will control if officer is on duty. if not ask department/sub division etc. If so redirect to home

        return view('cad.landing');
    }

    public function home()
    {
        // will have bolos and other important info
        $call_count = Call::where('status', "!=", "CLO")->count();
        return view('cad.home', compact('call_count'));
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

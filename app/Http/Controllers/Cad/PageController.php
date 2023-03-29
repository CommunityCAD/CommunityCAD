<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
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
        return view('cad.home');
    }

    public function cad()
    {
        return view('cad.cad');
    }
}

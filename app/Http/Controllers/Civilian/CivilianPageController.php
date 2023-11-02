<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;

class CivilianPageController extends Controller
{
    public function home()
    {
        return view('civilian.home');
    }
}

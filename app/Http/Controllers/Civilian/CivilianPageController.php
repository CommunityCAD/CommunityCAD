<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CivilianPageController extends Controller
{
    public function home()
    {
        return view('civilian.home');
    }
}

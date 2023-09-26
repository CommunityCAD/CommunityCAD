<?php

namespace App\Http\Controllers\Courthouse;

use App\Http\Controllers\Controller;

class CourthousePageController extends Controller
{
    public function home()
    {
        return view('courthouse.home');
    }
}

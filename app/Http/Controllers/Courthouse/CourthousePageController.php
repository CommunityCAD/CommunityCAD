<?php

namespace App\Http\Controllers\Courthouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourthousePageController extends Controller
{
    public function home()
    {
        return view('courthouse.home');
    }
}

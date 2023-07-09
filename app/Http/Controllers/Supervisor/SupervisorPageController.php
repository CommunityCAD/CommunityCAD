<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;

class SupervisorPageController extends Controller
{
    public function index()
    {
        return view('supervisor.index');
    }
}

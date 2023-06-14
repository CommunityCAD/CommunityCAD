<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

class StaffPageController extends Controller
{
    public function index()
    {
        return view('staff.index');
    }
}

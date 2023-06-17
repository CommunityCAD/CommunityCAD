<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\User;

class StaffPageController extends Controller
{
    public function index()
    {
        return view('staff.index');
    }

    public function user_search()
    {
        $users = User::where('account_status', 3)->get();

        return view('staff.user_department.search', compact('users'));
    }
}

<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Department;

class AnnouncementController extends Controller
{
    public function create()
    {
        $departments = Department::all(['id', 'name']);

        return view('admin.announcement.create', compact('departments'));
    }
}

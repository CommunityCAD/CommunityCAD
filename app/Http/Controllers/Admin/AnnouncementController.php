<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function create()
    {
        $departments = Department::all(['id', 'name']);
        return view('admin.announcement.create', compact('departments'));
    }
}

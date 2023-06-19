<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\UserDepartment;
use Illuminate\Contracts\View\View;

class DepartmentController extends Controller
{
    public function show(Department $department): View
    {
        $department->load('announcements');

        return view('portal.department.show', compact('department'));
    }

    public function roster_index(Department $department)
    {
        $roster = UserDepartment::where('department_id', $department->id)->orderBy('badge_number', 'asc')->get();

        return view('portal.department.roster.index', compact('department', 'roster'));
    }
}

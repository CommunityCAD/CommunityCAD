<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Contracts\View\View;

class DepartmentController extends Controller
{
    public function show(Department $department): View
    {
        $department->load('announcements');

        return view('portal.department.show', compact('department'));
    }
}

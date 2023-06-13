<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Contracts\View\View;

class DepartmentController extends Controller
{
    // public function create(): View
    // {
    //     // echo strtolower(str_replace(["'", "&"], "", str_replace(" ", "-", "San Andreas Fire & Rescue")));
    //     return view('departments.create');
    // } str_slug()

    public function show(Department $department): View
    {
        return view('portal.department.show', compact('department'));
    }
}

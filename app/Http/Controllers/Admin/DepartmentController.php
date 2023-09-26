<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DepartmentRequest;
use App\Models\Department;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    public function index(): View
    {
        $departments = Cache::remember('departments', 5, function () {
            return Department::where('id', '>', 0)->get();
        });

        return view('admin.departments.index', compact('departments'));
    }

    public function create(): View
    {
        return view('admin.departments.create');
    }

    public function store(DepartmentRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['name']);

        if (Department::where('slug', $input['slug'])->count() != 0) {
            return redirect()->route('admin.department.create')->with('alerts', [['message' => 'Department name is already taken.', 'level' => 'error']]);
        }

        Department::create($input);

        // $this->refreshcache();

        return redirect()->route('admin.department.index')->with('alerts', [['message' => 'Department created.', 'level' => 'success']]);
    }

    public function edit(Department $department): View
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(DepartmentRequest $request, Department $department): RedirectResponse
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['name']);

        if (Department::where('slug', $input['slug'])->count() != 0) {
            if (Department::where('slug', $input['slug'])->get(['id'])->first()->id != $department->id) {
                return redirect()->route('admin.department.edit', $department->slug)->with('alerts', [['message' => 'Department name is already taken.', 'level' => 'error']]);
            }
        }

        if (! isset($input['is_open_external'])) {
            $input['is_open_external'] = 0;
        }
        if (! isset($input['is_open_internal'])) {
            $input['is_open_internal'] = 0;
        }
        $department->update($input);

        // $this->refreshcache();

        return redirect()->route('admin.department.index')->with('alerts', [['message' => 'Department updated.', 'level' => 'success']]);
    }

    public function destroy(Department $department): RedirectResponse
    {
        $department->delete();

        return redirect()->route('admin.department.index')->with('alerts', [['message' => 'Department deleted.', 'level' => 'success']]);
    }

    protected function refreshcache()
    {
        $departments = Department::where('id', '>', 0)->where('deleted_at', '!=', 'null')->get();

        Cache::forget('departments');
        Cache::forever('departments', $departments);

        return true;
    }
}

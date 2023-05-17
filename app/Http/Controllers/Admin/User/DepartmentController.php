<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserDepartmentStoreRequest;
use App\Http\Requests\Admin\User\UserDepartmentUpdateRequest;
use App\Models\Admin\User\UserDepartment;
use App\Models\Department;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends Controller
{
    public function index(User $user)
    {
        abort_if(Gate::denies('user_departments_access'), 403);
        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->with('department')->get();

        return view('admin.users.departments.index', compact('user', 'user_departments'));
    }

    public function create(User $user)
    {
        abort_if(Gate::denies('user_departments_access'), 403);

        $departments = Department::all(['name', 'id']);
        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->with('department')->get();

        $member_departments = [];
        $all_departments = [];

        foreach ($user_departments as $department) {
            $member_departments[] = $department->department_id;
        }

        foreach ($departments as $department) {
            $all_departments[$department->id] = $department->name;
        }

        foreach ($all_departments as $id => $name) {
            if (in_array($id, $member_departments)) {
                unset($all_departments[$id]);
            }
        }

        return view('admin.users.departments.create', compact('user', 'all_departments'));
    }

    public function store(UserDepartmentStoreRequest $request, User $user)
    {
        abort_if(Gate::denies('user_departments_access'), 403);

        $input = $request->validated();
        $input['user_id'] = $user->id;
        UserDepartment::create($input);

        History::create([
            'subject_type' => 'user',
            'subject_id' => $user->id,
            'user_id' => auth()->user()->id,
            'description' => 'Department added.',
        ]);

        return redirect()->route('admin.users.departments.index', $user->id)->with('alerts', [['message' => 'Department added.', 'level' => 'success']]);
    }

    public function edit(User $user, UserDepartment $department)
    {
        abort_if(Gate::denies('user_departments_access'), 403);

        return view('admin.users.departments.edit', compact('user', 'department'));
    }

    public function update(UserDepartmentUpdateRequest $request, User $user, UserDepartment $department)
    {
        abort_if(Gate::denies('user_departments_access'), 403);

        $input = $request->validated();
        $department->update($input);

        History::create([
            'subject_type' => 'user',
            'subject_id' => $user->id,
            'user_id' => auth()->user()->id,
            'description' => 'Department Updated.',
        ]);

        return redirect()->route('admin.users.departments.index', $user->id)->with('alerts', [['message' => 'Department updated.', 'level' => 'success']]);
    }

    public function destroy(User $user, UserDepartment $department)
    {
        abort_if(Gate::denies('user_departments_access'), 403);

        $department->delete();
        return redirect()->route('admin.users.departments.index', $user->id)->with('alerts', [['message' => 'Department deleted.', 'level' => 'success']]);
    }
}

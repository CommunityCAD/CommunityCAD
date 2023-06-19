<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserDepartmentStoreRequest;
use App\Http\Requests\Admin\User\UserDepartmentUpdateRequest;
use App\Models\Department;
use App\Models\History;
use App\Models\User;
use App\Models\UserDepartment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserDepartmentController extends Controller
{
    public function index(User $user): View
    {
        $user_departments = UserDepartment::where('user_id', $user->id)->with('department')->get();

        return view('staff.user_department.index', compact('user', 'user_departments'));
    }

    public function create(User $user): View
    {
        $departments = Department::where('id', '>', 0)->get(['name', 'id']);
        $user_departments = UserDepartment::where('user_id', $user->id)->with('department')->get();

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

        return view('staff.user_department.create', compact('user', 'all_departments'));
    }

    public function store(UserDepartmentStoreRequest $request, User $user): RedirectResponse
    {
        $input = $request->validated();
        $input['user_id'] = $user->id;
        UserDepartment::create($input);

        History::create([
            'subject_type' => 'user',
            'subject_id' => $user->id,
            'user_id' => auth()->user()->id,
            'description' => 'Department added.',
        ]);

        return redirect()->route('staff.user_department.index', $user->id)->with('alerts', [['message' => 'Department added.', 'level' => 'success']]);
    }

    public function edit(User $user, UserDepartment $user_department): View
    {
        return view('staff.user_department.edit', compact('user_department', 'user'));
    }

    public function update(UserDepartmentUpdateRequest $request, User $user, UserDepartment $user_department): RedirectResponse
    {
        $user_department->update($request->validated());

        return redirect()->route('staff.user_department.index', $user->id)->with('alerts', [['message' => 'Department updated.', 'level' => 'success']]);
    }

    public function destroy(User $user, UserDepartment $user_department): RedirectResponse
    {
        $user_department->delete();

        return redirect()->route('staff.user_department.index', $user->id)->with('alerts', [['message' => 'Department deleted.', 'level' => 'success']]);
    }
}

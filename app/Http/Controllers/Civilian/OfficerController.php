<?php

namespace App\Http\Controllers\Civilian;

use App\Models\Officer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\OfficerStoreRequest;
use App\Http\Requests\Civilian\OfficerUpdateRequest;
use App\Models\UserDepartment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class OfficerController extends Controller
{

    public function index(): View
    {
        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->with('department')->get();
        $officer_civilians = Officer::where('user_id', auth()->user()->id)->get();

        $member_departments = [];
        $available_user_departments = [];

        foreach ($officer_civilians as $civilian) {
            $member_departments[$civilian->id] = $civilian->user_department_id;
        }

        foreach ($user_departments as $department) {
            if ($department->department->type == 1 or $department->department->type == 4) {
                $available_user_departments[$department->id] = $department;
            }
        }

        foreach ($available_user_departments as $id => $user_department) {
            if (in_array($user_department->id, $member_departments)) {
                unset($available_user_departments[$user_department->id]);
            }
        }

        $officers = Officer::where('user_id', auth()->user()->id)->get();
        return view('civilian.officer.index', compact('officers', 'available_user_departments'));
    }

    public function create()
    {
        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->with('department')->get();
        $officer_civilians = Officer::where('user_id', auth()->user()->id)->get();

        $member_departments = [];
        $available_user_departments = [];

        foreach ($officer_civilians as $civilian) {
            $member_departments[$civilian->id] = $civilian->user_department_id;
        }

        foreach ($user_departments as $department) {
            if ($department->department->type == 1 or $department->department->type == 4) {
                $available_user_departments[$department->id] = $department;
            }
        }

        foreach ($available_user_departments as $id => $user_department) {
            if (in_array($user_department->id, $member_departments)) {
                unset($available_user_departments[$user_department->id]);
            }
        }

        if (empty($available_user_departments)) {
            return redirect()->route('civilian.officers.index')->with('alerts', [['message' => 'You have reached your max officers.', 'level' => 'error']]);
        }

        return view('civilian.officer.create', compact('available_user_departments'));
    }

    public function store(OfficerStoreRequest $request): RedirectResponse
    {

        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->with('department')->get();
        $officer_civilians = Officer::where('user_id', auth()->user()->id)->get();

        $member_departments = [];
        $available_user_departments = [];

        foreach ($officer_civilians as $civilian) {
            $member_departments[$civilian->id] = $civilian->user_department_id;
        }

        foreach ($user_departments as $department) {
            if ($department->department->type == 1 or $department->department->type == 4) {
                $available_user_departments[$department->id] = $department;
            }
        }

        foreach ($available_user_departments as $id => $user_department) {
            if (in_array($user_department->id, $member_departments)) {
                unset($available_user_departments[$user_department->id]);
            }
        }

        if (empty($available_user_departments)) {
            return redirect()->route('civilian.officers.index')->with('alerts', [['message' => 'You have reached your max officers.', 'level' => 'error']]);
        }

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['id'] = rand(100000000, 999999999);

        Officer::create($data);

        return redirect()->route('civilian.officers.index')->with('alerts', [['message' => 'Officer Created', 'level' => 'success']]);
    }

    public function show(Officer $officer): View
    {
        abort_if(auth()->user()->id != $officer->user_id, 403);

        return view('civilian.officer.show', compact('officer'));
    }

    public function edit(Officer $officer): View
    {
        abort_if(auth()->user()->id != $officer->user_id, 403);


        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->with('department')->get();
        $officer_civilians = Officer::where('user_id', auth()->user()->id)->get();

        $member_departments = [];
        $available_user_departments = [];

        foreach ($officer_civilians as $officer_civilian) {
            $member_departments[$officer_civilian->id] = $officer_civilian->user_department_id;
        }

        foreach ($user_departments as $department) {
            if ($department->department->type == 1 or $department->department->type == 4) {
                $available_user_departments[$department->id] = $department;
            }
        }

        foreach ($available_user_departments as $id => $user_department) {
            if (in_array($user_department->id, $member_departments)) {
                unset($available_user_departments[$user_department->id]);
            }
        }

        return view('civilian.officer.edit', compact('officer', 'available_user_departments'));
    }

    public function update(OfficerUpdateRequest $request, Officer $officer): RedirectResponse
    {

        abort_if(auth()->user()->id != $officer->user_id, 403);

        $data = $request->validated();

        $officer->update($data);
        return redirect()->route('civilian.officers.show', $officer->id)->with('alerts', [['message' => 'Officer Updated.', 'level' => 'success']]);
    }

    public function destroy(Officer $officer): RedirectResponse
    {
        $officer->delete();
        return redirect()->route('civilian.officers.index')->with('alerts', [['message' => 'Officer Deleted.', 'level' => 'success']]);
    }
}

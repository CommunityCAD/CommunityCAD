<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\CivilianStoreRequest;
use App\Http\Requests\Civilian\CivilianUpdateRequest;
use App\Models\Civilian;
use App\Models\CivilianLevel;
use App\Models\UserDepartment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CivilianController extends Controller
{
    public function index(): View
    {
        $civilians = Civilian::where('user_id', auth()->user()->id)->get();
        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        return view('civilian.civilians.index', compact('civilians', 'current_civilian_level'));
    }

    public function create()
    {
        $civilians = Civilian::where('user_id', auth()->user()->id);
        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        if ($current_civilian_level->civilian_limit <= $civilians->count()) {
            return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'You have reached your max civilians.', 'level' => 'error']]);
        }

        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->with('department')->get();
        $officer_civilians = $civilians->where('is_officer', 1)->get();

        $member_departments = [];
        $available_user_departments = [];

        foreach ($officer_civilians as $civilian) {
            $member_departments[$civilian->id] = $civilian->user_department_id;
        }

        // dd($member_departments);

        foreach ($user_departments as $department) {
            if ($department->department->type == 1 or $department->department->type == 4) {
                $available_user_departments[$department->id] = $department;
            }
        }

        // dd($available_user_departments);

        foreach ($available_user_departments as $id => $user_department) {
            if (in_array($user_department->id, $member_departments)) {
                unset($available_user_departments[$user_department->id]);
            }
        }

        // dd($available_user_departments);

        return view('civilian.civilians.create', compact('available_user_departments'));
    }

    public function store(CivilianStoreRequest $request): RedirectResponse
    {
        $civilians = Civilian::where('user_id', auth()->user()->id)->get();
        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        if ($current_civilian_level->civilian_limit <= $civilians->count()) {
            return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'You have reached your max civilians.', 'level' => 'error']]);
        }

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['id'] = rand(100000000, 999999999);

        if ($data['user_department_id'] != null) {
            $data['is_officer'] = 1;
        }

        if (!get_setting('allow_same_name_civilians')) {
            if ($this->name_check($data['first_name'], $data['last_name'])) {
                return redirect()->route('civilian.civilians.create')
                    ->with('alerts', [['message' => 'That name is already in use. Choose a diffrent name.', 'level' => 'error']])
                    ->withInput($request->input());
            }
        }
        Civilian::create($data);

        return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'Civilian Created', 'level' => 'success']]);
    }

    public function show(Civilian $civilian): View
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        return view('civilian.civilians.show', compact('civilian', 'current_civilian_level'));
    }

    public function edit(Civilian $civilian): View
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $civilians = Civilian::where('user_id', auth()->user()->id);
        $current_civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level_id)->get()->first();

        if ($current_civilian_level->civilian_limit <= $civilians->count()) {
            return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'You have reached your max civilians.', 'level' => 'error']]);
        }

        $user_departments = UserDepartment::where('user_id', auth()->user()->id)->with('department')->get();
        $officer_civilians = $civilians->where('is_officer', 1)->get();

        $member_departments = [];
        $available_user_departments = [];

        foreach ($officer_civilians as $civilian) {
            $member_departments[$civilian->id] = $civilian->user_department_id;
        }

        // dd($member_departments);

        foreach ($user_departments as $department) {
            if ($department->department->type == 1 or $department->department->type == 4) {
                $available_user_departments[$department->id] = $department;
            }
        }

        // dd($available_user_departments);

        foreach ($available_user_departments as $id => $user_department) {
            if (in_array($user_department->id, $member_departments)) {
                unset($available_user_departments[$user_department->id]);
            }
        }

        // dd($available_user_departments);

        return view('civilian.civilians.edit', compact('civilian', 'available_user_departments'));
    }

    public function update(CivilianUpdateRequest $request, Civilian $civilian): RedirectResponse
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        $data = $request->validated();

        if ($data['is_officer'] == 0) {
            $data['user_department_id'] = null;
            $data['occupation'] = 'Unemployed';
        }

        $civilian->update($data);

        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => 'Civilian Updated.', 'level' => 'success']]);
    }

    public function destroy(Civilian $civilian): RedirectResponse
    {
        abort_if(auth()->user()->id != $civilian->user_id, 403);

        foreach ($civilian->vehicles as $vehicle) {
            $vehicle->delete();
        }

        foreach ($civilian->licenses as $license) {
            $license->delete();
        }

        foreach ($civilian->medical_records as $record) {
            $record->delete();
        }

        foreach ($civilian->weapons as $weapon) {
            $weapon->delete();
        }

        $civilian->delete();

        return redirect()->route('civilian.civilians.index')->with('alerts', [['message' => 'Civilian Deceased', 'level' => 'success']]);
    }

    public function leave_department(Civilian $civilian)
    {
    }

    private function name_check($first_name, $last_name)
    {
        $results = DB::table('civilians')->where('first_name', $first_name)->where('last_name', $last_name)->count();

        if ($results == 0) {
            return false;
        }

        return true;
    }
}

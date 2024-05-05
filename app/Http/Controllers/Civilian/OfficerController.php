<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\OfficerStoreRequest;
use App\Http\Requests\Civilian\OfficerUpdateRequest;
use App\Models\Department;
use App\Models\Officer;
use App\Models\UserDepartment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            if (true) {
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
            if (true) {
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
            if (true) {
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

    public function update_department_information(Request $request, Officer $officer)
    {
        abort_if(auth()->user()->id != $officer->user_id, 403);

        if (get_setting('allow_members_to_update_rank')) {
            $rules['rank'] = 'required';
        }

        if (get_setting('allow_members_to_update_number')) {
            $rules['badge_number'] = 'required';
        }

        if (empty($rules)) {
            return redirect()->route('civilian.officers.show', $officer->id)->with('alerts', [['message' => 'Option disabled in settings.', 'level' => 'success']]);
        }

        $validated = $request->validate($rules);

        $officer->user_department->update($validated);

        return redirect()->route('civilian.officers.show', $officer->id)->with('alerts', [['message' => 'Officer Updated.', 'level' => 'success']]);
    }

    public function sync_discord_roles()
    {
        if (get_setting('use_discord_department_roles')) {
            $response = Http::accept('application/json')
                ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                ->get('https://discord.com/api/guilds/' . get_setting('discord_guild_id') . '/members/' . auth()->user()->id);

            $user_roles = json_decode($response->body())->roles;

            $department_role_ids = Department::get(['id', 'discord_role_id'])->pluck('discord_role_id', 'id')->toArray();

            foreach ($department_role_ids as $department_id => $discord_role_id) {
                if (!is_null($discord_role_id) && in_array($discord_role_id, array_values($user_roles))) {
                    $user_department = UserDepartment::where('user_id', auth()->user()->id)
                        ->where('department_id', $department_id)->get()->first();

                    if (!$user_department) {
                        $new_user_department = UserDepartment::create([
                            'user_id' => auth()->user()->id,
                            'department_id' => $department_id,
                            'rank' => 'NEEDS SET',
                            'badge_number' => 'NEEDS SET',
                        ]);
                    }
                } else {
                    $user_department = UserDepartment::where('user_id', auth()->user()->id)
                        ->where('department_id', $department_id)->get()->first();

                    if ($user_department) {
                        $officer = Officer::where('user_department_id', $user_department->id)->get()->first();
                        if ($officer) {
                            $officer->delete();
                        }
                        $user_department->delete();
                    }
                }
            }
            return redirect()->route('civilian.officers.index')->with('alerts', [['message' => 'Discord Roles Synced.', 'level' => 'success']]);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DepartmentRequest;
use App\Models\Department;
use App\Models\Officer;
use App\Models\UserDepartment;
use App\Notifications\DiscordNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
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
        $discord_roles = [];

        if (get_setting('use_discord_department_roles')) {
            $response =
                Http::accept('application/json')
                ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                ->get('https://discord.com/api/guilds/' . get_setting('discord_guild_id') . '/roles');

            $discord_roles = json_decode($response->body());
        }

        return view('admin.departments.create', compact('discord_roles'));
    }

    public function store(DepartmentRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['name']);

        if (Department::where('slug', $input['slug'])->count() != 0) {
            return redirect()->route('admin.department.create')->with('alerts', [['message' => 'Department name is already taken.', 'level' => 'error']]);
        }

        if (!isset($input['is_open_external'])) {
            $input['is_open_external'] = 0;
        }
        if (!isset($input['is_open_internal'])) {
            $input['is_open_internal'] = 0;
        }

        $department = Department::create($input);

        DiscordNotification::send(
            'audit_log',
            'Department has been created.',
            '',
            15548997,
            [
                [
                    'name' => 'Name',
                    'value' => $department->name,
                ],
                [
                    'name' => 'Created by',
                    'value' => auth()->user()->id . ' (' . auth()->user()->preferred_name . ')',
                ],
                [
                    'name' => 'Created at',
                    'value' => $department->created_at->format('m/d/Y H:i:s'),
                ],
            ]
        );

        return redirect()->route('admin.department.index')->with('alerts', [['message' => 'Department created.', 'level' => 'success']]);
    }

    public function edit(Department $department): View
    {
        $discord_roles = [];
        if (get_setting('use_discord_department_roles')) {
            $response =
                Http::accept('application/json')
                ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                ->get('https://discord.com/api/guilds/' . get_setting('discord_guild_id') . '/roles');

            $discord_roles = json_decode($response->body());
        }

        return view('admin.departments.edit', compact('department', 'discord_roles'));
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

        if (!isset($input['is_open_external'])) {
            $input['is_open_external'] = 0;
        }
        if (!isset($input['is_open_internal'])) {
            $input['is_open_internal'] = 0;
        }
        $department->update($input);
        $department->touch('updated_at');

        DiscordNotification::send(
            'audit_log',
            'Department has been Updated.',
            '',
            15548997,
            [
                [
                    'name' => 'Name',
                    'value' => $department->name,
                ],
                [
                    'name' => 'Updated by',
                    'value' => auth()->user()->id . ' (' . auth()->user()->preferred_name . ')',
                ],
                [
                    'name' => 'Updated at',
                    'value' => $department->updated_at->format('m/d/Y H:i:s'),
                ],
            ]
        );

        return redirect()->route('admin.department.index')->with('alerts', [['message' => 'Department updated.', 'level' => 'success']]);
    }

    public function destroy(Department $department): RedirectResponse
    {

        $department_members = UserDepartment::where('department_id', $department->id)->get();

        foreach ($department_members as $member) {
            Officer::where('user_department_id', $member->id)->get()->first()->delete();
            $member->delete();
        }

        $department->touch('updated_at');

        DiscordNotification::send(
            'audit_log',
            'Department has been deleted.',
            '',
            15548997,
            [
                [
                    'name' => 'Name',
                    'value' => $department->name,
                ],
                [
                    'name' => 'deleted by',
                    'value' => auth()->user()->id . ' (' . auth()->user()->preferred_name . ')',
                ],
                [
                    'name' => 'Updated at',
                    'value' => $department->updated_at->format('m/d/Y H:i:s'),
                ],
            ]
        );

        $department->delete();

        return redirect()->route('admin.department.index')->with('alerts', [['message' => 'Department deleted.', 'level' => 'success']]);
    }
}

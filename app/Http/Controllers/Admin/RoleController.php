<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Notifications\DiscordNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get(['id', 'title']);

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('category', 'asc')->orderBy('title', 'asc')->get(['title', 'id', 'category', 'description']);
        $admin_permissions = $permissions->where('category', 'admin');
        $staff_permissions = $permissions->where('category', 'staff');
        $supervisor_permissions = $permissions->where('category', 'supervisor');
        $courthouse_permissions = $permissions->where('category', 'courthouse');

        $discord_roles = [];

        if (get_setting('use_discord_roles')) {
            $response =
                Http::accept('application/json')
                    ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                    ->get('https://discord.com/api/guilds/'.get_setting('discord_guild_id').'/roles');

            $discord_roles = json_decode($response->body());
        }

        return view('admin.roles.create', compact('admin_permissions', 'staff_permissions', 'supervisor_permissions', 'courthouse_permissions', 'discord_roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'permissions' => 'required|array',
            'discord_role_id' => 'numeric|nullable',
        ]);

        if (! isset($validated['discord_role_id'])) {
            $validated['discord_role_id'] = null;
        }

        $role = Role::create(['title' => $validated['title'], 'discord_role_id' => $validated['discord_role_id']]);
        $role->permissions()->sync($validated['permissions']);

        DiscordNotification::send(
            'audit_log',
            'New role has been created.',
            '',
            15548997,
            [
                [
                    'name' => 'Role Name',
                    'value' => $role->title,
                ],
                [
                    'name' => 'Discord Role ID',
                    'value' => $role->discord_role_id,
                ],
                [
                    'name' => 'Created by',
                    'value' => auth()->user()->id.' ('.auth()->user()->preferred_name.')',
                ],
                [
                    'name' => 'Created at',
                    'value' => $role->created_at->format('m/d/Y H:i:s'),
                ],
            ]
        );

        return redirect()->route('admin.roles.index')->with('alerts', [['message' => 'Role Created.', 'level' => 'success']]);
    }

    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('category', 'asc')->orderBy('title', 'asc')->get(['title', 'id', 'category', 'description']);

        $admin_permissions = $permissions->where('category', 'admin');
        $staff_permissions = $permissions->where('category', 'staff');
        $supervisor_permissions = $permissions->where('category', 'supervisor');
        $courthouse_permissions = $permissions->where('category', 'courthouse');

        $discord_roles = [];

        if (get_setting('use_discord_roles')) {
            $response =
                Http::accept('application/json')
                    ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                    ->get('https://discord.com/api/guilds/'.get_setting('discord_guild_id').'/roles');

            $discord_roles = json_decode($response->body());
        }

        return view('admin.roles.edit', compact('role', 'admin_permissions', 'staff_permissions', 'supervisor_permissions', 'courthouse_permissions', 'discord_roles'));
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'permissions' => 'required|array',
            'discord_role_id' => 'numeric|nullable',
        ]);

        $role->update(['title' => $validated['title'], 'discord_role_id' => $validated['discord_role_id']]);
        $role->touch('updated_at');
        $role->permissions()->sync($validated['permissions']);

        DiscordNotification::send(
            'audit_log',
            'Role '.$role->title.' has been updated.',
            '',
            15548997,
            [
                [
                    'name' => 'Role Name',
                    'value' => $role->title,
                ],
                [
                    'name' => 'Discord Role ID',
                    'value' => $role->discord_role_id,
                ],
                [
                    'name' => 'Updated by',
                    'value' => auth()->user()->id.' ('.auth()->user()->preferred_name.')',
                ],
                [
                    'name' => 'Updated at',
                    'value' => $role->updated_at->format('m/d/Y H:i:s'),
                ],
            ]
        );

        return redirect()->route('admin.roles.index')->with('alerts', [['message' => 'Role Updated.', 'level' => 'success']]);
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->touch('updated_at');
        $role->delete();

        DiscordNotification::send(
            'audit_log',
            'Role '.$role->title.' has been deleted.',
            '',
            15548997,
            [
                [
                    'name' => 'Role Name',
                    'value' => $role->title,
                ],
                [
                    'name' => 'Discord Role ID',
                    'value' => $role->discord_role_id,
                ],
                [
                    'name' => 'Deleted by',
                    'value' => auth()->user()->id.' ('.auth()->user()->preferred_name.')',
                ],
                [
                    'name' => 'deleted at',
                    'value' => $role->updated_at->format('m/d/Y H:i:s'),
                ],
            ]
        );

        return redirect()->route('admin.roles.index')->with('alerts', [['message' => 'Role Deleted.', 'level' => 'success']]);
    }
}

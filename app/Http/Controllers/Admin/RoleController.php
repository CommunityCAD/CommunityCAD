<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
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

        $discord_roles = '';

        if (get_setting('use_discord_roles')) {
            $response =
                Http::accept('application/json')
                ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                ->get('https://discord.com/api/guilds/' . get_setting('discord_guild_id') . '/roles');

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

        $role = Role::create(['title' => $validated['title'], 'discord_role_id' => $validated['discord_role_id']]);
        $role->permissions()->sync($validated['permissions']);

        return redirect()->route('admin.roles.index')->with('alerts', [['message' => 'Role Created.', 'level' => 'success']]);
    }

    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('category', 'asc')->orderBy('title', 'asc')->get(['title', 'id', 'category', 'description']);

        $admin_permissions = $permissions->where('category', 'admin');
        $staff_permissions = $permissions->where('category', 'staff');
        $supervisor_permissions = $permissions->where('category', 'supervisor');
        $courthouse_permissions = $permissions->where('category', 'courthouse');

        $discord_roles = '';

        if (get_setting('use_discord_roles')) {
            $response =
                Http::accept('application/json')
                ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                ->get('https://discord.com/api/guilds/' . get_setting('discord_guild_id') . '/roles');

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
        $role->permissions()->sync($validated['permissions']);

        return redirect()->route('admin.roles.index')->with('alerts', [['message' => 'Role Updated.', 'level' => 'success']]);
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('alerts', [['message' => 'Role Deleted.', 'level' => 'success']]);
    }
}

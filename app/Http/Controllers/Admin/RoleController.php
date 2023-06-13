<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

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

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'permissions' => 'required|array',
        ]);

        $role = Role::create(['title' => $validated['title']]);
        $role->permissions()->sync($validated['permissions']);

        return redirect()->route('admin.roles.index')->with('alerts', [['message' => 'Role Created.', 'level' => 'success']]);
    }

    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('category', 'asc')->orderBy('title', 'asc')->get(['title', 'id', 'category', 'description']);

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'permissions' => 'required|array',
        ]);

        $role->update(['title' => $validated['title']]);
        $role->permissions()->sync($validated['permissions']);

        return redirect()->route('admin.roles.index')->with('alerts', [['message' => 'Role Updated.', 'level' => 'success']]);
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('alerts', [['message' => 'Role Deleted.', 'level' => 'success']]);
    }
}

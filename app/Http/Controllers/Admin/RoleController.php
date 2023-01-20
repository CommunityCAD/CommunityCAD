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
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::with('permissions')->get(['id', 'title']);

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::orderBy('title', 'asc')->get(['title', 'id']);
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request): RedirectResponse
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::orderBy('title', 'asc')->get(['title', 'id']);

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();
        return redirect()->route('admin.roles.index')->with('alerts', [['message' => 'Role Deleted.', 'level' => 'success']]);
    }
}

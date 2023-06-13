<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    // public function index()
    // {
    //     // abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    //     $permissions = Permission::all('id', 'title');
    //     return view('admin.permissions.index', compact('permissions'));
    // }

    // public function create()
    // {
    //     // abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('admin.permissions.create');
    // }

    // public function edit(Permission $permission)
    // {
    //     // abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('admin.permissions.edit', compact('permission'));
    // }

    // public function show(Permission $permission)
    // {
    //     // abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('admin.permissions.show', compact('permission'));
    // }
}

<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class UserRoleController extends Controller
{
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit_roles'), 403);

        $roles = Role::all(['title', 'id']);

        $user->load('roles');

        return view('admin.users.roles.edit', compact('roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
        abort_if(Gate::denies('user_edit_roles'), 403);

        $old_roles = $user->roles->pluck('title')->toArray();
        $old_roles = implode(', ', $old_roles);

        $user->roles()->sync($request->input('roles', []));
        $user->load('roles');

        $new_roles = $user->roles()->pluck('title')->toArray();
        $new_roles = implode(', ', $new_roles);

        History::create([
            'subject_type' => 'user',
            'subject_id' => $user->id,
            'user_id' => auth()->user()->id,
            'description' => 'Roles updated from: (' . $old_roles . ') to: (' . $new_roles . ').',
        ]);

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Roles Updated.', 'level' => 'success']]);;
    }
}

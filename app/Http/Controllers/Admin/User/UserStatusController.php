<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class UserStatusController extends Controller
{
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit_status'), 403);

        $statuses = DB::table('account_statuses')->get(['id', 'name'])->pluck('name', 'id')->toArray();

        return view('admin.users.status.edit', compact('statuses', 'user'));
    }

    public function update(Request $request, User $user)
    {
        abort_if(Gate::denies('user_edit_status'), 403);

        $user->update(['account_status' => $request->account_status]);

        History::create([
            'subject_type' => 'user',
            'subject_id' => $user->id,
            'user_id' => auth()->user()->id,
            'description' => 'Account status forced updated to: (' . $request->account_status . ').',
        ]);

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Status Updated.', 'level' => 'success']]);;
    }

    public function super_user(Request $request, User $user)
    {
        $user->update(['is_super_user' => !$user->is_super_user]);

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Super User Status Updated.', 'level' => 'success']]);;
    }

    public function protected_user(Request $request, User $user)
    {
        $user->update(['is_protected_user' => !$user->is_protected_user]);

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Protected User Status Updated.', 'level' => 'success']]);;
    }
}

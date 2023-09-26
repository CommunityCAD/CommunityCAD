<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{
    public function edit(User $user)
    {
        $statuses = [
            1 => 'User',
            2 => 'Applicant',
            3 => 'Member',
            4 => 'Suspended/LOA',
            5 => 'Temporary Ban',
            6 => 'Permanent Ban',
        ];

        return view('admin.users.status.edit', compact('statuses', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update(['account_status' => $request->account_status]);

        if ($request->account_status == 3) {
            $user->touch('member_join_date');
        }

        History::create([
            'subject_type' => 'user',
            'subject_id' => $user->id,
            'user_id' => auth()->user()->id,
            'description' => 'Account status forced updated to: ('.$request->account_status.').',
        ]);

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Status Updated.', 'level' => 'success']]);
    }

    public function super_user(Request $request, User $user)
    {
        $user->update(['is_super_user' => ! $user->is_super_user]);

        $status = 'No';
        if ($user->is_super_user) {
            $status = 'Yes';
        }

        History::create([
            'subject_type' => 'user',
            'subject_id' => $user->id,
            'user_id' => auth()->user()->id,
            'description' => 'Super user status updated to: ('.$status.').',
        ]);

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Super User Status Updated.', 'level' => 'success']]);
    }

    public function protected_user(Request $request, User $user)
    {
        $user->update(['is_protected_user' => ! $user->is_protected_user]);

        $status = 'No';
        if ($user->is_protected_user) {
            $status = 'Yes';
        }

        History::create([
            'subject_type' => 'user',
            'subject_id' => $user->id,
            'user_id' => auth()->user()->id,
            'description' => 'Protected user status updated to: ('.$status.').',
        ]);

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Protected User Status Updated.', 'level' => 'success']]);
    }
}

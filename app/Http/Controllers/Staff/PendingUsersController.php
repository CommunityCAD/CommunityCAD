<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PendingUsersController extends Controller
{
    public function index(): View
    {
        $users = User::where('account_status', 1)->get();

        return view('staff.pending_user.index', compact('users'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        if ($request->type == 3) {

            $user->update([
                'account_status' => 3,
                'reapply' => null,
                'reapply_date' => null,
                'denied_reason' => null,
                'member_join_date' => now(),
                'community_rank' => 'Member',
            ]);

            History::create([
                'subject_type' => 'user',
                'subject_id' => $user->id,
                'user_id' => auth()->user()->id,
                'description' => 'User account approved. User populated into system.',
            ]);

            return redirect()->route('staff.pending_users.index')->with('alerts', [['message' => 'User account approved.', 'level' => 'success'], ['message' => 'User populated into system.', 'level' => 'success']]);
        } else {
            abort(500, 'Contact Gage. You should not have seen this ever.');
        }
    }
}

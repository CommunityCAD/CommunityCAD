<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\UserNotes;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function store(Request $request, User $user): RedirectResponse
    {
        $input = $request->validate([
            'note' => 'required',
        ]);

        $input['giver_id'] = auth()->user()->id;
        $input['receiver_id'] = $user->id;

        UserNotes::create($input);

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Note added.', 'level' => 'success']]);
    }

    public function destroy(User $user, UserNotes $userNotes): RedirectResponse
    {
        $userNotes->delete();

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Note deleted.', 'level' => 'success']]);
    }
}

<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\DisciplinaryAction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserDisciplinaryActionController extends Controller
{
    public function store(Request $request, User $user): RedirectResponse
    {
        $input = $request->validate([
            'disciplinary_action' => 'required',
            'disciplinary_action_type_id' => 'required|integer',
        ]);

        $input['giver_id'] = auth()->user()->id;
        $input['receiver_id'] = $user->id;

        DisciplinaryAction::create($input);

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Disciplinary action added.', 'level' => 'success']]);
    }

    public function destroy(User $user, DisciplinaryAction $disciplinaryAction): RedirectResponse
    {
        $disciplinaryAction->delete();

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Disciplinary action deleted.', 'level' => 'success']]);
    }
}

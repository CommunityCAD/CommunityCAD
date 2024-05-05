<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\DisciplinaryAction;
use App\Models\User;
use App\Notifications\DiscordNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

        $disciplinary_action = DisciplinaryAction::create($input);

        DiscordNotification::send(
            'audit_log',
            'Disciplinary Action has been created.',
            '',
            15548997,
            [
                [
                    'name' => 'User',
                    'value' => $disciplinary_action->receiver_user->id . ' (' . $disciplinary_action->receiver_user->preferred_name . ')',
                ],
                [
                    'name' => 'Given by',
                    'value' => auth()->user()->id . ' (' . auth()->user()->preferred_name . ')',
                ],
                [
                    'name' => 'Type',
                    'value' => $disciplinary_action->disciplinary_action_type->name,
                ],
                [
                    'name' => 'Reason',
                    'value' => $disciplinary_action->disciplinary_action,
                ],
                [
                    'name' => 'Created at',
                    'value' => $disciplinary_action->updated_at->format('m/d/Y H:i:s'),
                ],
            ]
        );

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Disciplinary action added.', 'level' => 'success']]);
    }

    public function destroy(User $user, DisciplinaryAction $disciplinaryAction): RedirectResponse
    {
        $disciplinaryAction->delete();

        DiscordNotification::send(
            'audit_log',
            'Disciplinary Action has been deleted.',
            '',
            15548997,
            [
                [
                    'name' => 'User',
                    'value' => $disciplinaryAction->receiver_user->id . ' (' . $disciplinaryAction->receiver_user->preferred_name . ')',
                ],
                [
                    'name' => 'Deleted by',
                    'value' => auth()->user()->id . ' (' . auth()->user()->preferred_name . ')',
                ],
                [
                    'name' => 'Type',
                    'value' => $disciplinaryAction->disciplinary_action_type->name,
                ],
                [
                    'name' => 'Reason',
                    'value' => $disciplinaryAction->disciplinary_action,
                ],
                [
                    'name' => 'Deleted at',
                    'value' => $disciplinaryAction->updated_at->format('m/d/Y H:i:s'),
                ],
            ]
        );

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Disciplinary action deleted.', 'level' => 'success']]);
    }
}

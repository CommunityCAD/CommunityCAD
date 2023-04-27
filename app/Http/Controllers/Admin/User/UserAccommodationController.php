<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\UserAccommodation as UserAccommodation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class UserAccommodationController extends Controller
{

    public function store(Request $request, User $user): RedirectResponse
    {

        $input = $request->validate([
            'accommodation' => 'required',
        ]);

        $input['giver_id'] = auth()->user()->id;
        $input['receiver_id'] = $user->id;

        UserAccommodation::create($input);
        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Accommodation added.', 'level' => 'success']]);;
    }

    public function destroy(User $user, UserAccommodation $userAccommodation): RedirectResponse
    {
        $userAccommodation->delete();
        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Accommodation deleted.', 'level' => 'success']]);;
    }
}

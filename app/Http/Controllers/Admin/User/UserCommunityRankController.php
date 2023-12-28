<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserCommunityRankController extends Controller
{
    public function update(Request $request, User $user): RedirectResponse
    {
        $input = $request->validate([
            'community_rank' => 'required',
        ]);

        $user->update($input);

        return redirect()->route('admin.users.show', $user->id)->with('alerts', [['message' => 'Community Rank Updated.', 'level' => 'success']]);
    }
}

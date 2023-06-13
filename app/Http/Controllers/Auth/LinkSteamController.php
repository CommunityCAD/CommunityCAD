<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LinkSteamController extends Controller
{
    public function link()
    {
        $steamUser = Socialite::driver('steam')->user();

        if (! is_null($steamUser)) {

            if ($this->userCheck($steamUser->getId())) {
                return redirect()->route('account.create')->with('alerts', [['message' => 'Steam Account Linked To Another User.', 'level' => 'error']]);
            }

            session([
                'steam_hex' => User::dec2hex($steamUser->getId()),
                'steam_id' => $steamUser->getId(),
                'steam_username' => $steamUser->nickname,
            ]);

            return redirect()->route('account.create')->with('alerts', [['message' => 'Steam Account Linked.', 'level' => 'success']]);
        }

        return $this->redirectToSteam();
    }

    protected function userCheck($steamId)
    {
        $user = User::where('steam_id', $steamId)->first();

        if ($user) {
            return true;
        }

        return false;
    }
}

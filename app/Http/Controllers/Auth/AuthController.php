<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        $discordUser = Socialite::driver('discord')->user();

        $user = $this->findOrNewUser($discordUser);

        if (!$user) {
            return redirect()->route('account.create');
            die();
        }

        Auth::login($user, true);

        $user->touch('last_login');

        return redirect()->intended('account/' . $user->id)->with('success', 'Welcome Back!'); // redirect to site
    }

    protected function findOrNewUser($discordUser)
    {
        $user = User::where('id', $discordUser->getId())->first();

        if (!is_null($user)) {
            $user->update([
                'discord_name' => $discordUser->user['username'],
                'discriminator' => $discordUser->user['discriminator'],
                'avatar' => $discordUser->avatar,
            ]);
            return $user;
        }

        session([
            'id' => $discordUser->getId(),
            'discord_name' => $discordUser->user['username'],
            'discriminator' => $discordUser->user['discriminator'],
            'avatar' => $discordUser->avatar,
        ]);

        return false;
    }
}

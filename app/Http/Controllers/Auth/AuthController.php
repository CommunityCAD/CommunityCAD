<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        $discordUser = Socialite::driver('discord')->user();

        $user = $this->findOrNewUser($discordUser);

        if (! $user) {
            return redirect()->route('account.create');
            exit();
        }

        Auth::login($user, true);

        $user->touch('last_login');

        return redirect()->intended('account/'.$user->id)->with('success', 'Welcome Back!'); // redirect to site
    }

    protected function findOrNewUser($discordUser)
    {
        $user = User::where('id', $discordUser->getId())->first();

        if ($discordUser->user['discriminator'] == 0) {

            if (is_null($discordUser->avatar)) {
                $avatar = 'https://ui-avatars.com/api/?name='.urlencode($discordUser->user['global_name']);
            } else {
                $avatar = $discordUser->avatar;
            }

            if (! is_null($user)) {
                $user->update([
                    'discord_name' => $discordUser->user['global_name'],
                    'discriminator' => $discordUser->user['discriminator'],
                    'discord_username' => $discordUser->user['username'],
                    'avatar' => $avatar,
                ]);

                return $user;
            }

            session([
                'id' => $discordUser->getId(),
                'discord_name' => $discordUser->user['global_name'],
                'discriminator' => $discordUser->user['discriminator'],
                'discord_username' => $discordUser->user['username'],
                'avatar' => $avatar,
            ]);

            return false;
        } else {
            if (is_null($discordUser->avatar)) {
                $avatar = 'https://ui-avatars.com/api/?name='.urlencode($discordUser->user['username']);
            } else {
                $avatar = $discordUser->avatar;
            }

            if (! is_null($user)) {
                $user->update([
                    'discord_name' => $discordUser->user['username'],
                    'discriminator' => $discordUser->user['discriminator'],
                    'avatar' => $avatar,
                ]);

                return $user;
            }

            session([
                'id' => $discordUser->getId(),
                'discord_name' => $discordUser->user['username'],
                'discriminator' => $discordUser->user['discriminator'],
                'avatar' => $avatar,
            ]);

            return false;
        }
    }
}

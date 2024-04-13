<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IngameLoginController extends Controller
{
    // public function login()
    // {
    //     $discordUser = Socialite::driver('discord')->user();

    //     $user = $this->findOrNewUser($discordUser);

    //     if (!$user) {
    //         return redirect()->route('account.create');
    //         exit();
    //     }

    //     Auth::login($user, true);

    //     $user->touch('last_login');
    //     $user->update(['email' => $discordUser->email]);

    //     return redirect()->intended('account/' . $user->id)->with('success', 'Welcome Back!'); // redirect to site
    // }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3',
        ]);

        $user_data = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if (Auth::attempt($user_data)) {
            return redirect()->route('cad.landing')->with('alerts', [['message' => 'Welcome Back.', 'level' => 'success']]);
        } else {
            Auth::logout();

            $request->session()->forget([
                'id',
                'discord_name',
                'discriminator',
                'avatar',
                'steam_id',
                'steam_hex',
                'steam_username',
            ]);

            return redirect()->route('ingame_login')->with('alerts', [['message' => 'There was an issue with the login.', 'level' => 'error']]);
        }
    }
}

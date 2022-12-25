<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
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

        return redirect()->route('home')->with('alerts', [['message' => 'Loged out.', 'level' => 'success']]);
    }
}

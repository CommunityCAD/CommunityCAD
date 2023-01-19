<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountCreateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->only(['create', 'store']);
    }

    public function create(): View
    {
        return view('accounts.create');
    }

    public function store(AccountCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['id'] = session('id');
        $data['discord_name'] = session('discord_name');
        $data['discriminator'] = session('discriminator');
        $data['avatar'] = session('avatar');
        $data['steam_id'] = session('steam_id');
        $data['steam_hex'] = session('steam_hex');
        $data['steam_name'] = session('steam_username');


        $user = User::create($data);

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

        return redirect()->route('home')->with('alerts', [['message' => 'Account Created.', 'level' => 'success']]);
    }

    public function show(): View|RedirectResponse
    {

        if (auth()->user()->account_status === 3) {
            return redirect()->route('portal.dashboard');
        }

        $user = auth()->user();

        return view('accounts.show', compact('user'));
    }
}

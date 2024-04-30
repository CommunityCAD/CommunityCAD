<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountCreateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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

        if (get_setting('force_steam_link')) {
            if (!session()->has('steam_id')) {
                return redirect()->route('account.create')->with('alerts', [['message' => 'You must link your steam account. Form has been reset.', 'level' => 'error']]);
            }
        }

        $data['id'] = session('id');
        $data['discord_name'] = session('discord_name');
        $data['discriminator'] = session('discriminator');
        $data['avatar'] = session('avatar');
        $data['community_rank'] = 'Non-member';

        if (session()->has('steam_id')) {
            $data['steam_id'] = session('steam_id');
            $data['steam_hex'] = session('steam_hex');
            $data['steam_name'] = session('steam_username');
        }

        if (in_array($data['id'], config('cad.owner_ids'))) {
            $data['account_status'] = 3;
        }

        $user = User::create($data);
        $user->touch('last_login');

        if (get_setting('use_discord_roles')) {
            $response = Http::accept('application/json')
                ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                ->get('https://discord.com/api/guilds/' . get_setting('discord_guild_id') . '/members/' . $user->id);

            $user_roles = json_decode($response->body())->roles;

            if (in_array(get_setting('discord_auto_role_id'), array_values($user_roles))) {
                $user->update(['account_status' => 3]);
            }
        }

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

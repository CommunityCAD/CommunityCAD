<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CadSetting;
use App\Models\DiscordChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SettingsController extends Controller
{
    public function general()
    {
        return view('admin.settings.general');
    }

    public function roleplay()
    {
        return view('admin.settings.roleplay');
    }

    public function application()
    {
        return view('admin.settings.application');
    }

    public function discord()
    {
        $discord_channels = DiscordChannel::all()->pluck('channel_id', 'name')->toArray();

        return view('admin.settings.discord', compact('discord_channels'));
    }

    public function discord_roles()
    {
        // $discord_channels = DiscordChannel::all()->pluck('channel_id', 'name')->toArray();
        $discord_roles = [];

        if (get_setting('use_discord_roles')) {
            $response =
                Http::accept('application/json')
                ->withHeaders(['Authorization' => config('app.discord_bot_token')])
                ->get('https://discord.com/api/guilds/' . get_setting('discord_guild_id') . '/roles');

            $discord_roles = json_decode($response->body());
        }
        return view('admin.settings.discord_roles', compact('discord_roles'));
    }

    public function api_key()
    {
        if (!in_array(auth()->user()->id, config('cad.owner_ids'))) {
            return redirect()->route('admin.settings.general')->with('alerts', [['message' => 'API Key is only available to owners.', 'level' => 'error']]);
        }

        return view('admin.settings.api_key');
    }

    public function generate_api_key()
    {
        if (!in_array(auth()->user()->id, config('cad.owner_ids'))) {
            return redirect()->route('admin.settings.general')->with('alerts', [['message' => 'API Key is only available to owners.', 'level' => 'error']]);
        }
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $key = substr(str_shuffle(str_repeat($pool, 64)), 0, 64);
        CadSetting::updateOrCreate(
            ['name' => 'api_key'],
            ['value' => $key, 'type' => 'text']
        );

        Cache::forget('cad_settings');

        return redirect()->route('admin.settings.api_key')->with('alerts', [['message' => 'API Key Generated.', 'level' => 'success']]);
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            CadSetting::updateOrCreate(
                ['name' => $key],
                ['value' => $value, 'type' => 'text']
            );
        }

        Cache::forget('cad_settings');

        return redirect()->route('admin.settings.general')->with('alerts', [['message' => 'Settings Saved.', 'level' => 'success']]);
    }

    public function update_discord(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            DiscordChannel::updateOrCreate(
                ['name' => $key],
                ['channel_id' => $value, 'type' => 'text']
            );
        }

        return redirect()->route('admin.settings.discord')->with('alerts', [['message' => 'Discord Channels Updated.', 'level' => 'success']]);
    }
}

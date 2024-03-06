<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscordChannel;
use Illuminate\Http\Request;

class DiscordChannelController extends Controller
{
    public function index()
    {
        $channels = DiscordChannel::all();

        return view('admin.discord_channel.index', compact('channels'));
    }

    public function edit(DiscordChannel $discord_channel)
    {
        return view('admin.discord_channel.edit', compact('discord_channel'));
    }

    public function update(Request $request, DiscordChannel $discord_channel)
    {
        $discord_channel->update(['channel_id' => $request->channel_id]);

        return redirect()->route('admin.discord_channel.index')->with('alerts', [['message' => 'Channel Updated.', 'level' => 'success']]);
    }
}

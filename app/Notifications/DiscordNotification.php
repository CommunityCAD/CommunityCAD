<?php

namespace App\Notifications;

use App\Models\DiscordChannel;
use Illuminate\Support\Facades\Http;

class DiscordNotification
{
    public static function send($perm, $title = '', $description = '', $color = null, $fields = [])
    {
        if (is_null($channel_id = DiscordChannel::where('name', $perm)->get()->first()->channel_id)) {
            return false;
        }

        $contents = [
            'embeds' => [[
                'title' => $title,
                'color' => $color,
                'description' => $description,
                'fields' => $fields,
            ]],
        ];

        $response = Http::accept('application/json')
            ->withHeaders(['Authorization' => config('app.discord_bot_token')])
            ->post('https://discord.com/api/channels/'.$channel_id.'/messages', $contents);
    }
}

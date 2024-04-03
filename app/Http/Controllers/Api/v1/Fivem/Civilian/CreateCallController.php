<?php

namespace App\Http\Controllers\Api\v1\Fivem\Civilian;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Notifications\DiscordNotification;
use Illuminate\Http\Request;

class CreateCallController extends Controller
{
    public function create(Request $request)
    {

        $data = [
            'narrative' => $request->narrative,
            'location' => $request->location,
            'city' => $request->city,
            'nature' => 'TEST',
            'priority' => 3,
            'type' => '1',
            'status' => 'RCVD',
            'source' => '911 Call',
        ];


        $call = Call::create($data);

        DiscordNotification::send(
            'cad_911_call',
            'New 911 Call! For: ' . $call->type_name,
            'There is a new 911 call. Call #' . $call->id,
            15548997,
            [
                [
                    'name' => 'Nature',
                    'value' => $call->nature_info['name'],
                ],
                [
                    'name' => 'Received At',
                    'value' => $call->created_at->format('m/d/Y H:i:s'),
                ],
                [
                    'name' => 'Location',
                    'value' => $call->location,
                ],
                [
                    'name' => 'Narrative',
                    'value' => $call->narrative,
                ],
            ]
        );


        return response($call, 200, ['Content-Type', 'application/json']);
    }
}

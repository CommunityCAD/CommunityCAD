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
        $source = '911 Call';
        $type = 1;
        $nature = "TEST";
        if ($request->source && in_array(strtoupper($request->source), [
            "911 CALL", "NON-EMERGENCY", "OFFICER", "FIRE"
        ])) {
            $source = strtoupper($request->source);
        }

        if ($request->nature) {
            $nature = $request->nature;
        }

        if ($request->type && in_array($request->type, [1, 2, 3])) {
            $type = $request->type;
        }

        $data = [
            'narrative' => $request->narrative,
            'location' => $request->location,
            'city' => $request->city,
            'nature' => $nature,
            'priority' => 3,
            'type' => $type,
            'status' => 'RCVD',
            'source' => $source,
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

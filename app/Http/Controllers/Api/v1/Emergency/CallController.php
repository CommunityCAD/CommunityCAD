<?php

namespace App\Http\Controllers\Api\v1\Emergency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Emergency\CreateCallRequest;
use App\Http\Requests\Api\v1\Emergency\GetCallsRequest;
use App\Http\Resources\Api\v1\Emergency\CallResource;
use App\Models\Cad\CallNatures;
use App\Models\Call;
use App\Notifications\DiscordNotification;
use Illuminate\Http\Request;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_calls(GetCallsRequest $request)
    {

        $open_calls = CallResource::collection(Call::orderBy('id', 'desc')->where('status', '!=', 'CLO')->where('status', 'not like', 'CLO-%')->with(['call_log', 'call_civilians', 'call_vehicles'])->get());
        $closed_calls = CallResource::collection(Call::orderBy('updated_at', 'desc')->where('status', '=', 'CLO')->orWhere('status', 'like', 'CLO-%')->with(['call_log', 'call_civilians', 'call_vehicles'])->limit($request->closed_call_limit)->get());

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                'open' => $open_calls,
                'closed' => $closed_calls
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_call(CreateCallRequest $request)
    {
        $source = '911 Call';
        $type = 1;
        $nature = 'OTHER';
        $priority = 3;

        if ($request->source && in_array(strtoupper($request->source), [
            '911 CALL', 'NON-EMERGENCY', 'OFFICER', 'FIRE',
        ])) {
            $source = strtoupper($request->source);
        }

        if ($request->nature && in_array(strtoupper($request->nature), array_keys(CallNatures::NATURECODES))) {
            $nature = $request->nature;
        }

        if ($request->type && in_array($request->type, [1, 2, 3])) {
            $type = $request->type;
        }

        if ($request->priority && in_array($request->priority, [1, 2, 3, 4, 5])) {
            $priority = $request->priority;
        }

        $data = [
            'narrative' => $request->narrative,
            'location' => $request->location,
            'city' => $request->city,
            'nature' => $nature,
            'priority' => $priority,
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

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new CallResource($call),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

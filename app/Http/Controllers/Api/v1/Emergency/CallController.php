<?php

namespace App\Http\Controllers\Api\v1\Emergency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Emergency\AddCallNoteRequest;
use App\Http\Requests\Api\v1\Emergency\AttachUnitRequest;
use App\Http\Requests\Api\v1\Emergency\CreateCallRequest;
use App\Http\Requests\Api\v1\Emergency\EditCallRequest;
use App\Http\Requests\Api\v1\Emergency\GetCallsRequest;
use App\Http\Resources\Api\v1\Emergency\CallResource;
use App\Models\Cad\ActiveUnit;
use App\Models\Cad\CallNatures;
use App\Models\Call;
use App\Models\CallLog;
use App\Notifications\DiscordNotification;
use Illuminate\Http\Request;

class CallController extends Controller
{

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

    public function get_call(Request $request)
    {
        $call = Call::where('id', $request->call_id)->get()->first();

        if (!$request->call_id || !$call) {
            return response()->json([
                'success'   => false,
                'message'   => "Call not found.",
                'data'      => []
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new CallResource($call),
            ]
        ]);
    }

    public function add_call_note(AddCallNoteRequest $request)
    {
        $call = Call::where('id', $request->call_id)->get()->first();

        if (!$call) {
            return response()->json([
                'success'   => false,
                'message'   => "Call not found.",
                'data'      => []
            ]);
        }

        $data = [
            'call_id' => $request->call_id,
            'text' => $request->note,
            'from' => $request->from,
        ];

        CallLog::create($data);

        $call->touch();

        return response()->json([
            'success'   => true,
            'message'   => "Note added.",
            'data'      => []
        ]);
    }

    public function edit_call(EditCallRequest $request)
    {
        $data = $request->validated();

        $call = Call::where('id', $data['call_id'])->get()->first();

        if (!$data['call_id'] || !$call) {
            return response()->json([
                'success'   => false,
                'message'   => "Call not found.",
                'data'      => []
            ]);
        }

        unset($data['call_id']);

        $call->update($data);
        $call->touch();

        return response()->json([
            'success'   => true,
            'message'   => "",
            'data'      => [
                new CallResource($call),
            ]
        ]);
    }

    function attach_unit(AttachUnitRequest $request)
    {
        $call = Call::where('id', $request->call_id)->get()->first();
        $active_unit = ActiveUnit::where('user_id', $request->user_id)->get()->first();

        if (!$request->call_id || !$call) {
            return response()->json([
                'success'   => false,
                'message'   => "Call not found.",
                'data'      => []
            ]);
        }

        if (!$request->user_id || !$active_unit) {
            return response()->json([
                'success'   => false,
                'message'   => "No active unit found for the given user.",
                'data'      => []
            ]);
        }

        if (in_array($request->call_id, array_values($active_unit->calls->pluck('id')->toArray()))) {
            return response()->json([
                'success'   => false,
                'message'   => "Unit is already attached to call.",
                'data'      => []
            ]);
        }

        $call->attached_units()->attach($active_unit->id);

        CallLog::create([
            'from' => $active_unit->officer->name . ' (' . $active_unit->user_department->badge_number . ')',
            'text' => 'Officer ' . $active_unit->badge_number . ' has been assigned.',
            'call_id' => $call->id,
        ]);

        $active_unit->update(['description' => 'Added to call: ' . $call->id]);
        $call->touch();
        $active_unit->touch();

        return response()->json([
            'success'   => true,
            'message'   => "Unit attached to call.",
            'data'      => []
        ]);
    }

    function detach_unit(AttachUnitRequest $request)
    {
        $call = Call::where('id', $request->call_id)->get()->first();
        $active_unit = ActiveUnit::where('user_id', $request->user_id)->get()->first();

        if (!$request->call_id || !$call) {
            return response()->json([
                'success'   => false,
                'message'   => "Call not found.",
                'data'      => []
            ]);
        }

        if (!$request->user_id || !$active_unit) {
            return response()->json([
                'success'   => false,
                'message'   => "No active unit found for the given user.",
                'data'      => []
            ]);
        }

        $call->attached_units()->detach($active_unit->id);

        CallLog::create([
            'from' => $active_unit->officer->name . ' (' . $active_unit->user_department->badge_number . ')',
            'text' => 'Officer ' . $active_unit->badge_number . ' has been unassigned.',
            'call_id' => $call->id,
        ]);

        $active_unit->update(['description' => 'Removed from call: ' . $call->id]);
        $call->touch();
        $active_unit->touch();

        return response()->json([
            'success'   => true,
            'message'   => "Unit detached from call.",
            'data'      => []
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

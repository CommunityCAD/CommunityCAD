<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Civilian\CallStoreRequest;
use App\Models\Cad\CallNatures;
use App\Models\Call;
use App\Models\CallCivilian;
use App\Models\Civilian;
use App\Notifications\DiscordNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CallController extends Controller
{
    public function create(Civilian $civilian): View
    {
        $call_natures = CallNatures::NATURECODES;

        return view('civilian.call.create', compact('civilian', 'call_natures'));
    }

    public function store(Civilian $civilian, CallStoreRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $civilian_id = false;

        if (isset($input['civilian_id'])) {
            $civilian_id = $input['civilian_id'];
        }
        unset($input['civilian_id']);

        $input['priority'] = '3';
        $input['source'] = '911 CALL';
        $input['status'] = 'RCVD';

        $call = Call::create($input);

        if ($civilian_id) {
            CallCivilian::create([
                'call_id' => $call->id,
                'civilian_id' => $civilian_id,
                'type' => 'RP',
            ]);
        }

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

        return redirect()->route('civilian.civilians.show', $civilian->id)->with('alerts', [['message' => '911 Call Created', 'level' => 'success']]);
    }
}

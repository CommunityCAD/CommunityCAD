<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cad\CallStoreRequest;
use App\Models\Cad\CallNatures;
use App\Models\Cad\CallStatuses;
use App\Models\Call;
use App\Models\CallCivilian;
use App\Models\CallLog;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function index(): View
    {
        $all_calls = Call::orderBy('id', 'desc')->get();

        $recent_calls = $all_calls->where('created_at', '>', Carbon::now()->subDays(2));
        $all_calls = $all_calls->where('created_at', '<', Carbon::now()->subDays(2));

        return view('cad.call.index', compact('all_calls', 'recent_calls'));
    }

    public function create(): View
    {
        return view('cad.call.create');
    }

    public function store(CallStoreRequest $request): RedirectResponse
    {

        $input = $request->validated();

        if (! isset($input['linked_civilians'])) {
            $call = Call::create($input);

            return redirect()->route('cad.mdt');
        }

        $linked_civilians = $input['linked_civilians'];
        $linked_civilians_types = $input['linked_civilians_types'];
        unset($input['linked_civilians'], $input['linked_civilians_types']);
        $call = Call::create($input);

        $index = 0;
        foreach ($linked_civilians as $civilian_id) {
            CallCivilian::create([
                'call_id' => $call->id,
                'civilian_id' => $civilian_id,
                'type' => $linked_civilians_types[$index],
            ]);
            $index++;
        }

        return redirect()->route('cad.mdt');
    }

    public function show(Call $call): View
    {
        $call->with('call_civilians');
        $call_natures = CallNatures::NATURECODES;
        $call_statuses = CallStatuses::STATUSCODES;
        $rps = CallCivilian::where('call_id', $call->id)->where('type', 'RP')->get();

        return view('cad.call.show', compact('call', 'call_natures', 'call_statuses', 'rps'));
    }

    public function edit(Call $call): View
    {
        return view('calls.edit', compact('calls'));
    }

    public function update(Request $request, Call $call): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required',
            'nature' => 'required',
            // 'location' => 'required',
            // 'city' => 'required',
            'priority' => 'required',
        ]);

        $name = '';

        if (auth()->user()->active_unit->user_department->department->type == 1) {
            $name = 'Officer';
        } elseif (auth()->user()->active_unit->user_department->department->type == 2) {
            $name = 'Dispatcher';
        } elseif (auth()->user()->active_unit->user_department->department->type == 4) {
            $name = 'Fire/EMS';
        }

        if ($call->status != $validated['status']) {
            CallLog::create([
                'from' => $name.' '.auth()->user()->active_unit->user_department->badge_number,
                'text' => 'Call Status Updated to: '.$validated['status'],
                'call_id' => $call->id,
            ]);

            if ($validated['status'] == 'CLO' || explode('-', $validated['status'], 2)[0] == 'CLO') {
                foreach ($call->attached_units as $unit) {
                    $unit->update(['status' => 'AVL']);
                    $unit->touch();
                    $call->attached_units()->detach($unit->id);
                }

                $call->attached_units()->detach();

                CallLog::create([
                    'from' => auth()->user()->active_unit->officer->name.' ('.auth()->user()->active_unit->badge_number.')',
                    'text' => 'Call '.$call->id.' has been closed and all units removed from call.',
                    'call_id' => $call->id,
                ]);
            }
        }

        if ($call->nature != $validated['nature']) {
            CallLog::create([
                'from' => $name.' '.auth()->user()->active_unit->user_department->badge_number,
                'text' => 'Call Nature Updated to: '.$validated['nature'],
                'call_id' => $call->id,
            ]);
        }

        if ($call->nature != $validated['priority']) {
            CallLog::create([
                'from' => $name.' '.auth()->user()->active_unit->user_department->badge_number,
                'text' => 'Call Priority Updated to: P'.$validated['priority'],
                'call_id' => $call->id,
            ]);
        }

        $call->update($validated);

        return redirect()->route('cad.call.show', $call->id);
    }
}

<?php

namespace App\Http\Controllers\Cad;

use App\Models\Call;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cad\CallStoreRequest;
use App\Models\Cad\ActiveUnit;
use App\Models\Cad\CallNatures;
use App\Models\Cad\CallStatuses;
use App\Models\CallCivilian;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class CallController extends Controller
{

    public function index(): View
    {
        $calls = Call::all();

        return view('cad.calls.index', compact('calls'));
    }

    public function create(): View
    {
        return view('cad.call.create');
    }

    public function store(CallStoreRequest $request): RedirectResponse
    {

        $input = $request->validated();
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

        return $this->redirect_to_cad();
    }

    public function show(Call $call): View
    {
        $call->with('call_civilians');
        $active_units = ActiveUnit::get();
        $call_natures = CallNatures::NATURECODES;
        $call_statuses = CallStatuses::STATUSCODES;

        return view('cad.call.show', compact('call', 'active_units', 'call_natures', 'call_statuses'));
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
            'location' => 'required',
            'city' => 'required',
        ]);

        if ($call->status != $validated['status']) {
            CallLog::create([
                'from' => 'Dispatch ' . auth()->user()->active_unit->badge_number,
                'text' => 'Call Status Updated to: ' . $validated['status'],
                'call_id' => $call->id,
            ]);
        }

        if ($call->nature != $validated['nature']) {
            CallLog::create([
                'from' => 'Dispatch ' .
                    auth()->user()->active_unit->badge_number,
                'text' => 'Call Nature Updated to: ' . $validated['nature'],
                'call_id' => $call->id,
            ]);
        }

        $call->update($validated);

        return redirect()->route('cad.call.show', $call->id);
    }

    public function destroy(Call $call): RedirectResponse
    {
        $call->delete();

        return redirect()->route('calls.index')->with('success', 'Message');
    }

    public function add_persons(Call $call, Request $request)
    {
        $civilian = Civilian::where('id', $request->civilian_id)->get()->first();
        if (Civilian::where('id', $request->civilian_id)->count() == 0) {
            return redirect()->route('cad.call.show', $call->id)->with('alerts', [['message' => 'That SSN doesn\'t return to anyone.', 'level' => 'error']]);
        }
        CallCivilian::create([
            'call_id' => $call->id,
            'civilian_id' => $civilian->id,
            'type' => $request->type,
        ]);

        return redirect()->route('cad.call.show', $call->id);
    }

    private function redirect_to_cad()
    {
        switch (auth()->user()->active_unit->user_department->department->type) {
            case 1:
                return redirect()->route('cad.mdt');
                break;
            case 2:
                return redirect()->route('cad.cad');
                break;
            case 4:
                return redirect()->route('cad.fire_cad');
                break;

            default:
                abort(403);
                break;
        }
    }
}

<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cad\CallStoreRequest;
use App\Models\Cad\ActiveUnit;
use App\Models\Cad\Call;
use App\Models\CallCivilian;
use App\Models\Civilian;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function index(): View
    {
        $calls = Call::all();

        return view('cad.calls.index', compact('calls'));
    }

    public function create(): View
    {
        return view('cad.calls.create');
    }

    public function store(CallStoreRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $input['units'] = '{"data":[]}';
        $call = Call::create($input);

        return redirect()->route('cad.cad');
    }

    public function show(Call $call): View
    {
        $call->with('call_civilians');
        $active_units = ActiveUnit::get();

        return view('cad.calls.show', compact('call', 'active_units'));
    }

    public function edit(Call $call): View
    {
        return view('calls.edit', compact('calls'));
    }

    public function update(Request $request, Call $call): RedirectResponse
    {
        $call->update($request->validated());

        return redirect()->route('calls.index')->with('success', 'Message');
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
}

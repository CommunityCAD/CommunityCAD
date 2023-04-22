<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cad\CallStoreRequest;
use App\Models\Cad\Call;
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
        $call = Call::create($input);
        return redirect()->route('cad.cad');
    }

    public function show(Call $call): View
    {
        return view('cad.calls.show', compact('call'));
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
}

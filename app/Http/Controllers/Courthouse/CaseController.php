<?php

namespace App\Http\Controllers\Courthouse;

use App\Models\Cad\Call;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class CaseController extends Controller
{
    public function show(Call $call): View
    {
        abort(403);
        dd($call);
        return view('calls.show', compact('calls'));
    }

    public function edit(Call $call): View
    {
        abort(403);
        return view('calls.edit', compact('calls'));
    }

    public function update(Request $request, Call $call): RedirectResponse
    {
        abort(403);
        $call->update($request->validated());
        return redirect()->route('calls.index')->with('success', 'Message');
    }

    public function destroy(Call $call): RedirectResponse
    {
        abort(403);
        $call->delete();
        return redirect()->route('calls.index')->with('success', 'Message');
    }
}

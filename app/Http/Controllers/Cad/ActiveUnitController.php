<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\ActiveUnit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ActiveUnitController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        ActiveUnit::create($request->validated());

        return redirect()->route('activeUnits.index')->with('success', 'Message');
    }

    public function show(ActiveUnit $activeUnit): View
    {
        return view('activeUnits.show', compact('activeUnits'));
    }

    public function edit(ActiveUnit $activeUnit): View
    {
        return view('activeUnits.edit', compact('activeUnits'));
    }

    public function update(Request $request, ActiveUnit $activeUnit): RedirectResponse
    {
        $activeUnit->update($request->validated());

        return redirect()->route('activeUnits.index')->with('success', 'Message');
    }

    public function destroy(ActiveUnit $activeUnit): RedirectResponse
    {
        $activeUnit->delete();

        return redirect()->route('activeUnits.index')->with('success', 'Message');
    }
}

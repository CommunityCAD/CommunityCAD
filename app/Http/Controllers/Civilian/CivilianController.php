<?php

namespace App\Http\Controllers\Civilian;

use App\Http\Controllers\Controller;
use App\Models\Civilian;
use App\Models\CivilianLevel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CivilianController extends Controller
{

    public function index(): View
    {
        $civilians = Civilian::where('user_id', auth()->user()->id)->get();
        $civilian_level = CivilianLevel::where('id', auth()->user()->civilian_level)->first();

        return view('civilian.civilians.index', compact('civilians', 'civilian_level'));
    }

    public function create(): View
    {
        return view('civilians.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Civilian::create($request->validated());
        return redirect()->route('civilians.index')->with('success', 'Message');
    }

    public function show(Civilian $civilian): View
    {
        return view('civilians.show', compact('civilians'));
    }

    public function edit(Civilian $civilian): View
    {
        return view('civilians.edit', compact('civilians'));
    }

    public function update(Request $request, Civilian $civilian): RedirectResponse
    {
        $civilian->update($request->validated());
        return redirect()->route('civilians.index')->with('success', 'Message');
    }

    public function destroy(Civilian $civilian): RedirectResponse
    {
        $civilian->delete();
        return redirect()->route('civilians.index')->with('success', 'Message');
    }
}

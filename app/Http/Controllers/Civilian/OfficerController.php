<?php

namespace App\Http\Controllers\Civilian;

use App\Models\Officer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class OfficerController extends Controller
{

    public function index(): View
    {
        $officers = Officer::all();
        return view('officers.index', compact('officers'));
    }

    public function create(): View
    {
        return view('officers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Officer::create($request->validated());
        return redirect()->route('officers.index')->with('success', 'Message');
    }

    public function show(Officer $officer): View
    {
        return view('officers.show', compact('officers'));
    }

    public function edit(Officer $officer): View
    {
        return view('officers.edit', compact('officers'));
    }

    public function update(Request $request, Officer $officer): RedirectResponse
    {
        $officer->update($request->validated());
        return redirect()->route('officers.index')->with('success', 'Message');
    }

    public function destroy(Officer $officer): RedirectResponse
    {
        $officer->delete();
        return redirect()->route('officers.index')->with('success', 'Message');
    }
}

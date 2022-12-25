<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index(): View
    {
        $applications = Application::all();
        return view('applications.index', compact('applications'));
    }

    public function create(): View
    {
        return view('applications.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Application::create($request->validated());
        return redirect()->route('applications.index')->with('success', 'Message');
    }

    public function show(Application $application): View
    {
        return view('applications.show', compact('applications'));
    }

    public function edit(Application $application): View
    {
        return view('applications.edit', compact('applications'));
    }

    public function update(Request $request, Application $application): RedirectResponse
    {
        $application->update($request->validated());
        return redirect()->route('applications.index')->with('success', 'Message');
    }

    public function destroy(Application $application): RedirectResponse
    {
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Message');
    }
}

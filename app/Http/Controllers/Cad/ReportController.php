<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(): View
    {
        $reports = Report::all();

        return view('reports.index', compact('reports'));
    }

    public function create(): View
    {
        return view('reports.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Report::create($request->validated());

        return redirect()->route('reports.index')->with('success', 'Message');
    }

    public function show(Report $report): View
    {
        return view('reports.show', compact('reports'));
    }

    public function edit(Report $report): View
    {
        return view('reports.edit', compact('reports'));
    }

    public function update(Request $request, Report $report): RedirectResponse
    {
        $report->update($request->validated());

        return redirect()->route('reports.index')->with('success', 'Message');
    }

    public function destroy(Report $report): RedirectResponse
    {
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Message');
    }
}

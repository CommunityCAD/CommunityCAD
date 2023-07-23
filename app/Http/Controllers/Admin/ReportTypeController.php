<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReportTypeRequest;
use App\Models\ReportType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ReportTypeController extends Controller
{
    public function index(): View
    {
        $types = ReportType::all();

        return view('admin.report_type.index', compact('types'));
    }

    public function create(): View
    {
        return view('admin.report_type.create');
    }

    public function store(ReportTypeRequest $request): RedirectResponse
    {
        ReportType::create($request->validated());

        return redirect()->route('admin.report_type.index')->with('alerts', [['message' => 'Report Type Created.', 'level' => 'success']]);
    }

    public function edit(ReportType $reportType): View
    {
        return view('admin.report_type.edit', compact('reportType'));
    }

    public function update(ReportTypeRequest $request, ReportType $reportType): RedirectResponse
    {
        $reportType->update($request->validated());

        return redirect()->route('admin.report_type.index')->with('alerts', [['message' => 'Report Type Updated.', 'level' => 'success']]);
    }

    public function destroy(ReportType $reportType): RedirectResponse
    {
        if ($reportType->is_locked) {
            return redirect()->route('admin.report_type.index')->with('alerts', [['message' => 'That report can not be deleted.', 'level' => 'error']]);
        }
        $reportType->delete();

        return redirect()->route('admin.report_type.index')->with('alerts', [['message' => 'Report Type Deleted.', 'level' => 'success']]);
    }
}

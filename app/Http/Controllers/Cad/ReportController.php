<?php

namespace App\Http\Controllers\Cad;

use App\Http\Controllers\Controller;
use App\Models\Cad\Call;
use App\Models\Report;
use App\Models\ReportType;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(): View
    {
        $reports = Report::all();

        return view('cad.report.index', compact('reports'));
    }

    public function create(): View
    {
        $report_types = ReportType::all();
        $calls = Call::where('updated_at', '>', Carbon::now()->subDays(30)->format('Y-m-d 00:00:00'))->get();

        return view('cad.report.create', compact('report_types', 'calls'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'mdcontent' => 'required',
            'title' => 'required',
            'call_id' => 'numeric|nullable',
            'report_type_id' => 'required|numeric',
        ]);

        $data = $validated;
        $data['text'] = $data['mdcontent'];
        unset($data['mdcontent']);
        $data['user_id'] = auth()->user()->id;
        $data['officer_id'] = auth()->user()->active_unit->officer_id;

        $report = Report::create($data);

        return redirect()->route('cad.report.show', $report->id);
    }

    public function show(Report $report): View
    {
        return view('cad.report.show', compact('report'));
    }

    public function edit(Report $report): View
    {
        $report_types = ReportType::all();
        $calls = Call::where('updated_at', '>', Carbon::now()->subDays(30)->format('Y-m-d 00:00:00'))->get();

        return view('cad.report.edit', compact('report', 'report_types', 'calls'));
    }

    public function update(Request $request, Report $report): RedirectResponse
    {
        $validated = $request->validate([
            'mdcontent' => 'required',
            'title' => 'required',
            'call_id' => 'numeric|nullable',
            'report_type_id' => 'required|numeric',
        ]);

        $data = $validated;
        $data['text'] = $data['mdcontent'];
        unset($data['mdcontent']);

        $report->update($data);

        return redirect()->route('cad.report.show', $report->id);
    }
}

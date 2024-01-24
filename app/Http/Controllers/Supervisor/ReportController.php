<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Contracts\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        $reports = Report::orderBy('created_at', 'desc')->get();

        return view('supervisor.reports.index', compact('reports'));
    }

    public function show(Report $report): View
    {
        return view('supervisor.reports.show', compact('report'));
    }
}

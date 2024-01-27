@extends('layouts.supervisor')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Reports</h1>
        <p class="text-sm text-white">Click to view report. They are sorted newest to oldest.</p>
    </header>

    <div class="card">
        @foreach ($reports as $report)
            <a href="{{ route('supervisor.reports.show', $report->id) }}">
                <div class="pill hover:bg-slate-700">
                    <p>Title: {{ $report->title }}</p>
                    <p>Submitted: {{ $report->created_at->format('m/d/Y H:i') }}</p>
                    <p>Submitted by: {{ $report->officer->name ?? $report->user->preferred_name }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection

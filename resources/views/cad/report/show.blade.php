@extends('layouts.cad_reports')

@section('content')
    <div class="">
        <div class="max-w-3xl mx-auto">
            <a class="delete-button-md" href="#" onclick="window.close();">Close</a>
            @if (auth()->user()->id == $report->user_id)
                <a class="edit-button-md" href="{{ route('cad.report.edit', $report->id) }}">Edit</a>
            @endif
        </div>
        <div class="bg-yellow-100 max-w-3xl rounded-lg mx-auto p-4 mt-5">
            <h1 class="text-black text-8xl text-center underline">POLICE REPORT</h1>

            <div class="my-5 text-2xl">
                <div class="">
                    <p>Report No: <span class="underline">{{ str_pad($report->id, 5, 0, STR_PAD_LEFT) }}</span></p>
                    <p>Call No: <span class="underline">{{ str_pad($report->call_id, 5, 0, STR_PAD_LEFT) }}</span></p>
                    <p>Date: <span class="underline">{{ $report->created_at->format('m/d/Y') }}</span></p>
                </div>
                <div class="">
                    <p>Reporting Officer: <span class="underline">{{ $report->user->officer_name_check }}</span></p>
                    <p>Report Type: <span class="underline">{{ $report->report_type->title }}</span></p>
                    <p>Report Title: <span class="underline">{{ $report->title }}</span></p>
                </div>
                <hr class="my-5">
                <div class="prose prose-lg">
                    <p class="">{!! Str::markdown($report->text) !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

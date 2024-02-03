@extends('layouts.cad_reports')

@section('content')
    <div class="">
        <div class="max-w-3xl mx-auto">
            <a class="delete-button-md" href="#" onclick="window.close();">Exit Without Saving</a>
        </div>
        <div class="bg-yellow-100 max-w-3xl rounded-lg mx-auto p-4 mt-5">
            <form action="{{ route('cad.report.update', $report->id) }}" id="mdeditor" method="POST">
                @csrf
                @method('PUT')
                {{-- <h1 class="text-black text-8xl text-center underline">POLICE REPORT</h1> --}}

                <div class="my-5 text-2xl">
                    <div class="">
                        <p>Call No:
                            <select class="select-input" name="call_id">
                                <option value="">Choose one</option>
                                @foreach ($calls as $call)
                                    <option @selected($call->id == $report->call_id) value="{{ $call->id }}">{{ $call->id }}
                                        ({{ $call->nature }})
                                    </option>
                                @endforeach
                            </select>
                        </p>
                        <x-input-error :messages="$errors->get('call_id')" class="mt-2" />
                        <p>Date: <span class="underline">{{ $report->created_at->format('m/d/Y') }}</span></p>
                    </div>
                    <div class="">
                        <p>Reporting Officer: <span
                                class="underline">{{ $report->officer->name ?? $report->user->preferred_name }}</span></p>
                        <p>Report Type:
                            <select class="select-input" name="report_type_id" required>
                                <option>Choose one</option>
                                @foreach ($report_types as $type)
                                    <option @selected($report->report_type_id == $type->id) value="{{ $type->id }}">{{ $type->title }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                        <x-input-error :messages="$errors->get('report_type_id')" class="mt-2" />
                        <p>Report Title: <input class="text-input" name="title" required type="text"
                                value="{{ $report->title }}"></p>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <hr class="my-5">
                    <p>Detail of Event:</p>
                    <div class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="editor">
                    </div>
                    <input id="mdcontent" name="mdcontent" type="hidden" value="{{ $report->text }}">

                    <button class="new-button-md text-base mt-5">Save</button>

                </div>
            </form>
        </div>
    </div>
@endsection

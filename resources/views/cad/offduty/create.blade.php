@extends('layouts.cad_reports')

@section('content')
    <div class="">
        <div class="max-w-3xl mx-auto">
            <a class="secondary-button-md" href="{{ route('cad.home') }}">Back</a>
            <a class="delete-button-md" href="{{ route('cad.offduty.skipreport') }}">Skip Report</a>
        </div>
        <div class="bg-yellow-100 max-w-3xl rounded-lg mx-auto p-4 mt-5">
            <form action="{{ route('cad.offduty.store') }}" id="mdeditor" method="POST">
                @csrf
                {{-- <h1 class="text-black text-8xl text-center underline">POLICE REPORT</h1> --}}

                <div class="my-5 text-2xl">
                    <div class="">
                        <p>Reporting Officer: <span
                                class="underline">{{ auth()->user()->active_unit->officer->name }}</span></p>
                        <p>Report Type:
                            <select class="select-input" name="report_type_id" required>
                                <option>Choose one</option>
                                @foreach ($report_types as $type)
                                    <option @selected(old('report_type_id') == $type->id) value="{{ $type->id }}">{{ $type->title }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                        <x-input-error :messages="$errors->get('report_type_id')" class="mt-2" />
                        <p>Report Title: <input class="text-input" name="title" required type="text"
                                value="{{ old('title', 'End of Watch Report for ' . auth()->user()->active_unit->officer->name . ' on ' . date('m/d/Y H:i')) }}">
                        </p>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <hr class="my-5">
                    <p>Report:</p>
                    <div class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="editor">
                    </div>
                    <input id="mdcontent" name="mdcontent" type="hidden" value="{{ old('mdcontent') }}">

                    <button class="new-button-md text-base mt-5">Save</button>

                </div>
            </form>
        </div>
    </div>
@endsection

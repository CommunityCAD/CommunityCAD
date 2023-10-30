{{-- @extends('layouts.cad')

@section('content')
    <div class="flex flex-col">
        <div class="flex items-center justify-around p-1 space-x-3 text-white rounded cursor-default">
            <p class="text-sm font-semibold">
                Officer {{ auth()->user()->officer_name ? auth()->user()->officer_name : auth()->user()->discord_name }}
            </p>
            <p class="text-lg"><span class="mr-3">{{ date('m/d/Y') }}</span><span id="running_clock"></span></p>
            <p class="flex">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="mx-3">Connected to live_database_prod</span>
            </p>
        </div>
        <form action="{{ route('cad.offduty.store') }}" method="POST">
            @csrf
            <div class="w-3/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
                <div class="flex">
                    <div class="w-3/5">
                        <label class="block mr-2 text-lg">Name:</label>
                        <input class="text-input" readonly type="text"
                            value="Officer {{ auth()->user()->officer_name_check }}">
                    </div>
                    <div class="w-1/5 ml-3">
                        <label class="block mr-2 text-lg">Date:</label>
                        <input class="text-input" readonly type="text" value="{{ date('m/d/Y') }}">
                    </div>

                    <div class="w-1/5 ml-3">
                        <label class="block mr-2 text-lg">Time:</label>
                        <input class="text-input" readonly type="text" value="{{ date('H:i') }}">
                    </div>
                </div>

                <div class="flex">
                    <div class="w-full">
                        <label class="block mr-2 text-lg">End of Watch Report:</label>
                        <textarea class="textarea-input h-48" name="text" required></textarea>
                    </div>
                </div>

                <button class="edit-button-md">Submit</button>

            </div>
        </form>
    </div>
@endsection --}}

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
                        <p>Reporting Officer: <span class="underline">{{ auth()->user()->officer_name_check }}</span></p>
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
                                value="{{ old('title', 'End of Watch Report for ' . auth()->user()->officer_name_check . ' on ' . date('m/d/Y H:i')) }}">
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

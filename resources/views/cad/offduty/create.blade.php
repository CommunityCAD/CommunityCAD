@extends('layouts.cad')

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
@endsection

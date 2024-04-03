@extends('layouts.admin_settings')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Discord Integration</h1>
        <p class="text-sm"><a class="flex text-sm items-center text-blue-600 underline"
                href="https://communitycad.app/docs/discord-bot-integration">Learn More
                <svg class="w-4 h-4 ml-2" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a></p>
    </header>
    <div class="card">
        <form action="{{ route('admin.settings.update_discord') }}" id="mdeditor" method="POST">
            @csrf
            <div class="pill p-3">
                <p class="text-lg font-semibold">On Duty Log</p>
                <p>Channel to send a message whenever a member goes on duty in the CAD.</p>
                <input class="text-input" name="cad_on_duty" type="number"
                    value="{{ old('cad_on_duty', $discord_channels['cad_on_duty']) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">Off Duty Log</p>
                <p>Channel to send a message whenever a member goes Off duty in the CAD.</p>
                <input class="text-input" name="cad_off_duty" type="number"
                    value="{{ old('cad_off_duty', $discord_channels['cad_off_duty']) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">911 Log</p>
                <p>Channel to send a message whenever a civilian makes a 911 Call.</p>
                <input class="text-input" name="cad_911_call" type="number"
                    value="{{ old('cad_911_call', $discord_channels['cad_911_call']) }}">
            </div>

            <div class="flex justify-end">
                <button class="inline-block secondary-button-md">Save</button>
            </div>
        </form>
    </div>
@endsection

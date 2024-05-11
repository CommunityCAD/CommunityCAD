@extends('layouts.admin_settings')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">CAD Settings</h1>
        <p class="text-sm"><a class="flex text-sm items-center text-blue-600 underline"
                href="https://communitycad.app/docs/settings-page">Learn More
                <svg class="w-4 h-4 ml-2" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a></p>
    </header>
    <div class="card">
        <form action="{{ route('admin.settings.update') }}" id="mdeditor" method="POST">
            @csrf
            <div class="pill p-3">
                <p class="text-lg font-semibold">On duty Button</p>
                <p>Text for on duty button.</p>
                <input class="text-input" name="on_duty_button_text" type="text"
                    value="{{ old('on_duty_button_text', get_setting('on_duty_button_text')) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">Available Button</p>
                <p>Text for available button.</p>
                <input class="text-input" name="available_button_text" type="text"
                    value="{{ old('available_button_text', get_setting('available_button_text')) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">Enroute Button</p>
                <p>Text for enroute button.</p>
                <input class="text-input" name="enroute_button_text" type="text"
                    value="{{ old('enroute_button_text', get_setting('enroute_button_text')) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">On Scene Button</p>
                <p>Text for on scene button.</p>
                <input class="text-input" name="on_scene_button_text" type="text"
                    value="{{ old('on_scene_button_text', get_setting('on_scene_button_text')) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">Break Button</p>
                <p>Text for break button.</p>
                <input class="text-input" name="break_button_text" type="text"
                    value="{{ old('break_button_text', get_setting('break_button_text')) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">Off duty Button</p>
                <p>Text for off duty button.</p>
                <input class="text-input" name="off_duty_button_text" type="text"
                    value="{{ old('off_duty_button_text', get_setting('off_duty_button_text')) }}">
            </div>

            <div class="flex justify-end">
                <button class="inline-block secondary-button-md">Save</button>
            </div>
        </form>
    </div>
@endsection

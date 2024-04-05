@extends('layouts.admin_settings')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Application Settings</h1>
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
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-lg font-semibold">Members must apply</p>
                        <p>When on members mut apply to get into the CAD. This will enable to application system. If off
                            then users will make an account then a Staff/Admin must approve them.</p>
                    </div>
                    <select class="w-28 px-1 py-1 mt-2 text-black border rounded-md cursor-pointer focus:outline-none"
                        id="force_steam_link" name="force_steam_link">
                        <option @selected(old('force_steam_link', get_setting('force_steam_link')) == true) value="on">On</option>
                        <option @selected(old('force_steam_link', get_setting('force_steam_link')) == false) value="off">Off</option>
                    </select>
                </div>
            </div>
            <div class="pill p-3">
                <p class="text-lg font-semibold">Minimum Age</p>
                <p>If you have the "members must apply" setting to True then this setting will be applied. If an applicant
                    applies under this age then their application will flag for an admin to review it.</p>
                <input class="text-input" name="minimum_age" type="number"
                    value="{{ old('minimum_age', get_setting('minimum_age')) }}">
            </div>

            <div class="pill p-3">
                <div class="">
                    <p class="text-lg font-semibold">Days Until Reapply</p>
                    <p>If you have the "members must apply" setting to True then this setting will be applied. It will
                        block users from reapplying if inside this date range. If you do not want a "cool down" you can
                        set to 0.</p>

                    <input class="text-input" name="days_until_reapply" type="number"
                        value="{{ old('days_until_reapply', get_setting('days_until_reapply')) }}">
                </div>
            </div>

            <div class="pill p-3">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-lg font-semibold">Force Steam Link</p>
                        <p>Forces users to link thier Steam account while creating thier account the first time.</p>
                    </div>
                    <select class="w-28 px-1 py-1 mt-2 text-black border rounded-md cursor-pointer focus:outline-none"
                        id="force_steam_link" name="force_steam_link">
                        <option @selected(old('force_steam_link', get_setting('force_steam_link')) == true) value="on">On</option>
                        <option @selected(old('force_steam_link', get_setting('force_steam_link')) == false) value="off">Off</option>
                    </select>
                </div>
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">Application Terms</p>
                <p>If you have the "members must apply" setting to True then this setting will be applied. Terms text on the
                    bottom of the application before a user submits it.</p>
                <div>
                    <div class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm" id="editor">
                    </div>
                    <input id="mdcontent" name="application_terms" type="hidden"
                        value="{{ get_setting('application_terms') }}">
                    <x-input-error :messages="$errors->get('application_terms')" class="mt-2" />
                </div>
            </div>

            <div class="flex justify-end">
                <button class="inline-block secondary-button-md">Save</button>
            </div>
        </form>
    </div>
@endsection

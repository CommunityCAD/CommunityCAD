@extends('layouts.admin_settings')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">General Settings</h1>
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
        <form action=""></form>
        <div class="pill p-3">
            <p class="text-lg font-semibold">Community Name</p>
            <p>The name of your community.</p>
            <input class="text-input" name="community_name" type="text"
                value="{{ old('community_name', get_setting('community_name')) }}">
        </div>

        <div class="pill p-3">
            <p class="text-lg font-semibold">Community Logo</p>
            <p>The logo of your community. Must be a url.</p>
            <input class="text-input" name="community_name" type="url"
                value="{{ old('community_logo', get_setting('community_logo')) }}">
        </div>

        <div class="pill p-3">
            <p class="text-lg font-semibold flex items-center justify-between">
                <span>Community Type</span>
                <a class="flex text-sm items-center text-blue-600 underline"
                    href="https://communitycad.app/docs/settings-page#officer_name_format">Learn More
                    <svg class="w-4 h-4 ml-2" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </p>
            <p>The type of community will detrumine how new members are handled.</p>
            <select class="select-input" id="community_type" name="community_type">
                <option value="">Whitelisted</option>
                <option value="">Semi-Whitelisted</option>
                <option value="">Public</option>
            </select>
        </div>

        <div class="flex justify-end">
            <button class="inline-block secondary-button-md">Save</button>
        </div>
    </div>
@endsection

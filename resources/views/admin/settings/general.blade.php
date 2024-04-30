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
        <form action="{{ route('admin.settings.update') }}" id="mdeditor" method="POST">
            @csrf
            <div class="pill p-3">
                <p class="text-lg font-semibold">Community Name</p>
                <p>The name of your community.</p>
                <input class="text-input" name="community_name" type="text"
                    value="{{ old('community_name', get_setting('community_name')) }}">
            </div>

            <div class="pill p-3">
                <div class="flex justify-between">
                    <div>
                        <p class="text-lg font-semibold">Community Logo</p>
                        <p>The logo of your community. Must be a url.</p>
                    </div>
                    <img alt="" class="w-16 h-16" src="{{ get_setting('community_logo') }}">
                </div>

                <input class="text-input" name="community_logo" type="url"
                    value="{{ old('community_logo', get_setting('community_logo')) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">Community Intro</p>
                <p>Text shown on the home page of the CAD that unlogged in users or applicants will see. Basicly a small
                    about us section.</p>
                <div>
                    <div class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm" id="editor">
                    </div>
                    <input id="mdcontent" name="community_intro" type="hidden"
                        value="{{ get_setting('community_intro') }}">
                    <x-input-error :messages="$errors->get('community_intro')" class="mt-2" />
                </div>
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold flex items-center justify-between">
                    <span>Community Type</span>
                    {{-- <a class="flex text-sm items-center text-blue-600 underline"
                        href="https://communitycad.app/docs/settings-page#officer_name_format">Learn More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a> --}}
                </p>
                <p>The type of community will detrumine how new members are handled.</p>
                <select class="select-input" disabled id="community_type" name="community_type">
                    <option @selected(old('community_type', get_setting('community_type')) == 'legacy') value="legacy">Legacy</option>
                    <option @selected(old('community_type', get_setting('community_type')) == 'whitelisted') value="whitelisted">Whitelisted</option>
                    <option @selected(old('community_type', get_setting('community_type')) == 'approval') value="approval">Approval</option>
                    <option @selected(old('community_type', get_setting('community_type')) == 'semiwhitelisted') value="semiwhitelisted">Semi-Whitelisted</option>
                    <option @selected(old('community_type', get_setting('community_type')) == 'public') value="public">Public</option>
                </select>
            </div>

            <div class="pill p-3">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-lg font-semibold">Allow Members To Control Unit Number</p>
                        <p>This allows members once accepted into a department they can update their unit number.
                        </p>
                    </div>
                    <select class="w-28 px-1 py-1 mt-2 text-black border rounded-md cursor-pointer focus:outline-none"
                        id="allow_members_to_update_number" name="allow_members_to_update_number">
                        <option @selected(old('allow_members_to_update_number', get_setting('allow_members_to_update_number')) == false) value="off">Off</option>
                        <option @selected(old('allow_members_to_update_number', get_setting('allow_members_to_update_number')) == true) value="on">On</option>
                    </select>
                </div>
            </div>

            <div class="pill p-3">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-lg font-semibold">Allow Members To Control Department Rank</p>
                        <p>This allows members once accepted into a department they can update their rank.
                        </p>
                    </div>
                    <select class="w-28 px-1 py-1 mt-2 text-black border rounded-md cursor-pointer focus:outline-none"
                        id="allow_members_to_update_rank" name="allow_members_to_update_rank">
                        <option @selected(old('allow_members_to_update_rank', get_setting('allow_members_to_update_rank')) == false) value="off">Off</option>
                        <option @selected(old('allow_members_to_update_rank', get_setting('allow_members_to_update_rank')) == true) value="on">On</option>
                    </select>
                </div>
            </div>

            <div class="pill p-3">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-lg font-semibold">Roleplay Enabled</p>
                        <p>This will show a banner that RP is suspended.</p>
                    </div>
                    <select class="w-28 px-1 py-1 mt-2 text-black border rounded-md cursor-pointer focus:outline-none"
                        disabled id="roleplay_enabled" name="roleplay_enabled">
                        <option @selected(old('roleplay_enabled', get_setting('roleplay_enabled')) == true) value="on">On</option>
                        <option @selected(old('roleplay_enabled', get_setting('roleplay_enabled')) == false) value="off">Off</option>
                    </select>
                </div>
            </div>

            <div class="pill p-3">
                <div class="">
                    <p class="text-lg font-semibold">Days Until Inactive</p>
                    <p>Takes a number for how many days until a member is classified as inactive on the CAD. Right now this
                        only effects the number on the dashboard. Soon it will have abilities like purge and auto kick after
                        so many days. There is no ETA on this improvement.</p>

                    <input class="text-input" name="days_until_inactive" type="number"
                        value="{{ old('days_until_inactive', get_setting('days_until_inactive')) }}">
                </div>
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">Discord Guild ID</p>
                <p>Discord Guild ID for the server used for Discord Integration. Only one server ID accepted.</p>
                <input class="text-input" name="discord_guild_id" type="text"
                    value="{{ old('discord_guild_id', get_setting('discord_guild_id')) }}">
            </div>

            <div class="pill p-3">
                <div class="flex justify-between items-center">
                    <div class="mr-3">
                        <p class="text-lg font-semibold">Use Discord Roles</p>
                        <p>Manage CAD Roles with Discord Roles. It is best not to switch this alot. Pick one and stick with
                            it. Bugs may appear if you switch between using Discord roles and back to CAD roles. <span
                                class="text-red-500">Discord Guild ID must be set above.</span></p>
                    </div>
                    <select class="w-28 px-1 py-1 mt-2 text-black border rounded-md cursor-pointer focus:outline-none"
                        id="use_discord_roles" name="use_discord_roles">
                        <option @selected(old('use_discord_roles', get_setting('use_discord_roles')) == false) value="off">Off</option>
                        <option @selected(old('use_discord_roles', get_setting('use_discord_roles')) == true) value="on">On</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <button class="inline-block secondary-button-md">Save</button>
            </div>
        </form>
    </div>
@endsection

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

            <div class="pill p-3">
                <p class="text-lg font-semibold">Discord Guild ID</p>
                <p>Discord Guild ID for the server used for Discord Integration. Only one server ID accepted.</p>
                <input class="text-input" name="discord_guild_id" type="text"
                    value="{{ old('discord_guild_id', get_setting('discord_guild_id')) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">Discord Auto Approve Role</p>
                <p>This role will be auto approved into the CAD if your community type is Approval. <span
                        class="text-red-500">Discord Guild ID must be set above.</span></p>
                <select class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" id="discord_auto_role_id"
                    name="discord_auto_role_id">
                    <option value="">-- Choose One --</option>
                    <option value="0">None</option>
                    @foreach ($discord_roles as $id => $discord_role)
                        @if ($id != 0 && $discord_role->managed != true)
                            <option @selected(old('discord_auto_role_id') == $discord_role->id) value="{{ $discord_role->id }}">
                                {{ $discord_role->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button class="inline-block secondary-button-md">Save</button>
            </div>
        </form>
    </div>
@endsection

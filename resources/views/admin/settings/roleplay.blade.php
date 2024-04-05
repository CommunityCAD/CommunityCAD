@extends('layouts.admin_settings')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Roleplay Settings</h1>
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
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <div class="pill p-3">
                <p class="text-lg font-semibold">Postal Map Link</p>
                <p>A link to your postal map that members can reference in the CAD to get correct addresses.</p>
                <input class="text-input" name="postal_map_link" type="url"
                    value="{{ old('postal_map_link', get_setting('postal_map_link')) }}">
            </div>

            <div class="pill p-3">
                <div class="flex justify-between items-center">
                    <div class="mr-12">
                        <p class="text-lg font-semibold">Allow Same Name Civilians</p>
                        <p>If you will allow members to create same name civilians. If on you CAN have two John Does. If off
                            there will only ever be one John Doe.</p>
                    </div>
                    <select class="w-28 px-1 py-1 mt-2 text-black border rounded-md cursor-pointer focus:outline-none"
                        id="allow_same_name_civilians" name="allow_same_name_civilians">
                        <option @selected(old('allow_same_name_civilians', get_setting('allow_same_name_civilians')) == true) value="on">On</option>
                        <option @selected(old('allow_same_name_civilians', get_setting('allow_same_name_civilians')) == false) value="off">Off</option>
                    </select>
                </div>
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">State</p>
                <p>This is the default values for your RP area. State refers to the whole map.</p>
                <input class="text-input" name="state" type="text" value="{{ old('state', get_setting('state')) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">County</p>
                <p>This is the default values for your RP area. County refers to Lore Blaine County.</p>
                <input class="text-input" name="county" type="text" value="{{ old('county', get_setting('county')) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold">City</p>
                <p>This is the default values for your RP area. City refers to Lore Los Santos.</p>
                <input class="text-input" name="city" type="text" value="{{ old('city', get_setting('city')) }}">
            </div>

            <div class="pill p-3">
                <p class="text-lg font-semibold flex items-center justify-between">
                    <span>Officer Name Format</span>
                </p>
                <p>This forces a consistant format on officer names.</p>
                <select class="select-input" id="officer_name_format" name="officer_name_format">
                    <option @selected(old('officer_name_format', get_setting('officer_name_format')) == 'F. Last') value="F. Last">F. Last</option>
                    <option @selected(old('officer_name_format', get_setting('officer_name_format')) == 'First Last') value="First Last">First Last</option>
                    <option @selected(old('officer_name_format', get_setting('officer_name_format')) == 'First L.') value="First L.">First L.</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button class="inline-block secondary-button-md">Save</button>
            </div>
        </form>
    </div>
@endsection

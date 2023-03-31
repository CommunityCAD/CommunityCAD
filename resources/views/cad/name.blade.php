@extends('layouts.cad')

@section('content')
    <div class="flex flex-col">
        <div class="flex items-center justify-around p-1 space-x-3 text-white rounded cursor-default">
            <p class="text-sm font-semibold">
                Officer {{ auth()->user()->officer_name ? auth()->user()->officer_name : auth()->user()->discord_name }}
            </p>
            <p class="text-lg"><span class="mr-3">{{ date('m/d/Y') }}</span><span id="running_clock"></span></p>
            <p class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z" />
                </svg>
                <span class="mx-3">Connected to live_database_prod</span>
            </p>
        </div>
        <div class="w-3/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
            <div class="flex">
                <div class="w-3/5">
                    <label class="block mr-2 text-lg">Name:</label>
                    <input type="text" class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white">
                </div>
                <div class="w-2/5 ml-3">
                    <label class="block mr-2 text-lg">Social Security:</label>
                    <input type="text" class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white">
                </div>
            </div>

            <div class="flex">
                <div class="w-3/5">
                    <label class="block mr-2 text-lg">Driver License:</label>
                    <input type="text" class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white">
                </div>
                <div class="w-2/5 ml-3">
                    <label class="block mr-2 text-lg">Driver License State:</label>
                    <input type="text" class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white"
                        value="San Andreas">
                </div>
            </div>

            <input type="submit" value="Search" class="secondary-button-md">

        </div>

        <div class="w-3/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
            No Name Searched
        </div>
    </div>
@endsection

@extends('layouts.cad')

@section('content')
    <div class="flex flex-col uppercase">
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
        <div class="p-4 mt-5 space-y-3 text-white rounded cursor-default">

            <form action="{{ route('cad.call.store') }}" method="POST"
                class="w-3/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
                @csrf

                <div class="flex">
                    <div class="w-3/5">
                        <label class="block mr-2 text-lg">Nature:</label>
                        <input name="nature" type="text" value="{{ old('nature') }}"
                            class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                        <x-input-error :messages="$errors->get('nature')" class="mt-2" />
                    </div>
                    <div class="w-2/5 ml-3">
                        <label class="block mr-2 text-lg">SOURCE:</label>
                        <select name="source"
                            class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                            <option value="911 CALL">911 CALL</option>
                            <option value="511 CALL">411 CALL</option>
                            <option value="POLICE OFFICER">POLICE OFFICER</option>
                            <option value="FLAG DOWN">FLAG DOWN</option>
                            <option value="OTHER">OTHER</option>
                        </select>
                        <x-input-error :messages="$errors->get('source')" class="mt-2" />

                    </div>
                </div>

                <div class="flex">
                    <div class="w-3/5">
                        <label class="block mr-2 text-lg">Location:</label>
                        <input name="location" type="text" value="{{ old('location') }}"
                            class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />

                    </div>
                    <div class="w-2/5 ml-3">
                        <label class="block mr-2 text-lg">City:</label>
                        <input name="city" type="text" value="{{ old('city') }}"
                            class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />

                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/3">
                        <label class="block mr-2 text-lg">Priority:</label>
                        <select name="priority"
                            class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="w-1/3 ml-3">
                        <label class="block mr-2 text-lg">Status:</label>
                        <select name="status"
                            class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                            <option value="OPN">OPN</option>
                            <option value="HLD">HLD</option>
                            <option value="DISP">DISP</option>
                        </select>
                    </div>
                    <div class="w-1/3 ml-3">
                        <label class="block mr-2 text-lg">Type:</label>
                        <select name="type"
                            class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                            <option value="1">Police</option>
                            <option value="2">Fire</option>
                            <option value="3">EMS</option>
                        </select>
                    </div>
                </div>

                <livewire:cad.leo.call-civilian-search />

                <div class="flex">
                    <div class="w-full">
                        <label class="block mr-2 text-lg">Narrative:</label>
                        <textarea name="narrative" class="w-full h-40 px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">{{ old('narrative') }}</textarea>
                        <x-input-error :messages="$errors->get('narrative')" class="mt-2" />

                    </div>
                </div>

                <input type="submit" value="CREATE" class="secondary-button-md">

            </form>
        </div>
    </div>
@endsection

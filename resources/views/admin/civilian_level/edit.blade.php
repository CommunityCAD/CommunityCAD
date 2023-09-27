@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Edit Civilian Level</h1>
        <p class="text-sm text-white"></p>
    </header>
    <div class="admin-card">

        @if ($civilianLevel->id != 1)
            <form action="{{ route('admin.civilian_level.destroy', $civilianLevel->id) }}" class="text-right" method="POST"
                onsubmit="return confirm('Are you sure you wish to delete this Civilian Level? This can\'t be undone and will delete everything assocaited with this Civilian Level!');">
                @csrf
                @method('DELETE')
                <button class="delete-button-md">
                    <x-delete-button></x-delete-button>
                </button>
            </form>
        @endif

        <form action="{{ route('admin.civilian_level.update', $civilianLevel->id) }}" class="space-y-4" method="POST">
            @csrf
            @method('put')

            <div>
                <label class="block text-black-500" for="name">Name</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="name"
                    required type="text" value="{{ $civilianLevel->name }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="civilian_limit">Civilian Limit</label>
                <p class="text-sm"></p>
                <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="civilian_limit"
                    required type="number" value="{{ $civilianLevel->civilian_limit }}" />
                <x-input-error :messages="$errors->get('civilian_limit')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="vehicle_limit">Vehicle Limit</label>
                <p class="text-sm">Amount of vehicles per civilian a member can create.</p>
                <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="vehicle_limit" required
                    type="number" value="{{ $civilianLevel->vehicle_limit }}" />
                <x-input-error :messages="$errors->get('vehicle_limit')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="firearm_limit">Firearm Limit</label>
                <p class="text-sm">Amount of Firearms per civilian a member can create.</p>
                <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="firearm_limit" required
                    type="number" value="{{ $civilianLevel->firearm_limit }}" />
                <x-input-error :messages="$errors->get('firearm_limit')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="firearm_limit">Allowed Licenses</label>
                <p class="text-sm">Licenses this level can have.</p>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    @foreach ($license_types as $license_type)
                        <div class="block">
                            @if (in_array($license_type->id, $allowed_licenses['data']))
                                <label class="flex items-center cursor-pointer" for="{{ $license_type->id }}">
                                    <div class="relative">
                                        <input checked class="hidden checkbox" id="{{ $license_type->id }}"
                                            name="allowed_licenses[]" type="checkbox" value="{{ $license_type->id }}">
                                        <div class="block border-[1px] border-white w-14 h-8 rounded-full">
                                        </div>
                                        <div
                                            class="absolute w-6 h-6 transition bg-gray-800 rounded-full dot left-1 top-1 dark:bg-white">
                                        </div>
                                    </div>
                                    <div class="ml-3 font-medium text-gray-900text-white">
                                        {{ $license_type->name }}
                                    </div>
                                </label>
                            @else
                                <label class="flex items-center cursor-pointer" for="{{ $license_type->id }}">
                                    <div class="relative">
                                        <input class="hidden checkbox" id="{{ $license_type->id }}"
                                            name="allowed_licenses[]" type="checkbox" value="{{ $license_type->id }}">
                                        <div class="block border-[1px] border-white w-14 h-8 rounded-full">
                                        </div>
                                        <div class="absolute w-6 h-6 transition  rounded-full dot left-1 top-1 bg-white">
                                        </div>
                                    </div>
                                    <div class="ml-3 font-medium text-white">
                                        {{ $license_type->name }}
                                    </div>
                                </label>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-4 flex justify-between">
                <button class="inline-blockmr-5 edit-button-md">Save</button>
                <a class="delete-button-md" href="{{ route('admin.civilian_level.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

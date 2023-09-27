@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Create Civilian Level</h1>
        <p class="text-sm text-white"></p>
    </header>
    <div class="admin-card">

        <form action="{{ route('admin.civilian_level.store') }}" class="space-y-4" method="POST">
            @csrf

            <div>
                <label class="block text-black-500" for="name">Name</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="name"
                    required type="text" value="{{ old('name') }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="civilian_limit">Civilian Limit</label>
                <p class="text-sm"></p>
                <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="civilian_limit"
                    required type="number" value="{{ old('civilian_limit') }}" />
                <x-input-error :messages="$errors->get('civilian_limit')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="vehicle_limit">Vehicle Limit</label>
                <p class="text-sm">Amount of vehicles per civilian a member can create.</p>
                <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="vehicle_limit" required
                    type="number" value="{{ old('vehicle_limit') }}" />
                <x-input-error :messages="$errors->get('vehicle_limit')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="firearm_limit">Firearm Limit</label>
                <p class="text-sm">Amount of Firearms per civilian a member can create.</p>
                <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="firearm_limit" required
                    type="number" value="{{ old('firearm_limit') }}" />
                <x-input-error :messages="$errors->get('firearm_limit')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="firearm_limit">Allowed Licenses</label>
                <p class="text-sm">Licenses this level can have.</p>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    @foreach ($license_types as $license_type)
                        <div class="block">
                            <label class="flex items-center cursor-pointer" for="{{ $license_type->id }}">
                                <div class="relative">
                                    <input class="hidden checkbox" id="{{ $license_type->id }}" name="allowed_licenses[]"
                                        type="checkbox" value="{{ $license_type->id }}">
                                    <div class="block border-[1px] border-white w-14 h-8 rounded-full">
                                    </div>
                                    <div class="absolute w-6 h-6 transition  rounded-full dot left-1 top-1 bg-white">
                                    </div>
                                </div>
                                <div class="ml-3 font-medium text-white">
                                    {{ $license_type->name }}
                                </div>
                            </label>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 new-button-md">Create</button>
                <a class="w-1/3 delete-button-md" href="{{ route('admin.civilian_level.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

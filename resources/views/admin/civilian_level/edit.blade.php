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

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 edit-button-md">Save</button>
                <a class="w-1/3 delete-button-md" href="{{ route('admin.civilian_level.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

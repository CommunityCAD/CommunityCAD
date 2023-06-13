@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Edit Civilian Level</h1>
        <p class="text-sm text-white"></p>
    </header>
    <div class="admin-card">

        <form action="{{ route('admin.civilian_level.destroy', $civilianLevel->id) }}" method="POST" class="text-right"
            onsubmit="return confirm('Are you sure you wish to delete this Civilian Level? This can\'t be undone and will delete everything assocaited with this Civilian Level!');">
            @csrf
            @method('DELETE')
            <button class="delete-button-md">
                <x-delete-button></x-delete-button>
            </button>
        </form>

        <form action="{{ route('admin.civilian_level.update', $civilianLevel->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('put')

            <div>
                <label for="name" class="block text-black-500">Name</label>
                <input type="text" name="name" value="{{ $civilianLevel->name }}" required autofocus
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label for="civilian_limit" class="block text-black-500">Civilian Limit</label>
                <p class="text-sm"></p>
                <input type="number" name="civilian_limit" value="{{ $civilianLevel->civilian_limit }}" required
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('civilian_limit')" class="mt-2" />
            </div>

            <div>
                <label for="vehicle_limit" class="block text-black-500">Vehicle Limit</label>
                <p class="text-sm">Amount of vehicles per civilian a member can create.</p>
                <input type="number" name="vehicle_limit" value="{{ $civilianLevel->vehicle_limit }}" required
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('vehicle_limit')" class="mt-2" />
            </div>

            <div>
                <label for="firearm_limit" class="block text-black-500">Firearm Limit</label>
                <p class="text-sm">Amount of Firearms per civilian a member can create.</p>
                <input type="number" name="firearm_limit" value="{{ $civilianLevel->firearm_limit }}" required
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('firearm_limit')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 edit-button-md">Save</button>
                <a href="{{ route('admin.civilian_level.index') }}" class="w-1/3 delete-button-md">Cancel</a>
            </div>
        </form>
    </div>
@endsection

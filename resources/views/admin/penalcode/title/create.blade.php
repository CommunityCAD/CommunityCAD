@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Penal Code Titles</h1>
        <p class="text-sm text-white">Create a new penal code title.</p>
    </header>

    <div class="admin-card">
        <form action="{{ route('admin.penalcode.title.store') }}" class="space-y-4" method="POST">
            @csrf

            <div>
                <label class="block text-black-500" for="name">Name</label>
                <input autofocus class="text-input" name="name" required type="text" value="{{ old('name') }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="number">Number</label>
                <p class="text-sm"></p>
                <input class="text-input" name="number" required type="text" value="{{ old('number') }}" />
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>

            <div class="mt-4 flex justify-between">
                <button class="new-button-md">Create</button>
                <a class="delete-button-md" href="{{ route('admin.penalcode.title.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

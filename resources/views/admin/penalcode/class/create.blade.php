@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Penal Code Classification</h1>
        <p class="text-sm text-white">Create a new penal code classification.</p>
    </header>

    <div class="admin-card">
        <form action="{{ route('admin.penalcode.class.store') }}" class="space-y-4" method="POST">
            @csrf

            <div>
                <label class="block text-black-500" for="name">Name</label>
                <input autofocus class="text-input" name="name" required type="text" value="{{ old('name') }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="description">Description</label>
                <p class="text-sm"></p>
                <input class="text-input" name="description" type="text" value="{{ old('description') }}" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4 flex justify-between">
                <button class="new-button-md">Create</button>
                <a class="delete-button-md" href="{{ route('admin.penalcode.class.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

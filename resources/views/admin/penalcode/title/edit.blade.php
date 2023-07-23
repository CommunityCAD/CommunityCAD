@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Penal Code Titles</h1>
        <p class="text-sm text-white">Edit code title. Be careful editing. This will reflect on all codes related to this
            title. Deleting a title will delete all codes under this title.</p>
    </header>

    <div class="admin-card">

        <form action="{{ route('admin.penalcode.title.destroy', $title->id) }}" class="text-right" method="POST"
            onsubmit="return confirm('Are you sure you wish to delete this title? This can\'t be undone! Please read warning at the top of this page before confirming.');">
            @csrf
            @method('DELETE')
            <button class="delete-button-md">
                <x-delete-button></x-delete-button>
            </button>
        </form>

        <form action="{{ route('admin.penalcode.title.update', $title->id) }}" class="space-y-4" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-black-500" for="name">Name</label>
                <input autofocus class="text-input" name="name" required type="text" value="{{ $title->name }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="number">Number</label>
                <p class="text-sm"></p>
                <input class="text-input" name="number" required type="text" value="{{ $title->number }}" />
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>

            <div class="mt-4 flex justify-between">
                <button class="edit-button-md">Save</button>
                <a class="delete-button-md" href="{{ route('admin.penalcode.title.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

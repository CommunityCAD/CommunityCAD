@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Penal Code Titles</h1>
        <p class="text-sm text-white">Edit code classification. Be careful editing. This will reflect on all codes related to
            this
            title. You can not delete classifications.</p>
    </header>

    <div class="admin-card">

        {{-- <form action="{{ route('admin.penalcode.title.destroy', $title->id) }}" class="text-right" method="POST"
            onsubmit="return confirm('Are you sure you wish to delete this title? This can\'t be undone! Please read warning at the top of this page before confirming.');">
            @csrf
            @method('DELETE')
            <button class="delete-button-md">
                <x-delete-button></x-delete-button>
            </button>
        </form> --}}

        <form action="{{ route('admin.penalcode.class.update', $class->id) }}" class="space-y-4" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-black-500" for="name">Name</label>
                <input autofocus class="text-input" name="name" required type="text" value="{{ $class->name }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="description">Description</label>
                <p class="text-sm"></p>
                <input class="text-input" name="description" type="text" value="{{ $class->description }}" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4 flex justify-between">
                <button class="edit-button-md">Save</button>
                <a class="delete-button-md" href="{{ route('admin.penalcode.class.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

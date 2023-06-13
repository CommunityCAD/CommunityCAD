@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Create Disciplinary Action Type</h1>
        <p class="text-sm text-white"></p>
    </header>
    <div class="admin-card">

        <form action="{{ route('admin.disciplinary_action_type.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-black-500">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label for="description" class="block text-black-500">Description</label>
                <input type="text" name="description" value="{{ old('description') }}"
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 new-button-md">Create</button>
                <a href="{{ route('admin.disciplinary_action_type.index') }}" class="w-1/3 delete-button-md">Cancel</a>
            </div>
        </form>
    </div>
@endsection

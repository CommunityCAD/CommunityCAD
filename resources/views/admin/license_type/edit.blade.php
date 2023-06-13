@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Edit License Type</h1>
        <p class="text-sm text-white">Be careful editing/deleteing names of Licenses. This will cause all civilians to be
            updated/deleted.</p>
    </header>
    <div class="admin-card">

        <form action="{{ route('admin.license_type.destroy', $licenseType->id) }}" method="POST" class="text-right"
            onsubmit="return confirm('Are you sure you wish to delete this License Type? This can\'t be undone and will delete everything assocaited with this License Type!');">
            @csrf
            @method('DELETE')
            <button class="delete-button-md">
                <x-delete-button></x-delete-button>
            </button>
        </form>

        <form action="{{ route('admin.license_type.update', $licenseType->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('put')

            <div>
                <label for="name" class="block text-black-500">Name</label>
                <input type="text" name="name" value="{{ $licenseType->name }}" required autofocus
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label for="prefix" class="block text-black-500">Prefix</label>
                <p class="text-sm">Prefix to license numbers. Example Drivers License might be DL. So the number would be
                    DL123456.</p>
                <input type="text" name="prefix" value="{{ $licenseType->prefix }}"
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('prefix')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 new-button-md">Create</button>
                <a href="{{ route('admin.license_type.index') }}" class="w-1/3 delete-button-md">Cancel</a>
            </div>
        </form>
    </div>
@endsection

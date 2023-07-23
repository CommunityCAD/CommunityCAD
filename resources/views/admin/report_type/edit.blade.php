@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Edit Report Type</h1>
        <p class="text-sm text-white">Be careful editing/deleteing names of Reports. This will cause all reports to be
            updated/deleted.</p>
    </header>
    <div class="admin-card">

        <form action="{{ route('admin.report_type.destroy', $reportType->id) }}" class="text-right" method="POST"
            onsubmit="return confirm('Are you sure you wish to delete this report Type? This can\'t be undone and will delete everything assocaited with this report Type!');">
            @csrf
            @method('DELETE')
            <button class="delete-button-md">
                <x-delete-button></x-delete-button>
            </button>
        </form>

        <form action="{{ route('admin.report_type.update', $reportType->id) }}" class="space-y-4" method="POST">
            @csrf
            @method('put')

            <div>
                <label class="block text-black-500" for="title">Name</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="title"
                    required type="text" value="{{ $reportType->title }}" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="description">Description</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="description"
                    required type="text" value="{{ $reportType->description }}" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 edit-button-md">Save</button>
                <a class="w-1/3 delete-button-md" href="{{ route('admin.report_type.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

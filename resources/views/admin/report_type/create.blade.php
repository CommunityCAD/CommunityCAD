@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Create Report Type</h1>
        <p class="text-sm text-white">Create a new report type for LEO officers to fill out in the MDT.</p>
    </header>
    <div class="admin-card">

        <form action="{{ route('admin.report_type.store') }}" class="space-y-4" method="POST">
            @csrf
            <div>
                <label class="block text-black-500" for="title">Name</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="title"
                    required type="text" value="{{ old('title') }}" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="description">Description</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="description"
                    required type="text" value="{{ old('description') }}" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 new-button-md">Create</button>
                <a class="w-1/3 delete-button-md" href="{{ route('admin.report_type.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

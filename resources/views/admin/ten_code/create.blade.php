@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage 10 Codes</h1>
        <p class="text-sm text-white">Create a new 10 code.</p>
    </header>

    <div class="card">
        <form action="{{ route('admin.ten_code.store') }}" class="space-y-4" method="POST">
            @csrf

            <div>
                <label class="block text-black-500" for="type">Title</label>
                <select class="select-input" id="type" name="type">
                    <option value="">Choose Type</option>
                    <option @selected(old('type') == 1) value="1">All</option>
                    <option @selected(old('type') == 2) value="2">LEO</option>
                    <option @selected(old('type') == 3) value="3">Fire/EMS</option>
                    <option @selected(old('type') == 4) value="4">Phonetics</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="code">Code</label>
                <input autofocus class="text-input" name="code" required type="text" value="{{ old('code') }}" />
                <x-input-error :messages="$errors->get('code')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="meaning">Meaning</label>
                <input autofocus class="text-input" name="meaning" required type="text" value="{{ old('meaning') }}" />
                <x-input-error :messages="$errors->get('meaning')" class="mt-2" />
            </div>

            <div class="mt-4 flex justify-between">
                <button class="new-button-md">Create</button>
                <a class="delete-button-md" href="{{ route('admin.ten_code.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

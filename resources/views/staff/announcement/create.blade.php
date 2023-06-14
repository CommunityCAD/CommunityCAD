@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Create Announcement</h1>
        <p class="text-sm text-white"></p>
    </header>
    <div class="card">

        <form action="{{ route('staff.announcement.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block text-black-500">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required autofocus
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <label for="department_id" class="block text-black-500">Department</label>
                <select name="department_id" id="department_id" class="select-input">
                    <option value="">Choose one</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @selected(old('department_id') == $department->id)>{{ $department->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
            </div>

            <div>
                <label for="text" class="block text-black-500">Text</label>
                <p class="text-sm">Prefix to license numbers. Example Drivers License might be DL. So the number would be
                    DL123456.</p>
                <textarea name="text" id="text" class="textarea-input">{{ old('text') }}</textarea>
                <x-input-error :messages="$errors->get('prefix')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 new-button-md">Create</button>
                <a href="{{ route('staff.announcement.index') }}" class="w-1/3 delete-button-md">Cancel</a>
            </div>
        </form>
    </div>
@endsection

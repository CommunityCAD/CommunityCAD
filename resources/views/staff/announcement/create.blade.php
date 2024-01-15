@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Create Announcement</h1>
        <p class="text-sm text-white"></p>
    </header>
    <div class="card">

        <form action="{{ route('staff.announcement.store') }}" class="space-y-4" method="POST">
            @csrf

            <div>
                <label class="block text-black-500" for="title">Title</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="title"
                    required type="text" value="{{ old('title') }}" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="department_id">Department</label>
                <select class="select-input" id="department_id" name="department_id">
                    <option value="">Choose one</option>
                    @foreach ($departments as $department)
                        <option @selected(old('department_id') == $department->id) value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="text">Text</label>
                <p class="text-sm"></p>
                <textarea class="textarea-input" id="text" name="text">{{ old('text') }}</textarea>
                <x-input-error :messages="$errors->get('prefix')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 new-button-md">Create</button>
                <a class="w-1/3 delete-button-md" href="{{ route('staff.announcement.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

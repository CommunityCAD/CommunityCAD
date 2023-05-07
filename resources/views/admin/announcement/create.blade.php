@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b border-gray-700" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg dark:text-white">Create Announcement</p>
        </div>
        @livewire('breadcrumbs', ['paths' => []])
    </nav>

    <div class="main-wrapper">
        <form action="{{ route('admin.announcement.store') }}" method="POST">
            @csrf

            <div>
                <label for="title" class="block mt-3 text-black-500">Title<span class="text-red-600">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" class="text-input" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <label for="text" class="block mt-3 text-black-500">Announcement<span
                        class="text-red-600">*</span></label>
                <textarea name="text" class="textarea-input">{{ old('text') }}</textarea>
                <x-input-error :messages="$errors->get('text')" class="mt-2" />
            </div>

            <div>
                <label for="department_id" class="block mt-3 text-black-500">Department<span
                        class="text-red-600">*</span></label>
                <select name="department_id" id="department_id" class="select-input">
                    <option value="0">All Departments</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
            </div>

            <input type="submit" value="Create Announcement" class="mt-4 new-button-md">
        </form>
    </div>
@endsection

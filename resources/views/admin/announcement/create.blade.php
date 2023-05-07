@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b border-gray-700" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg dark:text-white">Create Announcement</p>
        </div>
        @livewire('breadcrumbs', ['paths' => []])
    </nav>

    <div
        class="w-full mx-auto px-6 py-8 mt-6 mb-6 overflow-hidden shadow-md bg-[#124559] sm:max-w-4xl sm:rounded-lg text-white">
        <form action="{{ route('admin.announcement.store') }}" method="POST">
            @csrf

            <div>
                <label for="title" class="block mt-3 text-black-500">Title <span class="text-red-600">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <label for="text" class="block mt-3 text-black-500">Announcement <span
                        class="text-red-600">*</span></label>
                <textarea name="text" class="w-full h-24 p-1 mt-2 text-black border rounded-md focus:outline-none">{{ old('text') }}</textarea>
                <x-input-error :messages="$errors->get('text')" class="mt-2" />
            </div>

            <div>
                <label for="title" class="block mt-3 text-black-500">Title <span class="text-red-600">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>


            <input type="submit" value="Create Annoucnement" class="mt-4 new-button-md">


        </form>
    </div>
@endsection

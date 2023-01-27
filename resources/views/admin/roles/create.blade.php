@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg text-white">Create Role</p>
        </div>

        @livewire('breadcrumbs', ['paths' => [['href' => route('admin.roles.index'), 'text' => 'All Roles']]])

    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">

            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf

                <div>
                    <label for="title" class="block mt-3 text-black-500">Title <span class="text-red-600">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>


                <label for="title" class="block mt-3 text-black-500">Permissions <span
                        class="text-red-600">*</span></label>
                <div class="mt-3 space-y-2">
                    @foreach ($permissions as $permission)
                        <div class="block">
                            <input type="checkbox" name="permissions[]" id="{{ $permission->id }}"
                                value="{{ $permission->id }}" />
                            <label for="{{ $permission->id }}">{{ $permission->title }}</label>
                        </div>
                    @endforeach
                </div>

                <input type="submit" value="Create Role"
                    class="px-2 py-1 mt-3 bg-green-500 rounded cursor-pointer hover:bg-green-600">


            </form>
        </div>


    </div>
@endsection

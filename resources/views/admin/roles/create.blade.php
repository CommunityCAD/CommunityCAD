@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b border-gray-700" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg dark:text-white">Create Role</p>
        </div>
        @livewire('breadcrumbs', ['paths' => [['href' => route('admin.roles.index'), 'text' => 'All Roles']]])
    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <div class="main-wrapper">

            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf

                <div>
                    <label for="title" class="block mt-3 text-black-500">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" required autofocus
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>


                <label for="title" class="block mt-3 text-black-500">Permissions</label>
                <div class="mt-3 space-y-2">
                    @foreach ($permissions as $permission)
                        <label for="{{ $permission->id }}" class="flex items-center cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" class="hidden checkbox" name="permissions[]"
                                    id="{{ $permission->id }}" value="{{ $permission->id }}">
                                <div class="block border-[1px] dark:border-white border-gray-900 w-14 h-8 rounded-full">
                                </div>
                                <div
                                    class="absolute w-6 h-6 transition bg-gray-800 rounded-full dot left-1 top-1 dark:bg-white">
                                </div>
                            </div>
                            <div class="ml-3 font-medium text-gray-900 dark:text-white">
                                {{ $permission->title }}
                            </div>
                        </label>
                    @endforeach
                </div>

                <div class="mt-4">
                    <button class="inline-block w-1/3 mr-5 new-button-md">Create</button>
                    <a href="{{ route('admin.roles.index') }}" class="w-1/3 delete-button-md">Cancel</a>
                </div>

            </form>
        </div>


    </div>
@endsection

@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg text-white">Edit Member Roles: {{ $user->discord }}</p>
        </div>

        @livewire('breadcrumbs', ['paths' => [['href' => route('admin.users.index'), 'text' => 'All Members'], ['href' => route('admin.users.show', $user->id), 'text' => $user->discord]]])

    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">

            <form action="{{ route('admin.users.roles.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="title" class="block mt-3 text-black-500">Roles <span class="text-red-600">*</span></label>
                <div class="mt-3 space-y-2">

                    @foreach ($roles as $role)
                        @if ($user->roles->contains($role->id))
                            <div class="block">
                                <input type="checkbox" checked name="roles[]" id="{{ $role->id }}"
                                    value="{{ $role->id }}" />
                                <label for="{{ $role->id }}">{{ $role->title }}</label>
                            </div>
                        @else
                            <div class="block">
                                <input type="checkbox" name="roles[]" id="{{ $role->id }}"
                                    value="{{ $role->id }}" />
                                <label for="{{ $role->id }}">{{ $role->title }}</label>
                            </div>
                        @endif
                    @endforeach

                </div>

                <input type="submit" value="Save User" class="px-2 py-1 mt-4 bg-blue-500 rounded hover:bg-blue-600">
            </form>
        </div>

    </div>
@endsection

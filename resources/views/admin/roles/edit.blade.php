@extends('layouts.portal')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <h2 class="text-2xl font-bold dark:text-gray-200">Edit Role</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">

            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block mt-3 text-black-500">Title <span class="text-red-600">*</span></label>
                    <input type="text" name="title" value="{{ $role->title }}"
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <label for="title" class="block mt-3 text-black-500">Permissions <span
                        class="text-red-600">*</span></label>
                <div class="space-y-2 mt-3">
                    @foreach ($permissions as $permission)
                        @if (in_array($permission->id, $role->permissions->pluck('id')->toArray()))
                            <div class="block">
                                <input type="checkbox" checked name="permissions[]" id="{{ $permission->id }}"
                                    value="{{ $permission->id }}" />
                                <label for="{{ $permission->id }}">{{ $permission->title }}</label>
                            </div>
                        @else
                            <div class="block">
                                <input type="checkbox" name="permissions[]" id="{{ $permission->id }}"
                                    value="{{ $permission->id }}" />
                                <label for="{{ $permission->id }}">{{ $permission->title }}</label>
                            </div>
                        @endif
                    @endforeach
                </div>

                <input type="submit" value="Save Role" class="bg-blue-500 px-2 py-1 rounded hover:bg-blue-600 mt-4">
            </form>

            <form method="POST" id="delete_role" action="{{ route('admin.roles.destroy', $role->id) }}"
                class="block w-full">
                @csrf
                @method('delete')
                <script type="text/javascript">
                    function confirm_delete() {
                        if (confirm('Are you sure you want to delete this role? \nThis can not be undone!')) {
                            return document.getElementById('delete_role').submit();
                        } else {
                            return false;
                        }
                    }
                </script>
                <a class="bg-red-500 px-2 py-1 rounded hover:bg-red-600 mt-4 inline-block" href="#"
                    onclick="event.preventDefault(); return confirm_delete()">

                    <span>Delete Role</span>
                </a>
            </form>
        </div>

    </div>
@endsection

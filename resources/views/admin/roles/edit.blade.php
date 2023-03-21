@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b border-gray-700" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg dark:text-white">Edit Role: {{ $role->title }}</p>
        </div>

        @livewire('breadcrumbs', ['paths' => [['href' => route('admin.roles.index'), 'text' => 'All Roles']]])

    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <div class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden shadow-md bg-[#124559] sm:max-w-4xl sm:rounded-lg text-white">

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
                <div class="mt-3 space-y-2">
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

                <input type="submit" value="Save Role" class="px-2 py-1 mt-4 bg-blue-500 rounded hover:bg-blue-600">
            </form>
            @can('role_delete')
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
                    <a class="inline-block px-2 py-1 mt-4 bg-red-500 rounded hover:bg-red-600" href="#"
                        onclick="event.preventDefault(); return confirm_delete()">

                        <span>Delete Role</span>
                    </a>
                </form>
            @endcan
        </div>

    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <nav class="flex justify-between mb-4 border-b border-gray-700" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg dark:text-white">Edit Role: {{ $role->title }}</p>
        </div>
        @livewire('breadcrumbs', ['paths' => [['href' => route('admin.roles.index'), 'text' => 'All Roles']]])
    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <div class="main-wrapper">

            @can('role_delete')
                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="text-right"
                    onsubmit="return confirm('Are you sure you wish to delete this role? This can\'t be undone!');">
                    @csrf
                    @method('DELETE')
                    <button class="delete-button-md">
                        <x-delete-button></x-delete-button>
                    </button>
                </form>
            @endcan

            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block mt-3 text-black-500">Role Name</label>
                    <input type="text" name="title" value="{{ $role->title }}" class="text-input" autofocus
                        required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <label class="block mt-3 text-black-500">Permissions</label>
                <div class="mt-3 space-y-2">
                    @foreach ($permissions as $permission)
                        @php
                            switch ($permission->category) {
                                case 'admin':
                                    $text_color = 'text-red-500';
                                    break;
                            
                                case 'staff':
                                    $text_color = 'text-yellow-500';
                                    break;
                            
                                default:
                                    $text_color = 'text-slate-300';
                                    break;
                            }
                        @endphp
                        @if (in_array($permission->id, $role->permissions->pluck('id')->toArray()))
                            <label for="{{ $permission->id }}" class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" class="hidden checkbox" name="permissions[]"
                                        id="{{ $permission->id }}" value="{{ $permission->id }}" checked>
                                    <div class="block border-[1px] border-white w-14 h-8 rounded-full">
                                    </div>
                                    <div class="absolute w-6 h-6 transition bg-white rounded-full dot left-1 top-1">
                                    </div>
                                </div>
                                <div class="ml-3 font-medium">
                                    <p class="{{ $text_color }}">{{ $permission->category }} > {{ $permission->title }}
                                    </p>
                                    <p class="text-sm text-slate-500">{{ $permission->description }}</p>
                                </div>
                            </label>
                        @else
                            <label for="{{ $permission->id }}" class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" class="hidden checkbox" name="permissions[]"
                                        id="{{ $permission->id }}" value="{{ $permission->id }}">
                                    <div class="block border-[1px] border-white w-14 h-8 rounded-full">
                                    </div>
                                    <div class="absolute w-6 h-6 transition bg-white rounded-full dot left-1 top-1">
                                    </div>
                                </div>
                                <div class="ml-3 font-medium">
                                    <p class="{{ $text_color }}">{{ $permission->category }} > {{ $permission->title }}
                                    </p>
                                    <p class="text-sm text-slate-500">{{ $permission->description }}</p>
                                </div>
                            </label>
                        @endif
                    @endforeach
                </div>
                <div class="mt-4">
                    <button class="w-1/3 mr-5 edit-button-md">Save</button>
                    <a href="{{ route('admin.roles.index') }}" class="w-1/3 delete-button-md">Cancel</a>
                </div>
            </form>


        </div>

    </div>
@endsection

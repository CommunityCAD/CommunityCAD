@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Create Role</h1>
        <p class="text-sm text-white"></p>
    </header>
    <div class="admin-card">

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
                    <label for="{{ $permission->id }}" class="flex items-center cursor-pointer">
                        <div class="relative">
                            <input type="checkbox" class="hidden checkbox" name="permissions[]" id="{{ $permission->id }}"
                                value="{{ $permission->id }}">
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
                @endforeach
            </div>

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 new-button-md">Create</button>
                <a href="{{ route('admin.roles.index') }}" class="w-1/3 delete-button-md">Cancel</a>
            </div>
        </form>
    </div>
@endsection

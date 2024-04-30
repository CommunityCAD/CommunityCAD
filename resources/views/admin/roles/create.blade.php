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
                <label class="block mt-3 text-black-500" for="title">Title</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="title"
                    required type="text" value="{{ old('title') }}" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            @if (get_setting('use_discord_roles', false))
                <div>
                    <label class="block mt-3 text-black-500" for="discord_role_id">Discord Role</label>
                    <select class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" id="discord_role_id"
                        name="discord_role_id">
                        <option value="">-- Choose One --</option>
                        @foreach ($discord_roles as $id => $discord_role)
                            @if ($id != 0 && $discord_role->managed != true)
                                <option @selected(old('discord_role_id') == $discord_role->id) value="{{ $discord_role->id }}">
                                    {{ $discord_role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('discord_role_id')" class="mt-2" />
                </div>
            @endif

            <label class="block mt-3 text-black-500" for="title">Permissions</label>
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
                    <label class="flex items-center cursor-pointer" for="{{ $permission->id }}">
                        <div class="relative">
                            <input class="hidden checkbox" id="{{ $permission->id }}" name="permissions[]" type="checkbox"
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
                <a class="w-1/3 delete-button-md" href="{{ route('admin.roles.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

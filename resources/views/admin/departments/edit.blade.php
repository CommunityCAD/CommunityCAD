@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Edit Department {{ $department->name }}</h1>
        <p class="text-sm text-white">Be careful editing department names and deleteing all togeather. Everyone already in
            this department will be
            grandfathered in to the new one. ie if you change this from PD to SO. Then all the PD members and documents will
            become SO.</p>
    </header>
    <div class="admin-card">
        @can('role_delete')
            <form action="{{ route('admin.department.destroy', $department->slug) }}" class="text-right" method="POST"
                onsubmit="return confirm('Are you sure you wish to delete this department? This can\'t be undone and will delete everything assocaited with this department!');">
                @csrf
                @method('DELETE')
                <button class="delete-button-md">
                    <x-delete-button></x-delete-button>
                </button>
            </form>
        @endcan

        <form action="{{ route('admin.department.update', $department->slug) }}" class="space-y-4" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-black-500" for="name">Name</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="name"
                    required type="text" value="{{ $department->name }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="type">Type</label>
                <select class="select-input" id="type" name="type">
                    <option value="">Choose one</option>
                    <option @selected($department->type == 1) value="1">Law Enforcement</option>
                    <option @selected($department->type == 2) value="2">Dispatch</option>
                    <option @selected($department->type == 3) value="3">Civilian</option>
                    <option @selected($department->type == 4) value="4">Fire/EMS</option>
                    <option @selected($department->type == 5) value="5">Other In-game</option>
                    <option @selected($department->type == 6) value="6">Out of Game</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="initials">Initials</label>
                <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="initials" required
                    type="text" value="{{ $department->initials }}" />
                <x-input-error :messages="$errors->get('initials')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="logo">Logo</label>
                <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="logo" type="url"
                    value="{{ $department->logo }}" />
                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
            </div>

            @if (get_setting('use_discord_department_roles'))
                <div>
                    <p class="block text-black-500">Discord Role</p>
                    <select class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" id="discord_role_id"
                        name="discord_role_id">
                        <option value="">-- Choose One --</option>
                        <option selected value="0">None</option>
                        @foreach ($discord_roles as $id => $discord_role)
                            @if ($id != 0 && $discord_role->managed != true)
                                <option @selected(old('discord_role_id', $department->discord_role_id) == $discord_role->id) value="{{ $discord_role->id }}">
                                    {{ $discord_role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="justify-between space-y-4 md:flex md:space-y-0">

                <label class="flex items-center cursor-pointer" for="is_open_external">
                    <div class="relative">
                        <input @if ($department->is_open_external) checked @endif class="hidden checkbox"
                            id="is_open_external" name="is_open_external" type="checkbox" value="1">
                        <div class="block border-[1px] border-white w-14 h-8 rounded-full">
                        </div>
                        <div class="absolute w-6 h-6 transition bg-white rounded-full dot left-1 top-1">
                        </div>
                    </div>
                    <div class="ml-3 font-medium">
                        <p class="">Open to external applications
                        </p>
                    </div>
                </label>

                <label class="flex items-center cursor-pointer" for="is_open_internal">
                    <div class="relative">
                        <input @if ($department->is_open_internal) checked @endif class="hidden checkbox"
                            id="is_open_internal" name="is_open_internal" type="checkbox" value="1">
                        <div class="block border-[1px] border-white w-14 h-8 rounded-full">
                        </div>
                        <div class="absolute w-6 h-6 transition bg-white rounded-full dot left-1 top-1">
                        </div>
                    </div>
                    <div class="ml-3 font-medium">
                        <p class="">Open to internal applications
                        </p>
                    </div>
                </label>

            </div>

            <div class="mt-4">
                <button class="inline-block w-1/3 mr-5 edit-button-md">Save</button>
                <a class="w-1/3 delete-button-md" href="{{ route('admin.department.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

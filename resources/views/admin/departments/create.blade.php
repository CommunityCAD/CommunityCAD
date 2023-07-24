@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Create Department</h1>
        <p class="text-sm text-white"></p>
    </header>
    <div class="admin-card">

        <form action="{{ route('admin.department.store') }}" class="space-y-4" method="POST">
            @csrf

            <div>
                <label class="block text-black-500" for="name">Name</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="name"
                    required type="text" value="{{ old('name') }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="type">Type</label>
                <select id="type" name="type">
                    <option value="">Choose one</option>
                    <option value="1">Law Enforcement</option>
                    <option value="2">Dispatch</option>
                    <option value="3">Civilian</option>
                    <option value="4">Fire/EMS</option>
                    <option value="5">Other In-game</option>
                    <option value="6">Out of Game</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="initials">Initials</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="initials"
                    required type="text" value="{{ old('initials') }}" />
                <x-input-error :messages="$errors->get('initials')" class="mt-2" />
            </div>

            <div>
                <label class="block text-black-500" for="logo">Logo</label>
                <input autofocus class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="logo"
                    required type="url" value="{{ old('logo') }}" />
                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
            </div>

            <div class="justify-between space-y-4 md:flex md:space-y-0">

                <label class="flex items-center cursor-pointer" for="is_open_external">
                    <div class="relative">
                        <input class="hidden checkbox" id="is_open_external" name="is_open_external" type="checkbox"
                            value="1">
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
                        <input class="hidden checkbox" id="is_open_internal" name="is_open_internal" type="checkbox"
                            value="1">
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
                <button class="inline-block w-1/3 mr-5 new-button-md">Create</button>
                <a class="w-1/3 delete-button-md" href="{{ route('admin.department.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Create Department</h1>
        <p class="text-sm text-white"></p>
    </header>
    <div class="admin-card">

        <form action="{{ route('admin.department.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-black-500">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label for="initials" class="block text-black-500">Initials</label>
                <input type="text" name="initials" value="{{ old('initials') }}" required autofocus
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('initials')" class="mt-2" />
            </div>

            <div>
                <label for="logo" class="block text-black-500">Logo</label>
                <input type="url" name="logo" value="{{ old('logo') }}" required autofocus
                    class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
            </div>

            <div class="justify-between space-y-4 md:flex md:space-y-0">

                <label for="is_open_external" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" class="hidden checkbox" name="is_open_external" id="is_open_external"
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

                <label for="is_open_internal" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" class="hidden checkbox" name="is_open_internal" id="is_open_internal"
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
                <a href="{{ route('admin.department.index') }}" class="w-1/3 delete-button-md">Cancel</a>
            </div>
        </form>
    </div>
@endsection

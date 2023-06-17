@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Edit User Department</h1>
        <p class="text-sm text-white">Edit {{ $user->discord }} for {{ $user_department->name }}</p>
    </header>

    <div class="card">
        <form
            action="{{ route('staff.user_department.destroy', ['user' => $user->id, 'user_department' => $user_department->id]) }}"
            method="POST" class="text-right"
            onsubmit="return confirm('Are you sure you wish to delete this department? This can\'t be undone!');">
            @csrf
            @method('DELETE')
            <button class="delete-button-md">
                <x-delete-button></x-delete-button>
            </button>
        </form>
        <form
            action="{{ route('staff.user_department.update', ['user' => $user->id, 'user_department' => $user_department->id]) }}"
            method="POST" class="flex flex-wrap -mx-4">
            @csrf
            @method('PUT')

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="department_id" class="block mb-3 text-base font-medium text-white">
                        Department
                    </label>
                    <p class="text-white">{{ $user_department->department->name }}</p>
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="badge_number" class="block mb-3 text-base font-medium text-white">
                        Badge Number
                    </label>
                    <div class="relative">
                        <input type="text" value="{{ $user_department->badge_number }}" name="badge_number"
                            class="text-input" required autofocus>
                    </div>
                    <x-input-error :messages="$errors->get('badge_number')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="rank" class="block mb-3 text-base font-medium text-white">
                        Rank
                    </label>
                    <div class="relative">
                        <input type="text" name="rank" class="text-input" value="{{ $user_department->rank }}"
                            required>
                    </div>
                    <x-input-error :messages="$errors->get('rank')" class="mt-2" />

                </div>
            </div>

            <div class="flex flex-wrap w-full mt-3">
                <div class="w-1/3 px-3">
                    <button class="w-full edit-button-md">Save</button>
                </div>
                <div class="w-1/3 px-3">
                    <a href="{{ route('staff.user_department.index', $user->id) }}" class="w-full delete-button-md">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection

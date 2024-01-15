@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Edit User Department</h1>
        <p class="text-sm text-white">Edit {{ $user->discord }} for {{ $user_department->name }}</p>
    </header>

    <div class="card">
        <form
            action="{{ route('staff.user_department.destroy', ['user' => $user->id, 'user_department' => $user_department->id]) }}"
            class="text-right" method="POST"
            onsubmit="return confirm('Are you sure you wish to delete this department? This can\'t be undone!');">
            @csrf
            @method('DELETE')
            <button class="delete-button-md">
                <x-delete-button></x-delete-button>
            </button>
        </form>
        <form
            action="{{ route('staff.user_department.update', ['user' => $user->id, 'user_department' => $user_department->id]) }}"
            class="flex flex-wrap -mx-4" method="POST">
            @csrf
            @method('PUT')

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="department_id">
                        Department
                    </label>
                    <p class="text-white">{{ $user_department->department->name }}</p>
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="badge_number">
                        Call Sign
                    </label>
                    <div class="relative">
                        <input autofocus class="text-input" name="badge_number" required type="text"
                            value="{{ $user_department->badge_number }}">
                    </div>
                    <x-input-error :messages="$errors->get('badge_number')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="rank">
                        Rank
                    </label>
                    <div class="relative">
                        <input class="text-input" name="rank" required type="text"
                            value="{{ $user_department->rank }}">
                    </div>
                    <x-input-error :messages="$errors->get('rank')" class="mt-2" />

                </div>
            </div>

            <div class="flex flex-wrap w-full mt-3">
                <div class="w-1/3 px-3">
                    <button class="w-full edit-button-md">Save</button>
                </div>
                <div class="w-1/3 px-3">
                    <a class="w-full delete-button-md" href="{{ route('staff.user_department.index', $user->id) }}">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection

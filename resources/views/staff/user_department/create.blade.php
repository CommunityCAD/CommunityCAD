@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Add to Department</h1>
        <p class="text-sm text-white">Add {{ $user->preferred_name }} to a Department</p>
    </header>

    <div class="card">
        <form action="{{ route('staff.user_department.store', $user->id) }}" class="flex flex-wrap -mx-4" method="POST">
            @csrf

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="department_id">
                        Department
                    </label>
                    <div class="relative">
                        <select class="select-input" name="department_id">
                            <option value="">Choose one</option>
                            @foreach ($all_departments as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('department_id')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="badge_number">
                        Call Sign
                    </label>
                    <div class="relative">
                        <input autofocus class="text-input" name="badge_number" required type="text">
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
                        <input autofocus class="text-input" name="rank" required type="text">
                    </div>
                    <x-input-error :messages="$errors->get('rank')" class="mt-2" />

                </div>
            </div>

            <div class="flex flex-wrap w-full mt-3">
                <div class="w-1/3 px-3">
                    <button class="w-full new-button-md">Create</button>
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

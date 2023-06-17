@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Add to Department</h1>
        <p class="text-sm text-white">Add {{ $user->discord }} to a Department</p>
    </header>

    <div class="card">
        <form action="{{ route('staff.user_department.store', $user->id) }}" method="POST" class="flex flex-wrap -mx-4">
            @csrf

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="department_id" class="block mb-3 text-base font-medium text-white">
                        Department
                    </label>
                    <div class="relative">
                        <select name="department_id" class="select-input">
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
                    <label for="badge_number" class="block mb-3 text-base font-medium text-white">
                        Badge Number
                    </label>
                    <div class="relative">
                        <input type="text" name="badge_number" class="text-input" required autofocus>
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
                        <input type="text" name="rank" class="text-input" required autofocus>
                    </div>
                    <x-input-error :messages="$errors->get('rank')" class="mt-2" />

                </div>
            </div>

            <div class="flex flex-wrap w-full mt-3">
                <div class="w-1/3 px-3">
                    <button class="w-full new-button-md">Create</button>
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

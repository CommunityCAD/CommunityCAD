@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage {{ $user->discord }}'s Departments</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="card">
        <div class="text-right">
            <a href="{{ route('staff.user_department.create', $user->id) }}" class="new-button-sm">
                <x-new-button></x-new-button>
            </a>
        </div>
        <div class="grid grid-cols-1 gap-5 mt-5 lg:grid-cols-2">
            @foreach ($user_departments as $user_department)
                <div class="pill">
                    <a href="{{ route('staff.user_department.edit', ['user_department' => $user_department->id, 'user' => $user->id]) }}"
                        class="">
                        <div class="flex items-center justify-between ml-3 text-white">
                            <div class="flex items-center">
                                <img src="{{ $user_department->department->logo }}" class="w-20 h-20 mr-4" alt="">
                                <div class="flex">
                                    <div>
                                        <p>{{ $user_department->department->name }}</p>
                                        <p class="-mt-1 text-xs">{{ $user_department->rank }}</p>
                                    </div>

                                </div>
                            </div>
                            <div>
                                {{ $user_department->badge_number }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

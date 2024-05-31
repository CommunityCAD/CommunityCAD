@extends('layouts.portal')
@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">{{ $department->name }} Roster</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="w-full">
        <img alt="" class="mx-auto max-w-72 max-h-96" src="{{ $department->logo }}">
    </div>

    <div class="card">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            @foreach ($roster as $user_department)
                @if ($user_department->officer)
                    <div class="pill">
                        <div class="">
                            @if ($user_department->officer->picture)
                                <img alt="" class="rounded-lg mx-auto"
                                    src="{{ $user_department->officer->picture }}">
                            @else
                                <img alt="" class="rounded-lg mx-auto"
                                    src="{{ $user_department->department->logo }}">
                            @endif

                        </div>
                        <p class="text-center font-bold text-xl">{{ $user_department->officer->formatted_name }}</p>
                        <p class="text-sm">{{ $user_department->badge_number }}</p>
                        <p class="text-sm">{{ $user_department->rank }}</p>
                        @can('user_departments_access')
                            <a class="text-link text-sm text-right"
                                href="{{ route('staff.user_department.edit', [$user_department->user->id, $user_department->id]) }}"><x-edit-button></x-edit-button>
                            </a>
                        @endcan
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

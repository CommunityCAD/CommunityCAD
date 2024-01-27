@extends('layouts.portal')
@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">{{ $department->name }} Roster</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="w-full">
        <img alt="" class="mx-auto max-w-72 max-h-96" src="{{ $department->logo }}">
    </div>

    <div class="border-purple-500 card">
        <div class="flex justify-between">
            <p class="text-purple-600">Active Roster</p>
            <div>
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.881 4.346A23.112 23.112 0 018.25 6H7.5a5.25 5.25 0 00-.88 10.427 21.593 21.593 0 001.378 3.94c.464 1.004 1.674 1.32 2.582.796l.657-.379c.88-.508 1.165-1.592.772-2.468a17.116 17.116 0 01-.628-1.607c1.918.258 3.76.75 5.5 1.446A21.727 21.727 0 0018 11.25c0-2.413-.393-4.735-1.119-6.904zM18.26 3.74a23.22 23.22 0 011.24 7.51 23.22 23.22 0 01-1.24 7.51c-.055.161-.111.322-.17.482a.75.75 0 101.409.516 24.555 24.555 0 001.415-6.43 2.992 2.992 0 00.836-2.078c0-.806-.319-1.54-.836-2.078a24.65 24.65 0 00-1.415-6.43.75.75 0 10-1.409.516c.059.16.116.321.17.483z" />
                </svg>
            </div>
        </div>
        <div class="text-white">
            <table class="w-full">
                <tr>
                    <th class="border">Badge Number</th>
                    <th class="border">Name</th>
                    <th class="border">Officer Name</th>
                    <th class="border">Rank</th>
                </tr>
                @foreach ($roster as $user_department)
                    <tr>
                        <td class="border">{{ $user_department->badge_number }}</td>
                        <td class="border">
                            @can('user_departments_access')
                                <a class="underline hover:text-gray-400"
                                    href="{{ route('staff.user_department.index', [$user_department->user->id]) }}">{{ $user_department->user->preferred_name }}</a>
                            @else
                                {{ $user_department->user->preferred_name }}
                            @endcan
                        </td>
                        <td class="border">{{ $user_department->user->officer_name }}</td>
                        <td class="border">{{ $user_department->rank }}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection

@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">All Applications</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="my-4 space-x-2 space-y-2">
        <a class="inline-block px-3 py-2 text-white rounded-md bg-slate-500"
            href="{{ route('staff.application.index') }}">All</a>
        <a class="inline-block px-3 py-2 text-white bg-yellow-600 rounded-md"
            href="{{ route('staff.application.index', 1) }}">Pending Review</a>
        @can('application_staff_review')
            <a class="inline-block px-3 py-2 text-black bg-yellow-300 rounded-md"
                href="{{ route('staff.application.index', 2) }}">Pending Staff Review</a>
        @endcan
        <a class="inline-block px-3 py-2 text-white bg-blue-600 rounded-md"
            href="{{ route('staff.application.index', 3) }}">Pending Interview</a>
        <a class="inline-block px-3 py-2 text-white bg-green-600 rounded-md"
            href="{{ route('staff.application.index', 4) }}">Approved</a>
        <a class="inline-block px-3 py-2 text-white bg-red-600 rounded-md"
            href="{{ route('staff.application.index', 5) }}">Denied</a>
        <a class="inline-block px-3 py-2 text-white bg-red-600 rounded-md"
            href="{{ route('staff.application.index', 6) }}">Withdrawn</a>
    </div>

    @foreach ($applications as $application)
        @php
            switch ($application->status) {
                case 1:
                    $border_color = 'border-yellow-600';
                    $text_color = 'text-yellow-600';
                    break;
                case 2:
                    $border_color = 'border-yellow-300';
                    $text_color = 'text-yellow-300';
                    break;
                case 3:
                    $border_color = 'border-blue-600';
                    $text_color = 'text-blue-600';
                    break;
                case 4:
                    $border_color = 'border-green-600';
                    $text_color = 'text-green-600';
                    break;
                case 5:
                    $border_color = 'border-red-600';
                    $text_color = 'text-red-600';
                    break;
                case 6:
                    $border_color = 'border-red-600';
                    $text_color = 'text-red-600';
                    break;
            }
        @endphp

        <div class="pill border-l-8 {{ $border_color }}">
            <a href="{{ route('staff.application.show', $application->id) }}">
                <div class="flex justify-between">
                    <p class="{{ $text_color }}">{{ $application->id }} |
                        {{ $application->user->discord }}</p>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd"
                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="">
                    <p class="">Department: {{ $application->department->name }}</p>
                </div>
            </a>
        </div>
    @endforeach
@endsection

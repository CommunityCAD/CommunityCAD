@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">{{ $page_title }}</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="my-4 space-x-2 space-y-2">
        <a class="inline-block px-3 py-2 text-white rounded-md bg-slate-500" href="{{ route('staff.loa.index') }}">All</a>
        <a class="inline-block px-3 py-2 text-white bg-yellow-600 rounded-md"
            href="{{ route('staff.loa.index', 1) }}">Pending</a>
        <a class="inline-block px-3 py-2 text-white bg-green-600 rounded-md"
            href="{{ route('staff.loa.index', 2) }}">Approved</a>
        <a class="inline-block px-3 py-2 text-white bg-red-600 rounded-md"
            href="{{ route('staff.loa.index', 3) }}">Denied</a>
    </div>

    @foreach ($loas as $loa)
        @php
            switch ($loa->status) {
                case 'Pending':
                    $border_color = 'border-yellow-600';
                    $text_color = 'text-yellow-600';
                    break;
                case 'Approved':
                    $border_color = 'border-green-600';
                    $text_color = 'text-green-600';
                    break;
                case 'Denied':
                    $border_color = 'border-red-600';
                    $text_color = 'text-red-600';
                    break;
            }
        @endphp

        <div class="pill border-l-8 {{ $border_color }}">
            <a href="{{ route('staff.loa.show', $loa->id) }}">
                <div class="flex justify-between">
                    <p class="{{ $text_color }}">{{ $loa->id }} |
                        {{ $loa->user->preferred_name }}</p>
                    <div>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path clip-rule="evenodd"
                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                fill-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="">
                    <p class="">Start: {{ $loa->start_date->format('m/d/Y') }}</p>
                    <p class="">End: {{ $loa->end_date->format('m/d/Y') }}</p>
                    <p class="">Reason: {{ $loa->reason }}</p>
                </div>
            </a>
        </div>
    @endforeach
@endsection

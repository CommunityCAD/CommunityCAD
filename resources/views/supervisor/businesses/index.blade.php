@extends('layouts.supervisor')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">{{ $page_title }}</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="my-4 space-x-2 space-y-2">
        <a class="inline-block px-3 py-2 text-white rounded-md bg-slate-500"
            href="{{ route('supervisor.businesses.index') }}">All</a>
        <a class="inline-block px-3 py-2 text-white bg-yellow-600 rounded-md"
            href="{{ route('supervisor.businesses.index', 1) }}">Pending</a>
        <a class="inline-block px-3 py-2 text-white bg-green-600 rounded-md"
            href="{{ route('supervisor.businesses.index', 2) }}">Approved</a>
        <a class="inline-block px-3 py-2 text-white bg-blue-600 rounded-md"
            href="{{ route('supervisor.businesses.index', 4) }}">Suspended</a>
        <a class="inline-block px-3 py-2 text-white bg-red-600 rounded-md"
            href="{{ route('supervisor.businesses.index', 3) }}">Denied</a>
    </div>
    <div class="grid grid-cols-1 mt-5 sm:grid-cols-2">
        @foreach ($businesses as $business)
            @php
                switch ($business->status) {
                    case '1':
                        $border_color = 'border-yellow-600';
                        $text_color = 'text-yellow-600';
                        break;
                    case '2':
                        $border_color = 'border-green-600';
                        $text_color = 'text-green-600';
                        break;
                    case '3':
                        $border_color = 'border-red-600';
                        $text_color = 'text-red-600';
                        break;

                    case '4':
                        $border_color = 'border-blue-600';
                        $text_color = 'text-blue-600';
                        break;
                }
            @endphp

            <div class="pill border-l-4 {{ $border_color }}">
                <a class="flex" href="{{ route('supervisor.businesses.show', $business->id) }}">
                    <div class="h-16 p-2">
                        @if (!is_null($business->logo))
                            <img class="block h-full" src="{{ $business->logo }}">
                        @else
                            <svg class="block h-full" fill="none" stroke-width="1.5" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        @endif
                    </div>
                    <div class="ml-3 text-white">
                        <p>{{ $business->name }}</p>
                        <p>Owner: {{ $business->owner->name }}
                            | ({{ $business->owner->user->preferred_name }})
                        </p>
                    </div>
                    <div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

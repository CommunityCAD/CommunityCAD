@extends('layouts.civilian')

@section('content')
    <div class="card">
        <div class="flex items-center justify-between py-2 border-b-2">
            <h2 class="text-2xl text-white">Your Civilians
                <span class="text-base">
                    ({{ $civilians->count() }}/{{ $current_civilian_level->civilian_limit }})</span>
            </h2>
            @if ($current_civilian_level->civilian_limit > $civilians->count())
                <a class="new-button-sm" href="{{ route('civilian.civilians.create') }}">
                    <x-new-button></x-new-button>
                </a>
            @endif
        </div>
        <div class="space-x-4 space-y-4">
            {{-- <a class="secondary-button-md" href="#">Create 911 Call</a> --}}
        </div>

        <div class="grid grid-cols-1 mt-5 sm:grid-cols-2">
            @foreach ($civilians as $civilian)
                @php
                    switch ($civilian->status) {
                        case 1:
                            $border_color = 'border-green-600';
                            break;

                        case 2:
                            $border_color = 'border-orange-600';
                            break;

                        case 3:
                            $border_color = 'border-red-600';
                            break;

                        case 4:
                            $border_color = 'border-red-600';
                            break;

                        case 5:
                            $border_color = 'border-red-600';
                            break;

                        default:
                            $border_color = 'border-red-600';
                            break;
                    }

                    if ($civilian->is_officer) {
                        $border_color = 'border-blue-600';
                    }
                @endphp
                <div class="pill border-l-4 {{ $border_color }}">
                    <a class="flex justify-between" href="{{ route('civilian.civilians.show', $civilian->id) }}">
                        <div class="h-16 p-2">
                            @if (!is_null($civilian->picture))
                                <img class="block h-full" src="{{ $civilian->picture }}">
                            @else
                                <img class="block h-full"
                                    src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg">
                            @endif
                        </div>
                        <div class="ml-3 text-white">
                            <p>{{ $civilian->first_name }} {{ $civilian->last_name }} - {{ $civilian->status_name }}</p>
                            <p>{{ $civilian->date_of_birth->format('m/d/Y') }} ({{ $civilian->age }})</p>
                            <p>SSN: {{ $civilian->s_n_n }}</p>
                        </div>
                        <div>
                            @if ($civilian->is_officer)
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @endif
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
        <div class="">
            <p class="text-white">Civilian Level: {{ $current_civilian_level->name }}</p>
        </div>
    </div>
@endsection

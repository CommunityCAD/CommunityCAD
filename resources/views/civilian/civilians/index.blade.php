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
                @endphp
                <div class="pill border-l-4 {{ $border_color }}">
                    <a class="flex" href="{{ route('civilian.civilians.show', $civilian->id) }}">
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
                    </a>

                </div>
            @endforeach
        </div>
        <div class="">
            <p class="text-white">Civilian Level: {{ $current_civilian_level->name }}</p>
        </div>
    </div>
@endsection

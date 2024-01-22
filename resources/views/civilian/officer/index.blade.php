@extends('layouts.civilian')

@section('content')
    <div class="card">
        <div class="flex items-center justify-between py-2 border-b-2">
            <h2 class="text-2xl text-white">Your Officers
                <span class="text-base">
                    ({{ $officers->count() }})</span>
            </h2>
            @if (!empty($available_user_departments))
                <a class="new-button-sm" href="{{ route('civilian.officers.create') }}">
                    <x-new-button></x-new-button>
                </a>
            @endif
        </div>
        <div class="space-x-4 space-y-4">
            {{-- <a class="secondary-button-md" href="#">Create 911 Call</a> --}}
        </div>

        <div class="grid grid-cols-1 mt-5 sm:grid-cols-1">
            @foreach ($officers as $officer)
                @php
                    $border_color = 'border-blue-600';
                @endphp
                <div class="pill border-l-4 {{ $border_color }}">
                    <a class="flex justify-between" href="{{ route('civilian.officers.show', $officer->id) }}">
                        <div class="h-32 p-2">
                            @if (!is_null($officer->picture))
                                <img class="block h-full" src="{{ $officer->picture }}">
                            @else
                                <img class="block h-full"
                                    src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg">
                            @endif
                        </div>
                        <div class="ml-3 text-white">
                            <p>{{ $officer->first_name }} {{ $officer->last_name }} - {{ $officer->status_name }}</p>
                            <p>{{ $officer->date_of_birth->format('m/d/Y') }} ({{ $officer->age }})</p>
                            <p>SSN: {{ $officer->s_n_n }}</p>
                            <p>Department: {{ $officer->user_department->department->name }}</p>
                            <p>Callsign: {{ $officer->user_department->badge_number }}</p>
                        </div>
                        <div>
                            <img alt="" class="w-32 h-32" src="{{ $officer->user_department->department->logo }}">
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
        <div class="">
            <p class="text-white"></p>
        </div>
    </div>
@endsection

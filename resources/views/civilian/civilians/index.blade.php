@extends('layouts.civilian')

@section('content')
    <div class="container max-w-4xl p-4 mx-auto mt-2">
        <div class="flex justify-between py-2 border-b-2">
            <h2 class="text-2xl text-white">Your Citizens</h2>
            <a href="{{ route('civilian.civilians.create') }}" class="new-button-sm">
                <x-new-button></x-new-button>
            </a>
        </div>
        <div class="space-x-4 space-y-4">
            <a href="#" class="secondary-button-md">Create Tow
                Call</a>
            <a href="#" class="secondary-button-md">Create
                911
                Call</a>
        </div>

        <div class="grid grid-cols-1 mt-5 sm:grid-cols-2">
            @foreach ($civilians as $civilian)
                <div class="px-3 py-1 m-4 bg-gray-600 cursor-pointer rounded-2xl hover:bg-gray-500">
                    <a href="{{ route('civilian.civilians.show', $civilian->id) }}" class="flex">
                        <div class="h-16 p-2">
                            @if (!is_null($civilian->picture))
                                <img class="block h-full" src="{{ $civilian->picture }}">
                            @else
                                <img class="block h-full"
                                    src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg">
                            @endif
                        </div>
                        <div class="ml-3 text-white">
                            <p>{{ $civilian->first_name }} {{ $civilian->last_name }}</p>
                            <p>{{ $civilian->date_of_birth->format('m/d/Y') }} ({{ $civilian->age }})</p>
                            <p>SSN: {{ $civilian->s_n_n }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

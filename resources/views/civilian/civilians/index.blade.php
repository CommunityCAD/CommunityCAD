@extends('layouts.civilian')

@section('content')
    <div class="container mx-auto max-w-4xl mt-2 p-4">
        <h2 class="text-2xl text-white my-2 border-b-2">Your Citizens</h2>
        <div class="space-x-4 space-y-4">

            <a href="{{ route('civilian.civilians.create') }}"
                class="px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 inline-block">Create
                Civilian</a>
            <a href="#" class="px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 inline-block">Create Tow
                Call</a>
            <a href="#" class="px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 inline-block">Create 911
                Call</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 mt-5">
            @foreach ($civilians as $civilian)
                <div class="bg-gray-700 px-3 py-1 m-4 rounded-2xl hover:bg-gray-600 cursor-pointer">
                    <a href="{{ route('civilian.civilians.show', $civilian->id) }}" class="flex">
                        <div class="p-2 h-16">
                            @if (!is_null($civilian->picture))
                                <img class="block h-full" src="{{ $civilian->picture }}">
                            @else
                                <img class="block h-full"
                                    src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg">
                            @endif
                        </div>
                        <div class="text-white ml-3">
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

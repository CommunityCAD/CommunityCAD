@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">View LOA for {{ $loa->user->preferred_name }}</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <h2 class="text-2xl font-bold dark:text-gray-200">LOA Meta Data</h2>

        <div class="card">
            <div class="">
                <div class="grid text-sm md:grid-cols-2">
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Created At</div>
                        <div class="px-4 py-2">{{ $loa->created_at->format('m/d/Y') }}
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Status</div>
                        <div class="px-4 py-2">{{ $loa->status }}</div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-bold dark:text-gray-200">LOA Information</h2>

        <div class="card">
            <div class="">
                <div class="w-full">
                    <label class="block mt-3 font-bold" for="department_id">Start Date:</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $loa->start_date->format('m/d/Y') }}</p>
                </div>

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="why_join_department">End Date: </label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $loa->end_date->format('m/d/Y') }}</p>
                </div>

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="experience_department">Reason: </label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $loa->reason }}</p>
                </div>

            </div>
        </div>

        <h2 class="text-2xl font-bold dark:text-gray-200">LOA Options</h2>

        <div class="card">
            <div class="">
                <div class="space-y-4">
                    @can('loa_manage')
                        @switch($loa->status)
                            @case('Pending')
                                <a class="new-button-md" href="{{ route('staff.loa.approve', $loa->id) }}">
                                    Approve LOA
                                </a>
                                <a class="delete-button-md" href="{{ route('staff.loa.deny', $loa->id) }}">
                                    Deny LOA
                                </a>
                            @break

                            @default
                                <p class="pl-3 text-lg text-white">You have no options here.</p>
                        @endswitch
                    @endcan

                    @cannot('loa_manage')
                        <p class="pl-3 text-lg text-white">You do not have permission to action applications.</p>
                    @endcannot
                </div>
            </div>
        </div>
        <h2 class="text-2xl font-bold dark:text-gray-200">Comments</h2>

        <div class="card">
            <div class="">
                @foreach ($histories as $history)
                    <div class="p-3 my-2 border-2 border-gray-900">
                        <p class="text-white">Actioned by: {{ $history->user->preferred_name }} at
                            {{ $history->created_at->format('m/d/Y H:i:s') }}
                        </p>
                        <div>
                            <p class="text-gray-400">{{ $history->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

@extends('layouts.supervisor')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Review business for {{ $business->name }}</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="lg:flex pt-5 pb-5">
        <div class="card lg:w-1/3 w-full">
            <div class="text-center pb-3">
                <h2 class="text-3xl font-semibold">{{ $business->name }}</h2>
                <img alt="" class="w-32 h-32 mx-auto rounded-full" src="{{ $business->logo }}">
                <p>{{ $business->about }}</p>
            </div>
            <hr>
            <ul class="px-3 py-2 mt-3 divide-y">
                <li class="py-3">
                    <p class="font-semibold text-lg">Owner</p>
                    @if ($business->owner->picture)
                        <img alt="" class="w-24 h-24 mx-auto rounded-full" src="{{ $business->owner->picture }}">
                    @else
                        <svg class="w-24 h-24 mx-auto rounded-full" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    @endif

                    <h2 class="text-xl font-semibold text-center">{{ $business->owner->name }}</h2>

                </li>

                <li class="py-3">
                    <p class="font-semibold text-lg">Founded</p>
                    <p class="ml-auto text-sm">
                        {{ $business->created_at->format('M d, Y') }}
                    </p>
                </li>
            </ul>
        </div>
        <div class="w-full lg:w-2/3">
            <div class="card w-full">
                <div class="flex justify-between">
                    <h2 class="mb-4 text-xl font-semibold underline">Employees</h2>
                </div>
                <div class="grid grid-cols-1 gap-4 text-sm xl:grid-cols-3">
                    @foreach ($business->employees as $employee)
                        <div class="border p-2">
                            @if ($employee->civilian->picture)
                                <img alt="" class="w-24 h-24 mx-auto rounded-full"
                                    src="{{ $employee->civilian->picture }}">
                            @else
                                <svg class="w-24 h-24 mx-auto rounded-full" fill="none" stroke-width="1.5"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @endif

                            <p class="text-xl font-semibold text-center">{{ $employee->civilian->name }}</p>
                            <p>{{ $employee->role_name }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>

    <div class="card">
        <h2 class="text-2xl font-bold dark:text-gray-200">Options</h2>
        <div class="">
            <div class="space-y-4">
                @can('business_manage')
                    @switch($business->status)
                        @case('1')
                            <a class="new-button-md" href="{{ route('supervisor.businesses.approve', $business->id) }}">
                                Approve
                            </a>
                            <a class="delete-button-md" href="{{ route('supervisor.businesses.deny', $business->id) }}">
                                Deny
                            </a>
                        @break

                        @case('2')
                            <a class="delete-button-md" href="{{ route('supervisor.businesses.suspend', $business->id) }}">
                                Suspend
                            </a>
                        @break

                        @case('3')
                            <a class="new-button-md" href="{{ route('supervisor.businesses.approve', $business->id) }}">
                                Reinstate
                            </a>
                        @break

                        @case('4')
                            <a class="new-button-md" href="{{ route('supervisor.businesses.approve', $business->id) }}">
                                Reinstate
                            </a>
                        @break

                        @default
                            <p class="pl-3 text-lg text-white">You have no options here.</p>
                    @endswitch
                    <a class="delete-button-md" href="{{ route('supervisor.businesses.destroy', $business->id) }}">
                        Delete
                    </a>
                @endcan
            </div>
        </div>
    </div>
@endsection

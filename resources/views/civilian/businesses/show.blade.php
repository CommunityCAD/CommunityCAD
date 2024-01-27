@extends('layouts.civilian')

@section('content')
    <div x-data="">

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
                            <img alt="" class="w-24 h-24 mx-auto rounded-full"
                                src="{{ $business->owner->picture }}">
                        @else
                            <svg class="w-24 h-24 mx-auto rounded-full" fill="none" stroke-width="1.5"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        @endif

                        <h2 class="text-xl font-semibold text-center">{{ $business->owner->name }}</h2>

                    </li>

                    <li class="py-3">
                        <p class="font-semibold text-lg">Created at</p>
                        <p class="ml-auto text-sm">
                            {{ $business->created_at->format('M d, Y') }}
                        </p>
                    </li>
                </ul>
            </div>
            <div class="w-full lg:w-2/3">
                <div class="card w-full">
                    <h2 class="mb-4 text-xl font-semibold underline">Employees</h2>

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

                <div class="card w-full">
                    <h2 class="mb-4 text-xl font-semibold underline">Vehicles</h2>
                    @forelse($business->vehicles as $vehicle)
                        <?php
                        $status = $vehicle->status_name;
                        $status_color = 'text-green-400';
                        $reregister = false;
                        $transfer = false;
                        $delete = true;
                        $stolen = true;
                        $found = false;
                        $expire = true;
                        
                        if ($vehicle->registration_expire < date('Y-m-d')) {
                            $status = 'Expired';
                            $status_color = 'text-yellow-400';
                            $reregister = true;
                            $transfer = false;
                            $delete = false;
                            $expire = false;
                        }
                        
                        if ($vehicle->status_name == 'Stolen') {
                            $status = 'Stolen';
                            $status_color = 'text-yellow-400';
                            $reregister = false;
                            $transfer = false;
                            $delete = false;
                            $stolen = false;
                            $found = true;
                            $expire = false;
                        }
                        
                        if ($vehicle->status_name == 'Impounded' || $vehicle->status_name == 'Booted') {
                            $status = $vehicle->status_name;
                            $status_color = 'text-red-400';
                            $reregister = false;
                            $transfer = false;
                            $delete = false;
                            $stolen = false;
                            $expire = false;
                        }
                        ?>
                        <div class="flex items-center p-2 space-x-2">
                            {{-- @if ($reregister)
                                    <a class="new-button-sm"
                                        href="{{ route('civilian.vehicle.renew', ['vehicle' => $vehicle->id, 'civilian' => $civilian->id]) }}"
                                        title="Reregister vehicle">
                                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                @endif

                                @if ($transfer)
                                    <a class="text-white bg-purple-500 button-sm hover:bg-purple-400"
                                        href="{{ route('civilian.vehicle.renew', ['vehicle' => $vehicle->id, 'civilian' => $civilian->id]) }}"
                                        title="Set as expired">
                                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                @endif

                                @if ($found)
                                    <a class="text-white bg-purple-500 button-sm hover:bg-purple-400"
                                        href="{{ route('civilian.vehicle.found', ['vehicle' => $vehicle->id, 'civilian' => $civilian->id]) }}"
                                        title="Set as not stolen">
                                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                @endif

                                @if ($expire)
                                    <a class="text-white bg-red-500 button-sm hover:bg-red-400"
                                        href="{{ route('civilian.vehicle.expire', ['vehicle' => $vehicle->id, 'civilian' => $civilian->id]) }}"
                                        title="Set as expired">
                                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </a>
                                @endif

                                @if ($stolen)
                                    <a class="text-white bg-orange-500 button-sm hover:bg-orange-400"
                                        href="{{ route('civilian.vehicle.stolen', ['vehicle' => $vehicle->id, 'civilian' => $civilian->id]) }}"
                                        title="Set as stolen">
                                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </a>
                                @endif

                                @if ($delete)
                                    <form
                                        action="{{ route('civilian.vehicle.destroy', ['civilian' => $civilian->id, 'vehicle' => $vehicle->id]) }}"
                                        class="mr-2" method="POST"
                                        onsubmit="return confirm('Are you sure you wish to delete this vehicle? This can\'t be undone!');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-button-sm" title="Delete vehicle">
                                            <x-delete-button></x-delete-button>
                                        </button>
                                    </form>
                                @endif --}}

                            <p class="{{ $status_color }}">{{ $vehicle->plate }} | {{ $vehicle->model }} |
                                {{ $status }} | Expires: {{ $vehicle->registration_expire->format('m/d/Y') }}
                            </p>

                        </div>
                    @empty
                        <p class="text-white">No Vehicles</p>
                    @endforelse

                </div>

            </div>
        </div>
    </div>
@endsection

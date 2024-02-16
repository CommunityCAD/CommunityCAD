@extends('layouts.civilian')

@section('content')
    <div class="card">
        <div class="grid md:grid-cols-3 grid-cols-1">
            <a href="{{ route('civilian.civilians.index') }}">
                <div class="pill flex items-center hover:bg-opacity-75">
                    <svg class="w-12 h-12" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="ml-4">View Civilians</p>
                </div>
            </a>

            <a href="{{ route('civilian.civilians.index') }}">
                <div class="pill flex items-center hover:bg-opacity-75">
                    <svg class="w-12 h-12" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="ml-4">View Businesses</p>
                </div>
            </a>

            <a href="{{ route('civilian.civilians.create') }}">
                <div class="pill flex items-center hover:bg-opacity-75">
                    <svg class="w-12 h-12" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="ml-4">New Civilian</p>
                </div>
            </a>

            <a href="{{ route('courthouse.home') }}">
                <div class="pill flex items-center hover:bg-opacity-75">
                    <svg class="w-12 h-12" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="ml-4">Courthouse</p>
                </div>
            </a>
        </div>
    </div>

    <div class="card">
        <h1 class="text-center text-xl text-white">Active Tickets</h1>

        @foreach ($civilians as $civilian)
            @if ($civilian->tickets->count() > 0)
                <h3 class="text-lg text-white">{{ $civilian->name }}'s Tickets/Arrests {{ $civilian->tickets->count() }}
                </h3>
            @endif

            @foreach ($civilian->tickets as $ticket)
                @if ($ticket->plea_type == 0)
                    <div class="flex items-center p-2 space-x-2">
                        @php
                            if ($ticket->type_id == 1) {
                                $type = 'Warning';
                                $text_color = 'text-yellow-500';
                            } elseif ($ticket->type_id == 2) {
                                $type = 'Ticket';
                                $text_color = 'text-orange-500';
                            } elseif ($ticket->type_id == 3) {
                                $type = 'Arrest';
                                $text_color = 'text-red-500';
                            }
                        @endphp

                        {{-- @if ($ticket->plea_type == 0)
                            <a class="new-button-sm" href="{{ route('civilian.civlian.plea.guilty', $ticket->id) }}"
                                title="Plea Guilty">
                                <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>

                            <a class="delete-button-sm" href="{{ route('civilian.civlian.plea.not_guilty', $ticket->id) }}"
                                title="Plea Not-Guilty">
                                <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        @endif --}}

                        {{-- <a class="button-sm bg-indigo-700 hover:bg-indigo-600" href="#"
                                title="File For Expungement">
                                <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a> --}}

                        <a class="block {{ $text_color }}"
                            href="{{ route('civilian.civilians.show', $civilian->id) }}">({{ $ticket->id }})
                            {{ $type }} on {{ $ticket->offense_occured_at->format('m/d/Y H:i') }} at
                            {{ $ticket->location_of_offense }} <span class="block ml-5">Offense(s)
                                @foreach ($ticket->charges as $charge)
                                    @if (!$loop->last)
                                        {{ $charge->penal_code->name }},
                                    @else
                                        {{ $charge->penal_code->name }}
                                    @endif
                                @endforeach
                            </span>
                        </a>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
@endsection

@extends('layouts.cad')

@section('content')
    <div class="card !max-w-6xl">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl flex items-center">
                <svg class="w-10 h-10" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="ml-3">Name: {{ $civilian->last_name }}, {{ $civilian->first_name }}</span>
            </h2>

            <div class="flex space-x-2">
                @if ($civilian->status == 2)
                    <span class="text-red-700">Active Warrent</span>
                @endif
                @if ($civilian->is_violent)
                    <span class="text-red-700">History of Violence</span>
                @endif
                @if ($civilian->is_weapon)
                    <span class="text-red-700">History of Weapons</span>
                @endif
                @if ($civilian->is_ill)
                    <span class="text-red-700">History of Mental Illness</span>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-4 gap-2 border-2 mt-3">
            <div class="col-span-2 border-r-2 p-2">
                <div class="flex">
                    <div class="">
                        <p class="font-bold">Address:</p>
                        <p class="font-bold">Driver License:</p>
                        <p class="font-bold">Social Security:</p>
                        <p class="font-bold">Phone:</p>
                        <p class="font-bold">Type:</p>
                        <p class="font-bold">Occupation:</p>
                    </div>
                    <div class="ml-3">
                        <p>{{ $civilian->postal }} {{ $civilian->street }} {{ $civilian->city }}</p>
                        <p>12345</p>
                        <p>{{ $civilian->s_n_n }}</p>
                        <p>123-345-9834</p>
                        <p>INDIV - Individual</p>
                        <p>{{ $civilian->occupation }}</p>
                    </div>
                </div>
            </div>
            <div class="border-r-2 p-2">
                <div class="flex">
                    <div class="">
                        <p class="font-bold">Age:</p>
                        <p class="font-bold">Birth:</p>
                        <p class="font-bold">Race:</p>
                        <p class="font-bold">Sex:</p>
                        <p class="font-bold">Height:</p>
                        <p class="font-bold">Weight:</p>
                    </div>
                    <div class="ml-3">
                        <p>{{ $civilian->age }}</p>
                        <p>{{ $civilian->date_of_birth->format('m/d/Y') }}</p>
                        <p>{{ $civilian->race }}</p>
                        <p>{{ $civilian->gender }}</p>
                        <p>{{ floor($civilian->height / 12) }}'
                            {{ $civilian->height % 12 }}"
                            ({{ round($civilian->height * 2.54) }}cm)</p>
                        <p>{{ $civilian->weight }}lb
                            ({{ round($civilian->weight / 2.205) }}kg)</p>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <img alt="" src="{{ $civilian->picture }}">
            </div>
        </div>
        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
            <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                <span>Alerts
                    <div class="space-x-2 inline-block">
                        @if ($civilian->status == 2)
                            <span class="text-red-700">Active Warrent</span>
                        @endif
                        @if ($civilian->is_violent)
                            <span class="text-red-700">History of Violence</span>
                        @endif
                        @if ($civilian->is_weapon)
                            <span class="text-red-700">History of Weapons</span>
                        @endif
                        @if ($civilian->is_ill)
                            <span class="text-red-700">History of Mental Illness</span>
                        @endif
                    </div>
                </span>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == false" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == true" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 15.75l7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </h3>
            <div class="" x-show="isOpen">
                <div class="ml-3 text-red-700">
                    @if ($civilian->status == 2)
                        <p class="text-red-700">Active Warrent</p>
                    @endif
                    @if ($civilian->is_violent)
                        <p class="text-red-700">History of Violence</p>
                    @endif
                    @if ($civilian->is_weapon)
                        <p class="text-red-700">History of Weapons</p>
                    @endif
                    @if ($civilian->is_ill)
                        <p class="text-red-700">History of Mental Illness</p>
                    @endif
                </div>
                <div class="mt-3 border-t">
                    <form action="{{ route('cad.name.update_alerts', $civilian->id) }}" method="POST">
                        @csrf
                        <label for="is_violent"><input @checked($civilian->is_violent) id="is_violent" name="is_violent"
                                type="checkbox"> Flag for
                            Violence</label>
                        <label for="is_weapon"><input @checked($civilian->is_weapon) id="is_weapon" name="is_weapon"
                                type="checkbox"> Flag for
                            Weapons</label>
                        <label for="is_ill"><input @checked($civilian->is_ill) id="is_ill" name="is_ill"
                                type="checkbox"> Flag for Mental
                            Illness</label>
                        <button class="button-sm bg-blue-700 hover:bg-blue-600" type="submit" value="">Save
                            Alerts</button>
                    </form>

                </div>
            </div>
        </div>
        {{-- <div class="border-b-2 border-x-2 w-full p-2">
            <h3 class="text-lg flex justify-between items-center">
                <span>Name History</span>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </h3>
        </div> --}}
        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
            <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                <span>Licenses
                    @php
                        $active = 0;
                        $expired = 0;
                        $suspended = 0;
                    @endphp
                    @foreach ($civilian->licenses as $license)
                        <?php
                        if ($license->expires_on < date('Y-m-d')) {
                            $expired++;
                        } elseif ($license->status_name == 'Revoked' || $license->status_name == 'Suspended') {
                            $suspended++;
                        } else {
                            $active++;
                        }
                        ?>
                    @endforeach
                    <span class="text-green-700">{{ $active }} Current</span>
                    <span class="text-yellow-700">{{ $suspended }} Suspended</span>
                    <span class="text-red-700">{{ $expired }} Expired</span>
                </span>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == false" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == true" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 15.75l7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </h3>
            <div class="" x-show="isOpen">
                <div class="ml-3">
                    @foreach ($civilian->licenses as $license)
                        <?php
                        $status = $license->status_name;
                        $status_color = 'text-green-700';
                        
                        if ($license->expires_on < date('Y-m-d')) {
                            $status = 'Expired';
                            $status_color = 'text-yellow-700';
                        }
                        
                        if ($license->status_name == 'Revoked' || $license->status_name == 'Suspended') {
                            $status = $license->status_name;
                            $status_color = 'text-red-700';
                        }
                        ?>
                        <p class="{{ $status_color }}">{{ $license->license_type->name }} | {{ $license->id }} |
                            {{ $status }} | Expires: {{ $license->expires_on->format('m/d/Y') }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
            <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                <span>Vehicles
                    @php
                        $active = 0;
                        $expired = 0;
                        $impounded = 0;
                        $stolen = 0;
                    @endphp
                    @foreach ($civilian->vehicles as $vehicle)
                        <?php
                        if ($vehicle->registration_expire < date('Y-m-d')) {
                            $expired++;
                        } elseif ($vehicle->status_name == 'Impounded' || $vehicle->status_name == 'Booted') {
                            $impounded++;
                        } elseif ($vehicle->status_name == 'Stolen') {
                            $stolen++;
                        } else {
                            $active++;
                        }
                        ?>
                    @endforeach
                    <span class="text-green-700">{{ $active }} Current</span>
                    <span class="text-yellow-700">{{ $impounded }} Suspended</span>
                    <span class="text-yellow-700">{{ $stolen }} Stolen</span>
                    <span class="text-red-700">{{ $expired }} Expired</span>
                </span>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == false" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == true" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 15.75l7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </h3>
            <div class="mt-3" x-show="isOpen">
                <div class="ml-3">
                    @foreach ($civilian->vehicles as $vehicle)
                        <?php
                        $status = $vehicle->status_name;
                        $status_color = 'text-green-700';
                        
                        if ($vehicle->registration_expire < date('Y-m-d')) {
                            $status = 'Expired';
                            $status_color = 'text-yellow-700';
                        }
                        
                        if ($vehicle->status_name == 'Revoked' || $vehicle->status_name == 'Suspended') {
                            $status = $vehicle->status_name;
                            $status_color = 'text-red-700';
                        }
                        ?>
                        <p>
                            <a class="{{ $status_color }} inline-flex items-center"
                                href="{{ route('cad.vehicle.return', $vehicle->plate) }}" target="_blank">
                                {{ $vehicle->plate }} | {{ $vehicle->color }} {{ $vehicle->model }} |
                                {{ $status }} | Expires:
                                {{ $vehicle->registration_expire->format('m/d/Y') }}
                                <svg class="w-4 h-4 text-blue-700 ml-2" fill="none" stroke-width="1.5"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
            <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                <span>Medical
                    @php
                        $allergies = 0;
                        $conditions = 0;
                        $other = 0;
                    @endphp
                    @foreach ($civilian->medical_records as $record)
                        <?php
                        if ($record->name == 'Allergy') {
                            $allergies++;
                        } elseif ($record->name == 'Health Conditions') {
                            $conditions++;
                        } else {
                            $other++;
                        }
                        ?>
                    @endforeach
                    <span class="text-yellow-700">
                        {{ $allergies }}
                        @if ($allergies == 1)
                            Allergy
                        @else
                            Allergies
                        @endif
                    </span>
                    <span class="text-yellow-700">{{ $conditions }} Health Conditions</span>
                    <span class="text-yellow-700">{{ $other }} Other</span>
                </span>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == false" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == true" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 15.75l7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </h3>
            <div class="mt-3" x-show="isOpen">
                <div class="ml-3">
                    @foreach ($civilian->medical_records as $record)
                        <?php
                        $status = $record->status_name;
                        $status_color = 'text-yellow-700';
                        ?>
                        <p class="{{ $status_color }}" href="#">
                            <span class="font-bold">{{ $record->name }}:</span>
                            {{ $record->value }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
            <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                <span>Firearms
                    @php
                        $owned = $civilian->weapons->count();
                    @endphp
                    <span class="text-yellow-700">{{ $owned }} Owned</span>
                </span>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == false" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == true" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 15.75l7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </h3>
            <div class="mt-3" x-show="isOpen">
                <div class="ml-3">
                    @foreach ($civilian->weapons as $weapon)
                        <?php
                        $status = $weapon->status_name;
                        $status_color = 'text-yellow-700';
                        ?>
                        <p class="{{ $status_color }}" href="#">
                            <span class="font-bold">{{ $weapon->model }}:</span>
                            {{ $weapon->serial_number }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
            <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                <span>Involvements
                    @php
                        $warning = 0;
                        $tickets = 0;
                        $arrests = 0;

                        $rp = 0;
                        $witness = 0;
                        $suspect = 0;
                    @endphp
                    @foreach ($civilian->tickets as $ticket)
                        <?php
                        if ($ticket->type_id == 1) {
                            $warning++;
                        } elseif ($ticket->type_id == 2) {
                            $tickets++;
                        } elseif ($ticket->type_id == 3) {
                            $arrests++;
                        }
                        ?>
                    @endforeach
                    <span class="text-green-700">{{ $warning }} Warnings</span>
                    <span class="text-yellow-700">{{ $tickets }} Tickets</span>
                    <span class="text-red-700">{{ $arrests }} Arrests</span>
                </span>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == false" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    x-show="isOpen == true" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 15.75l7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </h3>
            <div class="mt-3" x-show="isOpen">
                <div class="ml-3">
                    @forelse($civilian->tickets as $ticket)
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

                            <a class="block {{ $text_color }}" href="#"
                                onclick="openExternalWindow('{{ route('cad.ticket.show', $ticket->id) }}')">({{ $ticket->id }})
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
                        <hr>
                    @empty
                        <p class="">No Involvements</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="border-b-2 border-x-2 w-full p-2">
            <h3 class="text-lg flex justify-between items-center">
                <span>Notes</span>
                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </h3>
        </div>
        <div class="mt-3 text-center">
            <a class="new-button-md" href="{{ route('cad.name.search') }}">Search More</a>
            <a class="edit-button-md" href="{{ route('cad.name.return', $civilian->id) }}">Refresh Data</a>
            <a class="secondary-button-md" href="{{ route('cad.name.return', $civilian->id) }}">New Ticket</a>
        </div>
    </div>
@endsection

@extends('layouts.cad')

@section('content')
    @include('inc.cad.header')
    <div class="card !max-w-6xl">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl flex items-center">
                <svg class="w-10 h-10" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="ml-3">Plate: {{ $vehicle->plate }}</span>
            </h2>

            <div class="flex space-x-2">
            </div>
        </div>

        <div class="grid grid-cols-4 gap-2 border-2 mt-3">
            <div class="border-r-2 p-2">
                <div class="flex">
                    <div class="">
                        <p class="font-bold">Plate:</p>
                        <p class="font-bold">Make:</p>
                        <p class="font-bold">Color:</p>
                    </div>
                    <div class="ml-3">
                        <p>{{ $vehicle->plate }}</p>
                        <p>{{ $vehicle->model }}</p>
                        <p>{{ $vehicle->color }}</p>
                    </div>
                </div>
            </div>
            <div class="border-r-2 p-2 col-span-2">
                <div class="flex">
                    <div class="">
                        <p class="font-bold">Registration Expires:</p>
                        <p class="font-bold">Status:</p>
                        <p class="font-bold">Registered Owner:</p>

                    </div>
                    <div class="ml-3">
                        <p>{{ $vehicle->registration_expire->format('m/d/Y') }}</p>
                        <p>{{ $vehicle->status_name }}</p>
                        @if ($vehicle->civilian)
                            {{ $vehicle->civilian->name }} ({{ $vehicle->civilian->s_n_n }})
                        @elseif ($vehicle->business)
                            {{ $vehicle->business->name }} <span class="text-blue-600">(BUSSINESS VEHICLE)</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="p-2">
                <img alt="" src="{{ $vehicle->picture }}">
            </div>
        </div>
        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
            <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                <span>Alerts
                    @if ($vehicle->business)
                        <span class="ml-3 text-blue-600">
                            Advise
                        </span>
                    @endif
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
                @if ($vehicle->business)
                    <div class="ml-3 text-blue-600">
                        <p>Registered to a Business</p>
                    </div>
                @endif
            </div>
        </div>
        @if ($vehicle->civilian)
            <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
                <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                    <span>Registered Owner
                        <div class="space-x-2 inline-block">
                            @if ($vehicle->civilian->status == 2)
                                <span class="text-red-700">Active Warrent</span>
                            @endif
                            @if ($vehicle->civilian->is_violent)
                                <span class="text-red-700">History of Violence</span>
                            @endif
                            @if ($vehicle->civilian->is_weapon)
                                <span class="text-red-700">History of Weapons</span>
                            @endif
                            @if ($vehicle->civilian->is_ill)
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
                    <div class="ml-3 mb-4">

                        <div class="flex justify-between items-center">
                            <a class="text-2xl flex items-center"
                                href="{{ route('cad.name.return', $vehicle->civilian->id) }}" target="_blank">
                                <svg class="w-10 h-10" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <span class="ml-3">Name: {{ $vehicle->civilian->last_name }},
                                    {{ $vehicle->civilian->first_name }}</span>

                                <svg class="w-8 h-8 text-blue-700 ml-2" fill="none" stroke-width="1.5"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
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
                                        <p>{{ $vehicle->civilian->postal }} {{ $vehicle->civilian->street }}
                                            {{ $vehicle->civilian->city }}</p>
                                        <p>12345</p>
                                        <p>{{ $vehicle->civilian->s_n_n }}</p>
                                        <p>123-345-9834</p>
                                        <p>INDIV - Individual</p>
                                        <p>{{ $vehicle->civilian->occupation }}</p>
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
                                        <p>{{ $vehicle->civilian->age }}</p>
                                        <p>{{ $vehicle->civilian->date_of_birth->format('m/d/Y') }}</p>
                                        <p>{{ $vehicle->civilian->race }}</p>
                                        <p>{{ $vehicle->civilian->gender }}</p>
                                        <p>{{ floor($vehicle->civilian->height / 12) }}'
                                            {{ $vehicle->civilian->height % 12 }}"
                                            ({{ round($vehicle->civilian->height * 2.54) }}cm)</p>
                                        <p>{{ $vehicle->civilian->weight }}lb
                                            ({{ round($vehicle->civilian->weight / 2.205) }}kg)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <img alt="" src="{{ $vehicle->civilian->picture }}">
                            </div>
                        </div>
                        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
                            <h3 @click="isOpen = !isOpen"
                                class="text-lg flex justify-between items-center cursor-pointer">
                                <span>Alerts
                                    <div class="space-x-2 inline-block">
                                        @if ($vehicle->civilian->status == 2)
                                            <span class="text-red-700">Active Warrent</span>
                                        @endif
                                        @if ($vehicle->civilian->is_violent)
                                            <span class="text-red-700">History of Violence</span>
                                        @endif
                                        @if ($vehicle->civilian->is_weapon)
                                            <span class="text-red-700">History of Weapons</span>
                                        @endif
                                        @if ($vehicle->civilian->is_ill)
                                            <span class="text-red-700">History of Mental Illness</span>
                                        @endif
                                    </div>
                                </span>
                                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" x-show="isOpen == false" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" x-show="isOpen == true" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.5 15.75l7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </h3>
                            <div class="" x-show="isOpen">
                                <div class="ml-3 text-red-700">
                                    @if ($vehicle->civilian->status == 2)
                                        <p class="text-red-700">Active Warrent</p>
                                    @endif
                                    @if ($vehicle->civilian->is_violent)
                                        <p class="text-red-700">History of Violence</p>
                                    @endif
                                    @if ($vehicle->civilian->is_weapon)
                                        <p class="text-red-700">History of Weapons</p>
                                    @endif
                                    @if ($vehicle->civilian->is_ill)
                                        <p class="text-red-700">History of Mental Illness</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
                            <h3 @click="isOpen = !isOpen"
                                class="text-lg flex justify-between items-center cursor-pointer">
                                <span>Licenses
                                    @php
                                        $active = 0;
                                        $expired = 0;
                                        $suspended = 0;
                                    @endphp
                                    @foreach ($vehicle->civilian->licenses as $license)
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
                                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" x-show="isOpen == false" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" x-show="isOpen == true" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.5 15.75l7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </h3>
                            <div class="" x-show="isOpen">
                                <div class="ml-3">
                                    @foreach ($vehicle->civilian->licenses as $license)
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
                                        <p class="{{ $status_color }}">{{ $license->license_type->name }} |
                                            {{ $license->id }} |
                                            {{ $status }} | Expires: {{ $license->expires_on->format('m/d/Y') }}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
                            <h3 @click="isOpen = !isOpen"
                                class="text-lg flex justify-between items-center cursor-pointer">
                                <span>Vehicles
                                    @php
                                        $active = 0;
                                        $expired = 0;
                                        $impounded = 0;
                                        $stolen = 0;
                                    @endphp
                                    @foreach ($vehicle->civilian->vehicles as $vehicle)
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
                                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" x-show="isOpen == false" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" x-show="isOpen == true" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.5 15.75l7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </h3>
                            <div class="mt-3" x-show="isOpen">
                                <div class="ml-3">
                                    @foreach ($vehicle->civilian->vehicles as $vehicle)
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
                                                href="{{ route('cad.vehicle.return', $vehicle->plate) }}"
                                                target="_blank">
                                                {{ $vehicle->plate }} | {{ $vehicle->color }} {{ $vehicle->model }} |
                                                {{ $status }} |
                                                Expires:
                                                {{ $vehicle->registration_expire->format('m/d/Y') }}
                                                <svg class="w-4 h-4 text-blue-700 ml-2" fill="none" stroke-width="1.5"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
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

                    </div>
                </div>
            </div>
        @endif
        <div class="mt-3 text-center">
            <a class="new-button-md" href="{{ route('cad.vehicle.search') }}">Search More</a>
            <a class="edit-button-md" href="{{ route('cad.vehicle.return', $vehicle->plate) }}">Refresh Data</a>
        </div>
    </div>
@endsection

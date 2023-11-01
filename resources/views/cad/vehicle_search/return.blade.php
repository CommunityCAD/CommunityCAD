@extends('layouts.cad')

@section('content')
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
                <p class="text-red-700">Arrest Warrant |</p>
                <p class="text-red-700">Armed & Dangerous</p>
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
                    </div>
                    <div class="ml-3">
                        <p>{{ $vehicle->registration_expire->format('m/d/Y') }}</p>
                        <p>{{ $vehicle->status_name }}</p>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <img alt="" src="{{ $vehicle->picture }}">
            </div>
        </div>
        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
            <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                <span>Alerts <span class="text-red-700">Active Warrant|Armed & Dangerous</span></span>
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
                    <p>Active Warrant</p>
                    <p>Armed & Dangerous</p>
                    <p>Something else</p>
                </div>
                <div class="mt-3">
                    <a class="edit-button-sm" href="#">Edit Alerts</a>
                </div>
            </div>
        </div>

        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
            <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                <span>Registered Owner
                    <span class="text-green-700">1 Current Owner</span>

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
                    <p>
                        <a class="inline-flex items-center text-green-700"
                            href="{{ route('cad.name.return', $vehicle->civilian->id) }}" target="_blank">
                            {{ $vehicle->civilian->name }} | {{ $vehicle->civilian->s_n_n }}
                            <svg class="w-4 h-4 text-blue-700 ml-2" fill="none" stroke-width="1.5" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="border-b-2 border-x-2 w-full p-2 select-none" x-data="{ isOpen: false }">
            <h3 @click="isOpen = !isOpen" class="text-lg flex justify-between items-center cursor-pointer">
                <span>Previous Owners
                    <span class="text-green-700">0 Previous Owners</span>
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
            <a class="new-button-md" href="{{ route('cad.vehicle.search') }}">Search More</a>
            <a class="edit-button-md" href="{{ route('cad.vehicle.return', $vehicle->plate) }}">Refresh Data</a>
            <a class="secondary-button-md" href="{{ route('cad.vehicle.return', $vehicle->plate) }}">New Ticket</a>
        </div>
    </div>
@endsection

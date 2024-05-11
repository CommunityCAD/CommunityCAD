@extends('layouts.cad')

@section('content')
    <div>
        @include('inc.cad.mdt-nav')
    </div>

    <div class="">
        <div class="max-w-7xl mx-auto text-white h-max bg-[#2e3547] rounded-lg">
            <div class="p-3 flex space-x-4">
                <a class="new-button-md" href="{{ route('cad.bolo.create') }}">New Bolo</a>
                {{-- <a class="new-button-md" href="{{ route('cad.bolo.create') }}">New Stolen Vehicle</a> --}}
            </div>
            <div class="p-2 text-base leading-relaxed">
                <div class="max-w-7xl mx-auto p-2">
                    <div>
                        <table class="w-full bg-white text-black border-collapse">
                            <thead class="bg-blue-800 text-white text-left">
                                <th class="border border-black ml-2"></th>
                                <th class="border border-black ml-2">From</th>
                                <th class="border border-black ml-2">Subject</th>
                                <th class="border border-black ml-2">Received</th>
                            </thead>

                            @foreach ($stolen_vehicles as $vehicle)
                                <tbody x-data="{ open: false }">
                                    <tr @click="open = !open" class="bg-gray-300 cursor-pointer">
                                        <td class="border border-black text-red-600 font-bold text-lg ">
                                            <svg class="w-6 h-6 mx-auto" fill="none" stroke-width="1.5"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </td>
                                        <td class="border border-black">DMV System</td>
                                        <td class="border border-black">Stolen Vehicle: {{ $vehicle->plate }} //
                                            {{ $vehicle->model }} // {{ $vehicle->color }}</td>
                                        <td class="border border-black">{{ $vehicle->updated_at->format('m/d/Y H:i') }}
                                        </td>
                                    </tr>
                                    <tr x-show="open">
                                        <td class="border border-black" colspan="4">
                                            <div class="bg-gray-200 text-black p-3">
                                                <div class="flex justify-between items-center border-b border-black">
                                                    <h3 class="text-xl">Stolen Vehicle: {{ $vehicle->plate }} //
                                                        {{ $vehicle->model }} // {{ $vehicle->color }}</h3>
                                                    <div>
                                                        <div class="bg-red-500 text-white font-bold text-xl p-2">
                                                            Stolen Vehicle
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="leading-tight">
                                                    <p><span class="font-bold">Warning -</span> Vehicle has
                                                        been reported stolen by Owner. Use Caution, Contact DMV to confirm
                                                        status.</p>
                                                    <p><span class="font-bold">Additional Information -</span> Vehicle can
                                                        be described as a
                                                        {{ $vehicle->color }} in color {{ $vehicle->model }} bearing plate
                                                        {{ $vehicle->plate }}.</p>
                                                </div>

                                                <p><span class="font-bold">Registered Owner:</span>
                                                    {{ $vehicle->civilian->name }}</p>
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
                                                                <p>{{ $vehicle->civilian->postal }}
                                                                    {{ $vehicle->civilian->street }}
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
                                                                <p>{{ $vehicle->civilian->date_of_birth->format('m/d/Y') }}
                                                                </p>
                                                                <p>{{ $vehicle->civilian->race }}</p>
                                                                <p>{{ $vehicle->civilian->gender }}</p>
                                                                <p>{{ floor($vehicle->civilian->height / 12) }}'
                                                                    {{ $vehicle->civilian->height % 12 }}"
                                                                    ({{ round($vehicle->civilian->height * 2.54) }}cm)
                                                                </p>
                                                                <p>{{ $vehicle->civilian->weight }}lb
                                                                    ({{ round($vehicle->civilian->weight / 2.205) }}kg)
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-2">
                                                        @if ($vehicle->civilian->picture)
                                                            <img alt="" class="w-48 h-48"
                                                                src="{{ $vehicle->civilian->picture }}">
                                                        @else
                                                            <p>No Image on file</p>
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="flex justify-between">
                                                    <a class="text-blue-600 underline"
                                                        href="{{ route('cad.name.return', $vehicle->civilian->id) }}">Run
                                                        Name</a>
                                                    <div class="">
                                                        <a class="delete-button-md"
                                                            href="{{ route('cad.stolen_vehicles.clear', $vehicle->id) }}">Clear</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                            @foreach ($bolos as $bolo)
                                <tbody x-data="{ open: false }">
                                    <tr @click="open = !open" class="bg-gray-300 cursor-pointer">
                                        <td class="border border-black text-red-600 font-bold text-lg ">
                                            <svg class="w-6 h-6 mx-auto" fill="none" stroke-width="1.5"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </td>
                                        <td class="border border-black">BOLO System</td>
                                        <td class="border border-black">{{ $bolo->type }} BOLO:
                                            @if ($bolo->type == 'Person')
                                                {{ $bolo->civilian->name }}
                                            @elseif($bolo->type == 'Vehicle')
                                                {{ $bolo->vehicle->plate }} //
                                                {{ $bolo->vehicle->model }} // {{ $bolo->vehicle->color }}
                                            @endif
                                        </td>
                                        <td class="border border-black">
                                            {{ $bolo->created_at->format('m/d/Y H:i') }}
                                        </td>
                                    </tr>
                                    <tr x-show="open">
                                        <td class="border border-black" colspan="4">
                                            <div class="bg-gray-200 text-black p-3">
                                                <div class="flex justify-between items-center border-b border-black">
                                                    <h3 class="text-xl">
                                                        {{ $bolo->type }} BOLO:
                                                        @if ($bolo->type == 'Person')
                                                            {{ $bolo->civilian?->name }}
                                                        @elseif($bolo->type == 'Vehicle')
                                                            {{ $bolo->vehicle?->plate }} //
                                                            {{ $bolo->vehicle?->model }} // {{ $bolo->vehicle->color }}
                                                        @endif
                                                    </h3>
                                                    <div>
                                                        @if ($bolo->civilian?->status == 4)
                                                            <p class="bg-red-600 p-3 text-white">deceased</p>
                                                        @endif
                                                        @if ($bolo->vehicle?->vehicle_status == 5)
                                                            <p class="bg-red-600 p-3 text-white">Scrapped</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="leading-tight">
                                                    <p>
                                                        <span class="font-bold">Wanted in connection to
                                                            {{ $bolo->wanted }}.
                                                            @if ($bolo->call)
                                                                Call #{{ $bolo->call->id }}
                                                            @endif
                                                        </span>
                                                    </p>
                                                    <p><span class="font-bold">Last Known
                                                            Location:</span>{{ $bolo->last_location }}</p>
                                                    <p><span class="font-bold">Last Known
                                                            Appearance:</span>{{ $bolo->last_appearance }}</p>
                                                    <p><span class="font-bold">Last Known Transportation:</span>
                                                        {{ $bolo->last_transportation }}</p>

                                                    <p><span class="font-bold">Warning -</span> {{ $bolo->warning }}</p>
                                                    <p><span class="font-bold">Additional Information -</span>
                                                        {{ $bolo->additional_information }}</p>
                                                </div>

                                                <div class="border-t border-black">
                                                    @if ($bolo->civilian_id)
                                                        <p>Civilian Linked: {{ $bolo->civilian->name }}</p>
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
                                                                        <p>{{ $bolo->civilian->postal }}
                                                                            {{ $bolo->civilian->street }}
                                                                            {{ $bolo->civilian->city }}</p>
                                                                        <p>12345</p>
                                                                        <p>{{ $bolo->civilian->s_n_n }}</p>
                                                                        <p>123-345-9834</p>
                                                                        <p>INDIV - Individual</p>
                                                                        <p>{{ $bolo->civilian->occupation }}</p>
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
                                                                        <p>{{ $bolo->civilian->age }}</p>
                                                                        <p>{{ $bolo->civilian->date_of_birth->format('m/d/Y') }}
                                                                        </p>
                                                                        <p>{{ $bolo->civilian->race }}</p>
                                                                        <p>{{ $bolo->civilian->gender }}</p>
                                                                        <p>{{ floor($bolo->civilian->height / 12) }}'
                                                                            {{ $bolo->civilian->height % 12 }}"
                                                                            ({{ round($bolo->civilian->height * 2.54) }}cm)
                                                                        </p>
                                                                        <p>{{ $bolo->civilian->weight }}lb
                                                                            ({{ round($bolo->civilian->weight / 2.205) }}kg)
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="p-2">
                                                                @if ($bolo->civilian->picture)
                                                                    <img alt="" class="w-48 h-48"
                                                                        src="{{ $bolo->civilian->picture }}">
                                                                @else
                                                                    <p>No Image on file</p>
                                                                @endif
                                                            </div>
                                                            <a class="text-blue-600 underline"
                                                                href="{{ route('cad.name.return', $bolo->civilian->id) }}">Run
                                                                Name</a>
                                                        </div>
                                                    @endif

                                                    @if ($bolo->vehicle)
                                                        <p>Vehicle Linked: {{ $bolo->vehicle->plate }}</p>
                                                        <div class="grid grid-cols-4 gap-2 border-2 mt-3">
                                                            <div class="border-r-2 p-2">
                                                                <div class="flex">
                                                                    <div class="">
                                                                        <p class="font-bold">Plate:</p>
                                                                        <p class="font-bold">Make:</p>
                                                                        <p class="font-bold">Color:</p>
                                                                    </div>
                                                                    <div class="ml-3">
                                                                        <p>{{ $bolo->vehicle->plate }}</p>
                                                                        <p>{{ $bolo->vehicle->model }}</p>
                                                                        <p>{{ $bolo->vehicle->color }}</p>
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
                                                                        <p>{{ $bolo->vehicle->registration_expire->format('m/d/Y') }}
                                                                        </p>
                                                                        <p>{{ $bolo->vehicle->status_name }}</p>
                                                                        @if ($bolo->vehicle->civilian)
                                                                            {{ $bolo->vehicle->civilian->name }}
                                                                            ({{ $bolo->vehicle->civilian->s_n_n }})
                                                                        @elseif ($bolo->vehicle->business)
                                                                            {{ $bolo->vehicle->business->name }} <span
                                                                                class="text-blue-600">(BUSSINESS
                                                                                VEHICLE)</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="p-2">
                                                                @if ($bolo->vehicle->picture)
                                                                    <img alt="" class="w-48 h-48"
                                                                        src="{{ $bolo->civilian->picture }}">
                                                                @else
                                                                    <p>No Image on file</p>
                                                                @endif
                                                            </div>
                                                            <a class="text-blue-600 underline"
                                                                href="{{ route('cad.vehicle.return', $bolo->vehicle->plate) }}">Run
                                                                plate</a>
                                                        </div>
                                                    @endif

                                                    <div class="text-right">
                                                        <form action="{{ route('cad.bolo.destroy', $bolo->id) }}"
                                                            class="text-right" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="delete-button-md">
                                                                Clear
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

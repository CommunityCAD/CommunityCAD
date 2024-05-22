@extends('layouts.cad_simple')

@section('content')
    <div class="">
        {{-- <div class="max-w-3xl mx-auto">
            <a class="delete-button-md" href="#" onclick="window.close();">Exit Without Saving</a>
        </div> --}}

        <div class="bg-pink-200 uppercase max-w-4xl rounded-lg mx-auto p-4 mt-5">
            <form action="" id="mdeditor" method="POST">
                @csrf
                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">{{ get_setting('state') }} UNIFORM CITATION - Copy</p>
                    <div class="flex justify-between">
                        <p class="text-lg">State of {{ get_setting('state') }} <span class="underline font-semibold">
                                District Court</p>
                        <p class="text-base">Citation No. <span class="underline font-semibold">{{ $ticket->id }}</span>
                        </p>
                    </div>
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">Your Court Date and Location</p>

                    <div class="border-2 border-black">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-2">
                                <span class="text-xs italic">Court Day of Week</span>
                                <p class="font-semibold">{{ $ticket->court_at?->format('l') }}</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Date</span>
                                <p class="font-semibold">{{ $ticket->court_at?->format('m/d/Y') }}</p>
                            </div>
                            <div class="col-span-1">
                                <span class="text-xs italic">Time</span>
                                <p class="font-semibold">{{ $ticket->court_at?->format('H:i') }}</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">Court Location</span>
                                <p class="font-semibold">{{ $ticket->court_location }}</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Courtroom</span>
                                <p class="font-semibold">{{ $ticket->courtroom }}</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Agency Case Number</span>
                                <p class="font-semibold">{{ $ticket->call?->id }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">The State of {{ get_setting('state') }} VS.</p>

                    <div class="border-2 border-black border-collapse">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-2">
                                <span class="text-xs italic">Drivers License No</span>
                                <p class="font-semibold">{{ $ticket->license?->id }}</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">State</span>
                                <p class="font-semibold">{{ get_setting('state') }}</p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">Name</span>
                                <p class="font-semibold">{{ $ticket->civilian->name }}</p>
                                {{-- <input
                                    class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                    type="text"> --}}
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Race</span>
                                <p class="font-semibold">{{ $ticket->civilian->race }}</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Gender</span>
                                <p class="font-semibold">{{ $ticket->civilian->gender }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-2 border-black border-collapse">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-2">
                                <span class="text-xs italic">Suspend License</span>
                                <p class="font-semibold">
                                    @if ($ticket->license_was_suspended)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Type</span>
                                <p class="font-semibold">{{ $ticket->license?->license_type->name }}</p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">Address</span>
                                <p class="font-semibold">{{ $ticket->civilian->postal }} {{ $ticket->civilian->street }}
                                </p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">City</span>
                                <p class="font-semibold">{{ $ticket->civilian->city }}</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">State</span>
                                <p class="font-semibold">{{ get_setting('state') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-2 border-black border-collapse">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-4">
                                <span class="text-xs italic">Social Security No.</span>
                                <p class="font-semibold">{{ $ticket->civilian->s_n_n }}</p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">Date of Birth</span>
                                <p class="font-semibold">{{ $ticket->civilian->date_of_birth->format('m/d/Y') }}</p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">Age</span>
                                <p class="font-semibold">{{ $ticket->civilian->age }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">What you are charged with</p>
                    <p>The officer named below has probable cause to believe that on or about <span
                            class="underline font-semibold">{{ $ticket->offense_occured_at->format('l') }}</span>,
                        the <span class="underline font-semibold">{{ $ticket->offense_occured_at->format('j') }}</span> day
                        of
                        <span class="underline font-semibold">{{ $ticket->offense_occured_at->format('F') }}</span> at
                        <span class="underline font-semibold">{{ $ticket->offense_occured_at->format('H:i') }}</span>
                        in the state named above
                        you did unlawfully and willfully
                    </p>
                    @foreach ($ticket->charges as $charge)
                        <div class="flex">
                            <div class="border-2 border-black w-full p-1">
                                <span class="text-xs italic">Charge</span>
                                <p class="font-semibold">{{ $charge->penal_code->name }} (x{{ $charge->counts }}) -
                                    {{ $charge->description }}</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="border-2 border-black w-2/6 p-1">
                                <span class="text-xs italic">Jail Time (seconds)</span>
                                <p class="font-semibold">{{ $charge->in_game_jail_time }}</p>
                            </div>
                            <div class="border-2 border-black w-2/6 p-1">
                                <span class="text-xs italic">Fine ($)</span>
                                <p class="font-semibold">{{ $charge->fine }}</p>
                            </div>
                            <div class="border-2 border-black w-2/6 p-1">
                                <span class="text-xs italic">CAD Jail Time (minutes)</span>
                                <p class="font-semibold">{{ $charge->cad_jail_time }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">Your Vehicle</p>

                    <div class="border-2 border-black border-collapse">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-3">
                                <span class="text-xs italic">Plate</span>
                                <p class="font-semibold">{{ $ticket->vehicle->plate }}</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">Make</span>
                                <p class="font-semibold">{{ $ticket->vehicle->model }}</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">Color</span>
                                <p class="font-semibold">{{ $ticket->vehicle->color }}</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">Impound Vehicle</span>
                                <p class="font-semibold">
                                    @if ($ticket->vehicle_was_impounded)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">Other Information</p>
                    <div class="border-2 border-black border-collapse">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-2">
                                <span class="text-xs italic">Area</span>
                                <p class="font-semibold">{{ $ticket->area }}</p>
                            </div>
                            <div class="col-span-1">
                                <span class="text-xs italic">Weather</span>
                                <p class="font-semibold">{{ $ticket->weather }}</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Traffic</span>
                                <p class="font-semibold">{{ $ticket->traffic }}</p>
                            </div>
                            <div class="col-span-1">
                                <span class="text-xs italic">Accident</span>
                                <p class="font-semibold">
                                    @if ($ticket->accident)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Speed</span>
                                <p class="font-semibold">{{ $ticket->speed }}mph</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">on Highway/Street</span>
                                <p class="font-semibold">{{ $ticket->highway_street }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="border-2 border-black border-collapse">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-4 text-left pl-2">
                                <p>
                                    <input @checked($ticket->is_injury) disabled id="" name=""
                                        type="checkbox"> <label for="">Injury
                                        or
                                        Serious Injury</label>
                                </p>
                                <p>
                                    <input @checked($ticket->is_passenger_under_16) disabled id="" name=""
                                        type="checkbox"> <label for="">Passengers
                                        under 16</label>
                                </p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">In Vicinity/City Of</span>
                                <p class="font-semibold">{{ $ticket->in_city_of }}</p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">At/Near Intersection</span>
                                <p class="font-semibold">{{ $ticket->at_intersection }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">Charging Officer Information</p>

                    <div class="border-2 border-black border-collapse">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-3">
                                <span class="text-xs italic">Date</span>
                                <p class="font-semibold">{{ $ticket->created_at->format('m/d/Y') }}</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">Officer Signature</span>
                                <p class="font-semibold">{{ $ticket->officer->name }}</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">Badge No.</span>
                                <p class="font-semibold">{{ $ticket->officer->user_department->badge_number }}</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">Agency</span>
                                <p class="font-semibold">
                                    {{ $ticket->officer->user_department->department->initials }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

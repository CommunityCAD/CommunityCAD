{{-- <div class="bg-yellow-100 max-w-3xl rounded-lg mx-auto p-4 mt-5">
    <form action="{{ route('cad.ticket.store', $civilian->id) }}" id="mdeditor" method="POST">
        @csrf

        <div class="border-2 border-black w-full">
            <div class="flex">
                <div class="border-2 border-black w-full p-2">
                    <p class="text-gray-500">Type
                        <select class="block text-black p-3 w-full font-bold uppercase" id="" name="type_id">
                            <option value="1">Warning</option>
                            <option value="2">Ticket</option>
                            <option value="3">Arrest</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="flex">
                <div class="border-2 border-black w-full p-2">
                    <p class="text-gray-500">Call
                        <select class="select-input" id="call_id" name="call_id">
                            <option value="0">Choose a Call #</option>
                            @foreach ($calls as $call)
                                <option value="{{ $call->id }}">{{ $call->id }} - {{ $call->nature }} @
                                    {{ $call->location }}, {{ $call->city }} on
                                    {{ $call->created_at->format('m/d/Y') }}</option>
                            @endforeach
                        </select>
                    </p>
                </div>
            </div>
            <div class="flex">
                <div class="border-2 border-black w-4/6 p-2">
                    <p class="text-gray-500">Last Name (Defendant) <span
                            class="block text-black font-bold uppercase">{{ $civilian->last_name }}</span></p>
                </div>
                <div class="border-2 border-black w-2/6 p-2">
                    <p class="text-gray-500">First Name <span
                            class="block text-black font-bold uppercase">{{ $civilian->first_name }}</span></p>
                </div>
            </div>
            <div class="flex">
                <div class="border-2 border-black w-5/6 p-2">
                    <p class="text-gray-500">Address <span
                            class="block text-black font-bold uppercase">{{ $civilian->address }}</span></p>
                </div>
                <div class="border-2 border-black w-1/6 p-2">
                    <p class="text-gray-500">Showed ID <span class="block text-black font-bold uppercase">
                            <input class="mx-auto text-center w-full h-6" name="showed_id" type="checkbox">
                        </span></p>
                </div>
            </div>
            <div class="flex">
                <div class="border-2 border-black w-3/6 p-2">
                    <p class="text-gray-500">SSN <span
                            class="block text-black font-bold uppercase">{{ $civilian->s_n_n }}</span></p>
                </div>
                <div class="border-2 border-black w-1/6 p-2">
                    <p class="text-gray-500">Sex <span
                            class="block text-black font-bold uppercase">{{ $civilian->gender }}</span></p>
                </div>
                <div class="border-2 border-black w-2/6 p-2">
                    <p class="text-gray-500">Race <span
                            class="block text-black font-bold uppercase">{{ $civilian->race }}</span></p>
                </div>
            </div>

            <div class="flex">
                <div class="border-2 border-black w-full p-2">
                    <p class="text-gray-500">License Search
                    <div class="flex">
                        <select class="select-input" id="licenseId" name="license_id" wire:model="licenseId">
                            <option value="">Choose One</option>
                            @foreach ($civilian->licenses as $license)
                                <option value="{{ $license->id }}">{{ $license->license_type->name }} -
                                    {{ $license->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    </p>
                </div>
            </div>
            <div class="flex">
                @if ($chosen_license)
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">License No. <span
                                class="block text-black font-bold uppercase">{{ $chosen_license->id }}</span></p>
                    </div>
                    <div class="border-2 border-black w-1/6 p-2">
                        <p class="text-gray-500">Expires <span
                                class="block text-black font-bold uppercase">{{ $chosen_license->expires_on->format('m/d/Y') }}</span>
                        </p>
                    </div>
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">Type <span
                                class="block text-black font-bold uppercase">{{ $chosen_license->license_type->name }}</span>
                        </p>
                    </div>
                    <div class="border-2 border-black w-1/6 p-2">
                        <p class="text-gray-500">Suspend <span class="block text-black font-bold uppercase">
                                <input class="mx-auto text-center w-full h-6" name="license_was_suspended"
                                    type="checkbox">
                            </span></p>
                    </div>
                @else
                    <div class="border-2 border-black w-full p-2">
                        <p class="text-gray-500">No License Linked</p>
                    </div>
                @endif
            </div>

            <div class="flex">
                <div class="border-2 border-black w-full p-2">
                    <p class="text-gray-500">Vehicle Search
                    <div class="flex">
                        <select class="select-input" id="vehicleId" name="vehicle_id" wire:model="vehicleId">
                            <option value="">Choose One</option>
                            @foreach ($civilian->vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->plate }} -
                                    {{ $vehicle->color }} {{ $vehicle->model }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    </p>
                </div>
            </div>
            <div class="flex">
                @if ($chosen_vehicle)
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">Plate <span
                                class="block text-black font-bold uppercase">{{ $chosen_vehicle->plate }}</span></p>
                    </div>
                    <div class="border-2 border-black w-1/6 p-2">
                        <p class="text-gray-500">Make <span
                                class="block text-black font-bold uppercase">{{ $chosen_vehicle->model }}</span>
                        </p>
                    </div>
                    <div class="border-2 border-black w-1/6 p-2">
                        <p class="text-gray-500">Color <span
                                class="block text-black font-bold uppercase">{{ $chosen_vehicle->color }}</span>
                        </p>
                    </div>
                    <div class="border-2 border-black w-1/6 p-2">
                        <p class="text-gray-500">Expires <span class="block text-black font-bold uppercase">
                                {{ $chosen_vehicle->registration_expire->format('m/d/Y') }}
                            </span></p>
                    </div>
                    <div class="border-2 border-black w-1/6 p-2">
                        <p class="text-gray-500">Impound <span class="block text-black font-bold uppercase">
                                <input class="mx-auto text-center w-full h-6" name="vehicle_was_impounded"
                                    type="checkbox">
                            </span></p>
                    </div>
                @else
                    <div class="border-2 border-black w-full p-2">
                        <p class="text-gray-500">No Vehicle Linked</p>
                    </div>
                @endif
            </div>

            <div class="flex">
                <div class="border-2 border-black w-3/6 p-2">
                    <p class="text-gray-500">Time
                        <input class="block text-black p-3 w-full font-bold uppercase" name="time" type="time"
                            value="{{ date('H:i') }}">
                    </p>
                </div>
                <div class="border-2 border-black w-3/6 p-2">
                    <p class="text-gray-500">Date
                        <input class="block text-black p-3 w-full font-bold uppercase" name="date" type="date"
                            value="{{ date('Y-m-d') }}">
                    </p>
                </div>
            </div>
            <div class="flex">
                <div class="border-2 border-black w-full p-2">
                    <p class="text-gray-500">Location
                        <input class="block text-black p-3 w-full font-bold uppercase" name="location_of_offense"
                            type="text">
                    </p>
                </div>
            </div>

        </div>
        <button class="new-button-md mt-5">Save and add charges</button>
    </form>
</div> --}}

<div class="">
    {{-- <div class="max-w-3xl mx-auto">
            <a class="delete-button-md" href="#" onclick="window.close();">Exit Without Saving</a>
        </div> --}}

    <div class="bg-gray-200 uppercase max-w-4xl rounded-lg mx-auto p-4 mt-5">
        <form action="" id="mdeditor" method="POST">
            @csrf
            <div class="border-2 border-black p-2">
                <p class="text-center font-bold text-2xl">{{ get_setting('state') }} UNIFORM CITATION - Officer Copy</p>
                <div class="flex justify-between">
                    <p class="text-lg">State of {{ get_setting('state') }} <span class="underline font-semibold">
                        </span>
                        District Court</p>
                    <p class="text-base">Citation No. <span class="underline font-semibold">PENDING</span></p>
                </div>
            </div>

            <div class="border-2 border-black p-2">
                <p class="text-center font-bold text-2xl">Your Court Date and Location</p>

                <div class="border-2 border-black">
                    <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                        <div class="col-span-2">
                            <span class="text-xs italic">Court Day of Week</span>
                            <p class="font-semibold">Pending</p>
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">Date</span>
                            <p class="font-semibold">Pending</p>
                        </div>
                        <div class="col-span-1">
                            <span class="text-xs italic">Time</span>
                            <p class="font-semibold">Pending</p>
                        </div>
                        <div class="col-span-3">
                            <span class="text-xs italic">Court Location</span>
                            <p class="font-semibold">Pending</p>
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">Courtroom</span>
                            <p class="font-semibold">Pending</p>
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">Agency Case Number</span>
                            <p class="font-semibold">
                                <select
                                    class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                    id="call_id" name="call_id">
                                    <option value="">Choose one</option>
                                    @foreach ($calls as $call)
                                        <option value="{{ $call->id }}">{{ $call->id }} - {{ $call->nature }} @
                                            {{ $call->location }}, {{ $call->city }} on
                                            {{ $call->created_at->format('m/d/Y') }}</option>
                                    @endforeach
                                </select>
                            </p>
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
                            <select
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                id="licenseId" name="license_id" wire:model="licenseId">
                                <option value="bg-inherit">Licenses</option>
                                @foreach ($civilian->licenses as $license)
                                    <option value="{{ $license->id }}">{{ $license->id }} -
                                        {{ $license->license_type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">State</span>
                            <p class="font-semibold">{{ get_setting('state') }}</p>
                        </div>
                        <div class="col-span-4">
                            <span class="text-xs italic">Name</span>
                            <p class="font-semibold">{{ $civilian->name }}</p>
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">Race</span>
                            <p class="font-semibold">{{ $civilian->race }}</p>
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">Gender</span>
                            <p class="font-semibold">{{ $civilian->gender }}</p>
                        </div>
                    </div>
                </div>
                <div class="border-2 border-black border-collapse">
                    <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                        <div class="col-span-2">
                            <span class="text-xs italic">Suspend License</span>
                            <p class="font-semibold"><input class="mx-auto text-center w-full h-6"
                                    name="license_was_suspended" type="checkbox"></p>
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">Type</span>
                            <p class="font-semibold">{{ $chosen_license?->license_type->name }}</p>
                        </div>
                        <div class="col-span-4">
                            <span class="text-xs italic">Address</span>
                            <p class="font-semibold">{{ $civilian->postal }} {{ $civilian->street }}</p>
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">City</span>
                            <p class="font-semibold">{{ $civilian->city }}</p>
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
                            <p class="font-semibold">{{ $civilian->s_n_n }}</p>
                        </div>
                        <div class="col-span-4">
                            <span class="text-xs italic">Date of Birth</span>
                            <p class="font-semibold">{{ $civilian->date_of_birth->format('m/d/Y') }}</p>
                        </div>
                        <div class="col-span-4">
                            <span class="text-xs italic">Age</span>
                            <p class="font-semibold">{{ $civilian->age }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="border-2 border-black p-2">
                <p class="text-center font-bold text-2xl">What you are charged with</p>
                <p>The officer named below has probable cause to believe that on or about <span
                        class="underline font-semibold">Tuesday</span>,
                    the <span class="underline font-semibold">17</span> day of <span
                        class="underline font-semibold">May</span> at <span class="underline font-semibold">18:20</span>
                    in the county named above
                    you did unlawfully and willfully</p>
                <p>LIST CHARGES SOME HOW</p>
            </div> --}}

            <div class="border-2 border-black p-2">
                <p class="text-center font-bold text-2xl">Your Vehicle</p>

                <div class="border-2 border-black border-collapse">
                    <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                        <div class="col-span-3">
                            <span class="text-xs italic">Plate</span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="vehicle_plate" type="text" wire:model="vehicle_plate">
                            <input name="vehicle_id" type="hidden" value="{{ $chosen_vehicle?->id }}">
                        </div>
                        <div class="col-span-3">
                            <span class="text-xs italic">Make</span>
                            <p class="font-semibold">{{ $chosen_vehicle?->model }}</p>
                        </div>
                        <div class="col-span-3">
                            <span class="text-xs italic">Color</span>
                            <p class="font-semibold">{{ $chosen_vehicle?->color }}</p>
                        </div>
                        <div class="col-span-3">
                            <span class="text-xs italic">Impound Vehicle</span>
                            <p class="font-semibold">No</p>
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
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="area" type="text">
                        </div>
                        <div class="col-span-1">
                            <span class="text-xs italic">Weather</span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="weather" type="text">
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">Traffic</span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="traffic" type="text">
                        </div>
                        <div class="col-span-1">
                            <span class="text-xs italic">Accident</span>
                            <p class="font-semibold">No</p>
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">Speed</span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="speed" type="number">
                        </div>
                        <div class="col-span-3">
                            <span class="text-xs italic">on Highway/Street</span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="highway_street" type="text">
                        </div>
                    </div>
                </div>

                <div class="border-2 border-black border-collapse">
                    <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                        <div class="col-span-4 text-left pl-2">
                            <p>
                                <input id="" name="" type="checkbox"> <label for="">Injury
                                    or
                                    Serious Injury</label>
                            </p>
                            <p>
                                <input id="" name="" type="checkbox"> <label
                                    for="">Passengers
                                    under 16</label>
                            </p>
                        </div>
                        <div class="col-span-4">
                            <span class="text-xs italic">In Vicinity/City Of</span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="in_city_of" type="text">
                        </div>
                        <div class="col-span-4">
                            <span class="text-xs italic">At/Near Intersection</span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="at_intersection" type="text">
                        </div>
                    </div>
                </div>
                <div>
                    <button class="new-button-md mt-5">Save and add charges</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="">
    {{-- <div class="max-w-3xl mx-auto">
            <a class="delete-button-md" href="#" onclick="window.close();">Exit Without Saving</a>
        </div> --}}
    <div class="w-full">
        @foreach ($errors->all() as $error)
            <p class="text-red-600">{{ $error }}</p>
        @endforeach
    </div>

    <div class="bg-gray-200 uppercase max-w-4xl rounded-lg mx-auto p-4 mt-5">

        <form action="{{ route('cad.ticket.store', $civilian->id) }}" id="mdeditor" method="POST">
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
                            <span
                                class="text-xs italic @error('call_id')
                                        text-red-600
                                    @enderror">Agency
                                Case Number<span class="text-lg text-red-600">*</span></span>
                            <p class="font-semibold">
                                <select
                                    class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black @error('call_id')
                                        border-red-600
                                    @enderror w-full"
                                    id="call_id" name="call_id">
                                    <option value="">Choose one</option>
                                    @foreach ($calls as $call)
                                        <option @selected($call->id == old('call_id')) value="{{ $call->id }}">
                                            {{ $call->id }} - {{ $call->nature }} @
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
                            <span
                                class="text-xs italic @error('license_id')
                                        text-red-600
                                    @enderror">Drivers
                                License No<span class="text-lg text-red-600">*</span></span>
                            <select
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black @error('license_id')
                                        border-red-600
                                    @enderror w-full"
                                id="licenseId" name="license_id" wire:model="licenseId">
                                <option value="0">Licenses</option>
                                @foreach ($civilian->licenses as $license)
                                    <option @selected($license->id == old('license_id')) value="{{ $license->id }}">
                                        {{ $license->id }} -
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
                            <span class="text-xs italic ">Suspend License</span>
                            @if ($chosen_license)
                                <p class="font-semibold"><input @checked(old('license_was_suspended') == 'on')
                                        class="mx-auto text-center w-full h-6" name="license_was_suspended"
                                        type="checkbox"></p>
                            @else
                                <p class="font-semibold text-red-600">None</p>
                            @endif
                        </div>
                        <div class="col-span-2">
                            <span class="text-xs italic">Type</span>
                            @if ($chosen_license)
                                <p class="font-semibold">{{ $chosen_license?->license_type->name }}</p>
                            @else
                                <p class="font-semibold text-red-600">None</p>
                            @endif

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
                            <span
                                class="text-xs italic @error('license_id')
                                        text-red-600
                                    @enderror">Plate<span
                                    class="text-lg text-red-600">*</span></span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 @error('vehicle_id')
                                        border-red-600
                                    @enderror border-black w-full"
                                name="vehicle_plate" type="text" wire:model="vehicle_plate">
                            <input name="vehicle_id" type="hidden"
                                value="{{ old('vehicle_id', $chosen_vehicle?->id) }}">
                        </div>
                        <div class="col-span-3">
                            <span class="text-xs italic">Make</span>
                            @if ($chosen_vehicle)
                                <p class="font-semibold">{{ $chosen_vehicle?->model }}</p>
                            @else
                                <p class="font-semibold text-red-600">None</p>
                            @endif
                        </div>
                        <div class="col-span-3">
                            <span class="text-xs italic">Color</span>
                            @if ($chosen_vehicle)
                                <p class="font-semibold">{{ $chosen_vehicle?->color }}</p>
                            @else
                                <p class="font-semibold text-red-600">None</p>
                            @endif
                        </div>
                        <div class="col-span-3">
                            <span class="text-xs italic">Impound Vehicle</span>
                            @if ($chosen_vehicle)
                                <p class="font-semibold"><input @checked(old('vehicle_was_impounded') == 'on')
                                        class="mx-auto text-center w-full h-6" name="vehicle_was_impounded"
                                        type="checkbox"></p>
                            @else
                                <p class="font-semibold text-red-600">None</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-2 border-black p-2">
                <p class="text-center font-bold text-2xl">Other Information</p>
                <div class="border-2 border-black border-collapse">
                    <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                        <div class="col-span-2">
                            <span
                                class="text-xs italic @error('area')
                                        text-red-600
                                    @enderror">Area<span
                                    class="text-lg text-red-600">*</span></span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="area" type="text">
                        </div>
                        <div class="col-span-1">
                            <span
                                class="text-xs italic @error('weather')
                                        text-red-600
                                    @enderror">Weather<span
                                    class="text-lg text-red-600">*</span></span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="weather" type="text">
                        </div>
                        <div class="col-span-2">
                            <span
                                class="text-xs italic @error('traffic')
                                        text-red-600
                                    @enderror">Traffic<span
                                    class="text-lg text-red-600">*</span></span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="traffic" type="text">
                        </div>
                        <div class="col-span-1">
                            <span
                                class="text-xs italic @error('accident')
                                        text-red-600
                                    @enderror">Accident<span
                                    class="text-lg text-red-600">*</span></span>
                            <p class="font-semibold"><input @checked(old('accident') == 'on')
                                    class="mx-auto text-center w-full h-6" name="accident" type="checkbox"></p>
                        </div>
                        <div class="col-span-2">
                            <span
                                class="text-xs italic @error('speed')
                                        text-red-600
                                    @enderror">Speed<span
                                    class="text-lg text-red-600">*</span></span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="speed" type="number">
                        </div>
                        <div class="col-span-3">
                            <span
                                class="text-xs italic @error('highway_street')
                                        text-red-600
                                    @enderror">on
                                Highway/Street<span class="text-lg text-red-600">*</span></span>
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
                                <input @checked(old('is_injury')) id="is_injury" name="is_injury" type="checkbox">
                                <label for="is_injury">Injury
                                    or
                                    Serious Injury</label>
                            </p>
                            <p>
                                <input @checked(old('is_passenger_under_16')) id="is_passenger_under_16"
                                    name="is_passenger_under_16" type="checkbox">
                                <label for="is_passenger_under_16">Passengers
                                    under 16</label>
                            </p>
                        </div>
                        <div class="col-span-4">
                            <span
                                class="text-xs italic @error('in_city_of')
                                        text-red-600
                                    @enderror">In
                                Vicinity/City Of<span class="text-lg text-red-600">*</span></span>
                            <input
                                class="bg-inherit ring-0 border-b-2 uppercase focus:outline-0 font-semibold px-2 my-2 border-black w-full"
                                name="in_city_of" type="text">
                        </div>
                        <div class="col-span-4">
                            <span
                                class="text-xs italic @error('at_intersection')
                                        text-red-600
                                    @enderror">At/Near
                                Intersection<span class="text-lg text-red-600">*</span></span>
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

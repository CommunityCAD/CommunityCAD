<div class="bg-yellow-100 max-w-3xl rounded-lg mx-auto p-4 mt-5">
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

        {{-- <h3 class="text-xl my-3 uppercase text-center">The Person Described above is charged as follows</h3>
        <a class="font-bold uppercase new-button-sm my-3 ml-3" href="#" wire:click.prevent="addCharge">New
            Charge</a>
        <div class="border-2 border-black w-full">
            @foreach ($charges as $index => $charge)
                <div>
                    @if ($errors->has('charges.' . $index))
                        <em class="text-sm text-red-500">
                            {{ $errors->first('charges.' . $index) }}
                        </em>
                    @endif
                    <div class="flex">
                        <div class="border-2 border-black w-4/6 p-2">

                            <p class="text-gray-500">Charge
                                <select class="select-input font-bold uppercase" id="{{ $index }}.charge"
                                    name="{{ $index }}.charge" wire:model="{{ $index }}.charge">
                                    <option value="">Choose one</option>
                                    @foreach ($penal_code_title as $title)
                                        <optgroup label="PC - Title {{ $title->number }} {{ $title->name }}">
                                            @foreach ($title->penal_code_codes() as $code)
                                                <option value="{{ $code->id }}">PC -
                                                    {{ $title->number }}({{ $code->number }}).
                                                    {{ $code->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Actions
                            <div class="block">
                                <a class="font-bold uppercase edit-button-sm" href="#">Edit</a>
                                <a class="font-bold uppercase delete-button-sm" href="#">Delete</a>
                                <a class="font-bold uppercase new-button-sm" href="#">Save</a>
                            </div>
                            </p>
                        </div>

                    </div>
                    <div class="flex">
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Jail <span
                                    class="block text-black font-bold uppercase">100s</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">Fine <span
                                    class="block text-black font-bold uppercase">$4500</span>
                            </p>
                        </div>
                        <div class="border-2 border-black w-2/6 p-2">
                            <p class="text-gray-500">CAD Jail <span
                                    class="block text-black font-bold uppercase">100h</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="border-2 border-black w-full p-2">
                            <p class="text-gray-500">Description
                                <textarea class="textarea-input font-bold uppercase"></textarea>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h3 class="text-xl my-3 uppercase text-center">Totals</h3>

        <div class="border-2 border-black w-full">

            <div class="flex">
                <div class="border-2 border-black w-1/6 p-2">
                    <p class="text-gray-500">Total Jail <span class="block text-black font-bold uppercase">100s</span>
                    </p>
                </div>
                <div class="border-2 border-black w-1/6 p-2">
                    <p class="text-gray-500">Total Fine <span
                            class="block text-black font-bold uppercase">$4500</span>
                    </p>
                </div>
                <div class="border-2 border-black w-1/6 p-2">
                    <p class="text-gray-500">Total CAD Jail <span
                            class="block text-black font-bold uppercase">100h</span></p>
                </div>

                <div class="border-2 border-black w-3/6 p-2">
                    <p class="text-gray-500">Signed <span
                            class="block text-black font-bold uppercase">{{ auth()->user()->officer_name_check }}</span>
                    </p>
                </div>
            </div>
        </div> --}}

        <button class="new-button-md mt-5">Save and add charges</button>
    </form>
</div>

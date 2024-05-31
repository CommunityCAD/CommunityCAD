<div class="">
    <div class="bg-blue-300 flex justify-between items-center" id="top">
        <p class="text-sm ml-5 normal-case">Uniform Citation, Summons and Accusation</p>
        <a class="bg-red-500 px-2 py-1 text-sm text-white font-bold" href="#" onclick="window.close();">X</a>
    </div>
    <div class="bg-gray-50 w-full mx-auto p-3 pb-12">
        <div class="flex">
            <div class="w-5/6 pr-3">
                <div class="uppercase font-bold flex justify-around">
                    <p>NEW</p>
                    <p>Blaine County Sheriff's Office</p>
                </div>
                <form action="{{ route('cad.ticket.store', $civilian->id) }}" method="POST" name="form">

                    {{-- @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach --}}
                    @csrf
                    <div class="grid grid-cols-3 gap-3">
                        <div class="flex">
                            <div class="mr-2">
                                <p>Related Case #</p>
                            </div>
                            <div>
                                <select
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none w-full ring-1 @error('call_id')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    id="" name="call_id">
                                    <option value=""></option>
                                    @foreach ($calls as $call)
                                        <option @selected(old('call_id') == $call->id) value="{{ $call->id }}">
                                            {{ $call->id }} |
                                            {{ $call->nature_info['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="mr-2">
                                <p>Type</p>
                            </div>
                            <div>
                                <select
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none w-full ring-1 @error('type_id')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    id="" name="type_id">
                                    <option value=""></option>
                                    <option @selected(old('type_id') == 1) value="1">Warning</option>
                                    <option @selected(old('type_id') == 2) value="2">Ticket</option>
                                    <option @selected(old('type_id') == 3) value="3">Arrest</option>
                                </select>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="flex">
                            <div class="mr-2">
                                <p>Citation <br>#</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="PENDING">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="col-span-3 grid grid-cols-2 gap-3">
                            <div class="flex space-x-3 items-center mx-auto">
                                <p>Upon:</p>
                                <p>Date</p>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-32"
                                    name="date" type="date" value="{{ date('Y-m-d') }}">
                                <p class="font-bold">{{ date('l') }}</p>
                            </div>
                            <div class="flex space-x-3 items-center">
                                <p>Time:</p>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-16"
                                    name="time" type="text" value="{{ date('H:i') }}">
                            </div>
                        </div>
                    </div>

                    <div class="border-y-2 text-center border-blue-600 text-blue-600 font-bold my-3">
                        Section I - Violator
                    </div>

                    <div class="grid grid-cols-6 gap-3">
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">License No.</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div>
                                <select
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none w-full ring-1"
                                    id="licenseId" name="license_id" wire:model="licenseId">
                                    <option value=""></option>
                                    @foreach ($civilian->licenses as $license)
                                        <option @selected(old('license_id') == $license->id) value="{{ $license->id }}">
                                            {{ $license->id }} |
                                            {{ $license->license_type->name }}</option>
                                    @endforeach
                                </select>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Class/Type</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $chosen_license->license_type->name ?? '' }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">State</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $chosen_license ? get_setting('state') : '' }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Expires</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text"
                                    value="{{ $chosen_license?->expires_on->format('m/d/Y') ?? '' }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-3 mt-3">
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Name (SSN)</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $civilian->name }} ({{ $civilian->s_n_n }})">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">DOB</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $civilian->date_of_birth->format('m/d/Y') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Age</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="number" value="{{ $civilian->age }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-3 mt-3">
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Postal</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $civilian->postal }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Street</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $civilian->street }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">City</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $civilian->city }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">State</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ get_setting('state') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-5 gap-3 mt-3">
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Phone #</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $civilian->phone_number }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Race</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $civilian->race }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Gender</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $civilian->gender }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Height</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $civilian->height }} inch">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Weight</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $civilian->weight }}lbs">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                    </div>

                    <div class="grid grid-cols-6 gap-3 mt-3">
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Plate No.</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div class="flex items-center">
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @if ($vehicle_error && !is_null($vehicle_error)) text-red-600 font-bold @else text-green-600 font-bold @endif"
                                    name="plate" type="text" wire:model.lazy="vehicle_plate">
                                <button class="ml-3" wire:click.prevent="searchPlate">
                                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>

                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>

                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Make</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $chosen_vehicle?->model }}">
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    name="vehicle_id" type="hidden" value="{{ $chosen_vehicle?->id }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Color</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $chosen_vehicle?->color }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Status</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ $chosen_vehicle?->status_name }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Expires</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text"
                                    value="{{ $chosen_vehicle?->registration_expire->format('m/d/Y') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="border-y-2 text-center border-blue-600 text-blue-600 font-bold my-3">
                        Section II - Violation
                    </div>

                    <div class="grid grid-cols-3 gap-3 mt-3">
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Speeding</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div class="flex space-x-2 items-center">
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-16 @error('speed')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="speed" type="number" value="{{ old('speed', 0) }}">
                                <p>mph in a</p>
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-16 @error('speed_zone')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="speed_zone" type="number" value="{{ old('speed_zone', 0) }}">
                                <p>Zone</p>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Clocked Mode</p>
                            </div>
                            <div>
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @error('speed_clocked_mode')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="speed_clocked_mode" type="text"
                                    value="{{ old('speed_clocked_mode') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-7 gap-3 mt-3">
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">DUI/Drugs</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div class="flex items-center">
                                <select class="select-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    id="is_dui" name="is_dui">
                                    <option @selected(old('is_dui') == 0) value="0">No</option>
                                    <option @selected(old('is_dui') == 1) value="1">Yes</option>
                                </select>
                                <select
                                    class="ml-2 select-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    id="is_drugs" name="is_drugs">
                                    <option @selected(old('is_drugs') == 0) value="0">No</option>
                                    <option @selected(old('is_drugs') == 1) value="1">Yes</option>
                                </select>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Test Method</p>
                            </div>
                            <div>
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @error('dui_test_method')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="dui_test_method" type="text" value="{{ old('dui_test_method') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Test Result</p>
                            </div>
                            <div>
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @error('dui_test_result')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="dui_test_result" type="text" value="{{ old('dui_test_result') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Test Administered By</p>
                            </div>
                            <div>
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @error('dui_test_by')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="dui_test_by" type="text" value="{{ old('dui_test_by') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-3">
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Impound Vehicle</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div class="flex items-center">
                                <select class="select-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    id="is_dui" name="vehicle_was_impounded">
                                    <option value="0"@selected(old('vehicle_was_impounded') == 0)>No</option>
                                    <option value="1"@selected(old('vehicle_was_impounded') == 1)>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Suspend License</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div class="flex items-center">
                                <select class="select-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    id="is_dui" name="license_was_suspended">
                                    <option value="0"@selected(old('license_was_suspended') == 0)>No</option>
                                    <option value="1"@selected(old('license_was_suspended') == 1)>Yes</option>
                                </select>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <p class="font-bold text-center">Charges will be added on the next screen.</p>
                        </div>
                    </div>

                    <div class="border-y-2 text-center border-blue-600 text-blue-600 font-bold my-3">
                        Section III - Location
                    </div>

                    <div class="grid grid-cols-3 gap-3 mt-3">
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">On Highway/Street</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div class="">
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @error('highway_street')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="highway_street" type="text" value="{{ old('highway_street') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Near Intersection</p>
                            </div>
                            <div>
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @error('at_intersection')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="at_intersection" type="text" value="{{ old('at_intersection') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">In/Near the City of</p>
                            </div>
                            <div>
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @error('in_city_of')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="in_city_of" type="text" value="{{ old('in_city_of') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3 mt-3">
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Weather</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div class="">
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @error('weather')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="weather" type="text" value="{{ old('weather') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Traffic</p>
                            </div>
                            <div>
                                <input
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @error('traffic')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="traffic" type="text" value="{{ old('traffic') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">

                        </div>
                        <div class="col-span-3">
                            <div class="mr-2">
                                <p class="text-xs italic">Officer Notes (Not Printed)</p>
                            </div>
                            <div>
                                <textarea
                                    class="textarea-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 @error('officer_comments')
                                        !ring-red-600 !ring-2
                                    @enderror"
                                    name="officer_comments">{{ old('officer_comments') }}</textarea>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="border-y-2 text-center border-blue-600 text-blue-600 font-bold my-3">
                        Section IV - Summons
                    </div>

                    <div class="grid grid-cols-6 gap-3 mt-3">
                        <div class="col-span-6">
                            <p class="font-bold text-center">Court Information will be provided after ticket is signed.
                            </p>
                        </div>
                    </div>

                    <div class="border-y-2 text-center border-blue-600 text-blue-600 font-bold my-3">
                        Section V - Officer Certification
                    </div>

                    <div class="grid grid-cols-6 gap-3 mt-3">
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Submitted on</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div class="">
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="PENDING">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Officer Signature</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text" value="{{ auth()->user()->active_unit->officer->name }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Badge Number</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text"
                                    value="{{ auth()->user()->active_unit->user_department->badge_number }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Agency</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled type="text"
                                    value="{{ auth()->user()->active_unit->user_department->department->initials }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-1/6 text-center space-y-4">
                <button class="w-full py-1 text-blue-600 bg-gray-300 rounded-lg font-bold hover:bg-gray-400"
                    onclick="document.form.submit();">Next</button>
                <button class="w-full py-1 text-blue-600 bg-gray-300 rounded-lg font-bold hover:bg-gray-400"
                    onclick="window.close();">Cancel</button>
            </div>
        </div>
    </div>
</div>

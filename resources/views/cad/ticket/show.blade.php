@extends('layouts.cad_simple')

@section('content')
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
                    @csrf
                    <div class="grid grid-cols-3 gap-3">
                        <div class="flex">
                            <div class="mr-2">
                                <p>Related Case #</p>
                            </div>
                            <div>
                                <select class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none w-full ring-1"
                                    disabled id="" name="call_id">
                                    <option value="">{{ $ticket->call?->id }} |
                                        {{ $ticket->call->nature_info['name'] }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="mr-2">
                                <p>Type</p>
                            </div>
                            <div>
                                <select class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none w-full ring-1"
                                    disabled id="" name="type_id">
                                    <option value=""></option>
                                    <option @selected($ticket->type_id == 1) value="1">Warning</option>
                                    <option @selected($ticket->type_id == 2) value="2">Ticket</option>
                                    <option @selected($ticket->type_id == 3) value="3">Arrest</option>
                                </select>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="flex">
                            <div class="mr-2">
                                <p>Citation <br>#</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->id }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="col-span-3 grid grid-cols-2 gap-3">
                            <div class="flex space-x-3 items-center mx-auto">
                                <p>Upon:</p>
                                <p>Date</p>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-32"
                                    disabled name="date" type="date"
                                    value="{{ $ticket->offense_occured_at->format('Y-m-d') }}">
                                <p class="font-bold">{{ $ticket->offense_occured_at->format('l') }}</p>
                            </div>
                            <div class="flex space-x-3 items-center">
                                <p>Time:</p>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-16"
                                    disabled name="time" type="text"
                                    value="{{ $ticket->offense_occured_at->format('H:i') }}">
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
                                <select class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none w-full ring-1"
                                    disabled id="licenseId" name="license_id">
                                    <option value="">{{ $ticket->license?->id }}</option>
                                </select>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Class/Type</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->license?->license_type->name ?? '' }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">State</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->license ? get_setting('state') : '' }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Expires</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->license?->expires_on->format('m/d/Y') ?? '' }}">
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
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->civilian->name }} ({{ $ticket->civilian->s_n_n }})">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">DOB</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->civilian->date_of_birth->format('m/d/Y') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Age</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="number" value="{{ $ticket->civilian->age }}">
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
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->civilian->postal }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Street</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->civilian->street }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">City</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->civilian->city }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">State</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ get_setting('state') }}">
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
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->civilian->phone_number }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Race</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->civilian->race }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Gender</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->civilian->gender }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Height</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->civilian->height }} inch">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Weight</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->civilian->weight }}lbs">
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
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="plate" type="text" value="{{ $ticket->vehicle?->plate }}">

                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>

                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Make</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->vehicle?->model }}">
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    name="vehicle_id" type="hidden" value="{{ $ticket->vehicle?->id }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Color</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->vehicle?->color }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Status</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->vehicle?->status_name }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Expires</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->vehicle?->registration_expire->format('m/d/Y') }}">
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
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-16"
                                    disabled name="speed" type="number" value="{{ $ticket->speed }}">
                                <p>mph in a</p>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-16"
                                    disabled name="speed_zone" type="number" value="{{ $ticket->speed_zone }}">
                                <p>Zone</p>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Clocked Mode</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="speed_clocked_mode" type="text" value="{{ $ticket->speed_clocked_mode }}">
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
                                    disabled id="is_dui" name="is_dui">
                                    <option @selected($ticket->is_dui == 0) value="0">No</option>
                                    <option @selected($ticket->is_dui == 1) value="1">Yes</option>
                                </select>
                                <select class="ml-2 select-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    disabled id="is_drugs" name="is_drugs">
                                    <option @selected($ticket->is_drugs == 0) value="0">No</option>
                                    <option @selected($ticket->is_drugs == 1) value="1">Yes</option>
                                </select>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Test Method</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="dui_test_method" type="text" value="{{ $ticket->dui_test_method }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Test Result</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="dui_test_result" type="text" value="{{ $ticket->dui_test_result }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Test Administered By</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="dui_test_by" type="text" value="{{ $ticket->dui_test_by }}">
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
                                    disabled id="is_dui" name="vehicle_was_impounded">
                                    <option value="0"@selected($ticket->vehicle_was_impounded == 0)>No</option>
                                    <option value="1"@selected($ticket->vehicle_was_impounded == 1)>Yes</option>
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
                                    disabled id="is_dui" name="license_was_suspended">
                                    <option value="0"@selected($ticket->license_was_suspended == 0)>No</option>
                                    <option value="1"@selected($ticket->license_was_suspended == 1)>Yes</option>
                                </select>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2" x-data="{ open: false }">
                            <div class="w-full">
                                <div @click="open = !open" class="cursor-pointer select-none flex items-center">
                                    <p>Charges: {{ $ticket->charges->count() }}</p>

                                    <svg class="h-4 w-4 ml-3" fill="none" stroke-width="1.5" stroke="currentColor"
                                        viewBox="0 0 24 24" x-show="open == false" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                    <svg class="h-4 w-4 ml-3" fill="none" stroke-width="1.5" stroke="currentColor"
                                        viewBox="0 0 24 24" x-show="open == true" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m4.5 15.75 7.5-7.5 7.5 7.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </div>
                            <div class="w-full" x-show="open">
                                @foreach ($ticket->charges as $charge)
                                    <div class="grid grid-cols-4 gap-3 mt-3">
                                        <div class="col-span-3">
                                            <p class="text-xs italic">Charge</p>
                                            <input
                                                class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                                disabled name="dui_test_by" type="text"
                                                value="{{ $charge->penal_code->name }}">
                                        </div>
                                        <div class="">
                                            <p class="text-xs italic">Counts</p>
                                            <input
                                                class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                                disabled name="dui_test_by" type="text"
                                                value="{{ $charge->counts }}">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-3 mt-3">
                                        <div class="">
                                            <p class="text-xs italic">Jail Time (seconds)</p>
                                            <input
                                                class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                                disabled name="dui_test_by" type="text"
                                                value="{{ $charge->in_game_jail_time }}">
                                        </div>
                                        <div class="">
                                            <p class="text-xs italic">Fine ($)</p>
                                            <input
                                                class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                                disabled name="dui_test_by" type="text" value="{{ $charge->fine }}">
                                        </div>
                                        <div class="">
                                            <p class="text-xs italic">CAD Jail Time (hours)</p>
                                            <input
                                                class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                                disabled name="dui_test_by" type="text"
                                                value="{{ $charge->cad_jail_time }}">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 mt-3 gap-3">
                                        <div class="">
                                            <p class="text-xs italic">Description</p>
                                            <input
                                                class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                                disabled name="dui_test_by" type="text"
                                                value="{{ $charge->description }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="highway_street" type="text" value="{{ $ticket->highway_street }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Near Intersection</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="at_intersection" type="text" value="{{ $ticket->at_intersection }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">In/Near the City of</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="in_city_of" type="text" value="{{ $ticket->in_city_of }}">
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
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="weather" type="text" value="{{ $ticket->weather }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Traffic</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="traffic" type="text" value="{{ $ticket->traffic }}">
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
                                <textarea class="textarea-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    name="officer_comments">{{ $ticket->officer_comments }}</textarea>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="border-y-2 text-center border-blue-600 text-blue-600 font-bold my-3">
                        Section IV - Summons
                    </div>
                    <div class="mt-3">
                        @if ($ticket->plea_type == 1)
                            <div class="my-3">
                                <p>Ticket was plead guilty. No courtdate.</p>
                            </div>
                        @elseif($ticket->plea_type == 3)
                            <p>Court found Not Guilty.</p>
                        @elseif($ticket->plea_type == 4)
                            <p>Court found Guilty.</p>
                        @elseif($ticket->plea_type == 2 || $ticket->plea_type == 0)
                            @if (!$ticket->court_at)
                                <p>Old Ticket. Contact the court directly to find out court date</p>
                            @else
                                <div class="grid grid-cols-6 gap-3 mt-3">
                                    <div class="">
                                        <div class="mr-2">
                                            <p class="text-xs italic">Day</p>
                                        </div>
                                        <div>
                                            <input
                                                class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                                disabled type="text" value="{{ $ticket?->court_at->format('l') }}">
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <div class="mr-2">
                                            <p class="text-xs italic">Court Date/Time</p>
                                        </div>
                                        <div class="">
                                            <input
                                                class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                                disabled type="text"
                                                value="{{ $ticket?->court_at->format('m/d/Y @ H:i') }}">
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <div class="mr-2">
                                            <p class="text-xs italic">Court Location</p>
                                        </div>
                                        <div>
                                            <input
                                                class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                                disabled type="text" value="TBD">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="mr-2">
                                            <p class="text-xs italic">Room</p>
                                        </div>
                                        <div>
                                            <input
                                                class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                                disabled type="text" value="TBD">
                                        </div>
                                    </div>

                                </div>
                            @endif
                        @endif
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
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->updated_at->format('m/d/Y H:i') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Officer Signature</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->officer->name }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Badge Number</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->officer->user_department->badge_number }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Agency</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ $ticket->officer->user_department->department->initials }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="w-1/6 text-center space-y-4">
                    <button class="w-full py-1 text-blue-600 bg-gray-300 rounded-lg font-bold hover:bg-gray-400"
                        onclick="window.close();">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

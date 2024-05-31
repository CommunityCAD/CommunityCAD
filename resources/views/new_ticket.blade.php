@extends('layouts.cad_simple')

@section('content')
    <div class="">
        <div class="bg-blue-300 flex justify-between items-center">
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

                    <div class="grid grid-cols-3 gap-3">
                        <div class="flex">
                            <div class="mr-2">
                                <p>Related Case #</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div>
                                <input autofocus class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="number">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="text-center">
                            <input id="warning" name="" type="checkbox">
                            <label class="font-bold" for="warning">* * Warning * *</label>
                        </div>
                        <div class="flex">
                            <div class="mr-2">
                                <p>Citation <br>#</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="PENDING">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="col-span-3 grid grid-cols-2 gap-3">
                            <div class="flex space-x-3 items-center mx-auto">
                                <p>Upon:</p>
                                <p>Date</p>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-32"
                                    type="date" value="{{ date('Y-m-d') }}">
                                <p class="font-bold">Friday</p>
                            </div>
                            <div class="flex space-x-3 items-center">
                                <p>Time:</p>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-16"
                                    type="text" value="19:21">
                            </div>
                        </div>
                    </div>

                    <div class="border-y-2 text-center border-blue-600 text-blue-600 font-bold my-3">
                        Section I - Violator
                    </div>

                    <div class="grid grid-cols-6 gap-3">
                        <div class="col-span-6 text-sm" x-data="{ open: false }">
                            <div @click="open = !open" class="cursor-pointer select-none flex">
                                <p>Available Licenses</p>

                                <svg class="h-4 w-4 ml-3" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" x-show="open == false" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m19.5 8.25-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <svg class="h-4 w-4 ml-3" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" x-show="open == true" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m4.5 15.75 7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                            <div x-show="open">
                                <p>123456 - Drivers License License - <a class="text-blue-600" href="#">Choose
                                        License</a>
                                </p>
                                <p>123456 - Drivers License License</p>
                                <p>123456 - Drivers License License</p>
                                <p>123456 - Drivers License License</p>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Operator License No.</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div>
                                <input autofocus class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="number">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Class/Type</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="Drivers License">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">State</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="{{ get_setting('state') }}">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Expires</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="05/29/2024">
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
                                    type="text" value="Mike Jones (123456789)">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">DOB</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="08/39/2003">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Age</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="number" value="21">
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
                                    type="text" value="1234">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Street</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="Route 68">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">City</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="Sandy Shores">
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
                                    type="text" value="123-456-7890">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Race</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="White">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Gender</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="Male">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Height</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="6'11">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Weight</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="245lbs">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>

                    </div>

                    <div class="grid grid-cols-6 gap-3 mt-3">
                        <div class="col-span-6 text-sm" x-data="{ open: false }">
                            <div @click="open = !open" class="cursor-pointer select-none flex">
                                <p>Vehicle Search</p>

                                <svg class="h-4 w-4 ml-3" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" x-show="open == false" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m19.5 8.25-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <svg class="h-4 w-4 ml-3" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" x-show="open == true" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m4.5 15.75 7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                            <div x-show="open">
                                <div class="">
                                    <p>Plate:</p>
                                    <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-32"
                                        type="text">
                                </div>
                                <p>123456 - Green Ford F150 - RO: Mike Jones -
                                    <a class="text-blue-600" href="#">Choose
                                        Vehcile</a>
                                </p>
                                <p>123456 - Drivers License License</p>
                                <p>123456 - Drivers License License</p>
                                <p>123456 - Drivers License License</p>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Plate No.</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div>
                                <input autofocus
                                    class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="number">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Make</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="Ford F150">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Color</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="Green">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Status</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="Valid">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Expires</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" disabled
                                    type="text" value="05/29/2024">
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
                                    type="number" value="">
                                <p>mph in a</p>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-16"
                                    type="number" value="">
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
                                    type="text" value="Radar">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-3 mt-3">
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">DUI/Drugs</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div class="">
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-5"
                                    maxlength="1" type="Text" value="Y">
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1 w-5"
                                    maxlength="1" type="Text" value="N">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Test Method</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="Blood">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Test Result</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value=".13">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Test Administered By</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="Ron Swanson">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-3 mt-3">
                        <div class="col-span-6">Add Charges Section</div>
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
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="Route 68">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Near Intersection</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="Panarama">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">In/Near the City of</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="Grapeseed">
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
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="Clear">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Traffic</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="Medium">
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
                                <textarea class="textarea-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" type="text">Driver was a dick</textarea>
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>

                    <div class="border-y-2 text-center border-blue-600 text-blue-600 font-bold my-3">
                        Section IV - Summons
                    </div>

                    <div class="grid grid-cols-6 gap-3 mt-3">
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Day</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="Friday">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Court Date/Time</p>
                                {{-- <p class="text-xs text-red-600">Required.</p> --}}
                            </div>
                            <div class="">
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="06/29/2024 @ 20:18">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Court Location</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="Sandy Shores Courthouse">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Room</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="4A">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
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
                                    type="text" value="05/29/2024 @ 20:18">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mr-2">
                                <p class="text-xs italic">Officer Signature</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="Austin Hayden">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Badge Number</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="1A-1">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                        <div class="">
                            <div class="mr-2">
                                <p class="text-xs italic">Agency</p>
                            </div>
                            <div>
                                <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                                    type="text" value="BCSO">
                                {{-- Input Error: ring-red-600 ring-2 --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/6 text-center space-y-4">
                    <button
                        class="w-full py-1 text-blue-600 bg-gray-300 rounded-lg font-bold hover:bg-gray-400">Save</button>
                    <button
                        class="w-full py-1 text-blue-600 bg-gray-300 rounded-lg font-bold hover:bg-gray-400">Cancel</button>
                    <button
                        class="w-full py-1 text-blue-600 bg-gray-300 rounded-lg font-bold hover:bg-gray-400">Delete</button>
                    <button class="w-full py-1 text-blue-600 bg-gray-300 rounded-lg font-bold hover:bg-gray-400">Rdy To
                        Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

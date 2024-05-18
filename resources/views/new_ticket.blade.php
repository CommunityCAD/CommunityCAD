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
                    <p class="text-center font-bold text-2xl">{{ get_setting('state') }} UNIFORM CITATION - Officer Copy</p>
                    <div class="flex justify-between">
                        <p class="text-lg">State of {{ get_setting('state') }} <span class="underline font-semibold">
                                {{ get_setting('county') }}</span> County
                            District Court</p>
                        <p class="text-base">Citation No. <span class="underline font-semibold">240517001</span></p>
                    </div>
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">Your Court Date and Location</p>

                    <div class="border-2 border-black">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-2">
                                <span class="text-xs italic">Court Day of Week</span>
                                <p class="font-semibold">Friday</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Date</span>
                                <p class="font-semibold">5/31/2024</p>
                            </div>
                            <div class="col-span-1">
                                <span class="text-xs italic">Time</span>
                                <p class="font-semibold">9:00</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">Court Location</span>
                                <p class="font-semibold">Sandy Shores Courthouse</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Courtroom</span>
                                <p class="font-semibold">4a</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Agency Case Number</span>
                                <p class="font-semibold">2400248</p>
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
                                <p class="font-semibold">182875</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">State</span>
                                <p class="font-semibold">{{ get_setting('state') }}</p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">Name</span>
                                <p class="font-semibold">Byron Ragusa</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Race</span>
                                <p class="font-semibold">White</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Gender</span>
                                <p class="font-semibold">Male</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-2 border-black border-collapse">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-2">
                                <span class="text-xs italic">Suspend License</span>
                                <p class="font-semibold">No</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Class</span>
                                <p class="font-semibold">C</p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">Address</span>
                                <p class="font-semibold">3329 Joy Lane</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">City</span>
                                <p class="font-semibold">Burbank</p>
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
                                <p class="font-semibold">456-789-158</p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">Date of Birth</span>
                                <p class="font-semibold">9/5/1965</p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">Age</span>
                                <p class="font-semibold">58</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">What you are charged with</p>
                    <p>The officer named below has probable cause to believe that on or about <span
                            class="underline font-semibold">Tuesday</span>,
                        the <span class="underline font-semibold">17</span> day of <span
                            class="underline font-semibold">May</span> at <span class="underline font-semibold">18:20</span>
                        in the county named above
                        you did unlawfully and willfully</p>
                    <p>LIST CHARGES SOME HOW</p>
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">Your Vehicle</p>

                    <div class="border-2 border-black border-collapse">
                        <div class="grid grid-cols-12 divide-x-2 divide-black text-center">
                            <div class="col-span-3">
                                <span class="text-xs italic">Plate</span>
                                <p class="font-semibold">ABC123</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">Make</span>
                                <p class="font-semibold">FORD F150</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">Color</span>
                                <p class="font-semibold">Green</p>
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
                                <p class="font-semibold">Sandy Shores</p>
                            </div>
                            <div class="col-span-1">
                                <span class="text-xs italic">Weather</span>
                                <p class="font-semibold">Clear</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Traffic</span>
                                <p class="font-semibold">Light</p>
                            </div>
                            <div class="col-span-1">
                                <span class="text-xs italic">Accident</span>
                                <p class="font-semibold">No</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-xs italic">Speed</span>
                                <p class="font-semibold">55mph</p>
                            </div>
                            <div class="col-span-3">
                                <span class="text-xs italic">on Highway/Street</span>
                                <p class="font-semibold">Route 68</p>
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
                                <p class="font-semibold">Sandy Shores</p>
                            </div>
                            <div class="col-span-4">
                                <span class="text-xs italic">At/Near Intersection</span>
                                <p class="font-semibold">Panarama</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">Charging Officer Information</p>
                    <div class="flex justify-between">
                        <div class="">date</div>
                        <div class="">signature of officer</div>
                        <div class="">No.</div>
                        <div class="">Agency</div>
                    </div>
                </div>

                <div class="border-2 border-black p-2">
                    <p class="text-center font-bold text-2xl">Comments</p>
                    <div class="flex justify-between">
                        <div class="">Witness 1</div>
                        <div class="">Witness 2</div>
                        <div class="">Witness 3</div>
                        <div class="">Officer Comments</div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

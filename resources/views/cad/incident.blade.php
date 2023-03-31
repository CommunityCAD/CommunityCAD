@extends('layouts.cad')

@section('content')
    <div class="flex flex-col">
        <div class="flex items-center justify-around p-1 space-x-3 text-white rounded cursor-default">
            <p class="text-sm font-semibold">
                Officer {{ auth()->user()->officer_name ? auth()->user()->officer_name : auth()->user()->discord_name }}
            </p>
            <p class="text-lg"><span class="mr-3">{{ date('m/d/Y') }}</span><span id="running_clock"></span></p>
            <p class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z" />
                </svg>
                <span class="mx-3">Connected to live_database_prod</span>
            </p>
        </div>
        <div class="p-4 mt-5 space-y-3 text-white rounded cursor-default">
            <div class="flex">
                <div class="flex items-center w-1/5">
                    <span class="mr-2 text-lg">Call:</span>
                    <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">228</p>
                </div>
                <div class="flex items-center w-4/5 ml-3">
                    <span class="mr-2 text-lg">Nature:</span>
                    <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">Theft</p>
                </div>
            </div>

            <div class="flex items-center w-full">
                <span class="mr-2 text-lg">Addr:</span>
                <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">456 Route 68 Sandy Shores</p>
            </div>

        </div>

        <div class="p-4 mt-5 space-y-3 text-white rounded cursor-default">

            <div x-data="{
                openTab: 1,
                activeClasses: 'bg-blue-700 text-white border-b-4 border-b-black z-20',
                inactiveClasses: 'bg-blue-900 hover:bg-blue-800 hover:text-white',
            }" class="w-full mb-14">
                <div class="flex flex-wrap px-4 pt-3 rounded-lg">
                    <a href="#" @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses"
                        class="px-2 py-1 text-sm font-medium text-white border-t border-x">
                        Info
                    </a>
                    <a href="#" @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"
                        class="px-2 py-1 text-sm font-medium text-white border-t border-x">
                        Names
                    </a>
                    <a href="#" @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"
                        class="px-2 py-1 text-sm font-medium text-white border-t border-x">
                        Reports
                    </a>
                    <a href="#" @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"
                        class="px-2 py-1 text-sm font-medium text-white border-t border-x">
                        Call Log
                    </a>
                </div>
                <div class="uppercase border">
                    <div x-show="openTab === 1" class="p-6 text-base leading-relaxed">
                        <div class="space-y-1">
                            <p>Caller's mother passed away on 3/4/2023 when caller got the purse back. This will basicly be
                                the dispatchers notes from the 911 call.</p>
                            <div class="p-2">
                                <p>18:11:08 03/30/2023 - Dispatcher April Lovegate (1C-4)</p>
                                <p>Case number for the death investigation: #345</p>
                            </div>
                            <div class="p-2 border border-red-400">
                                <p>18:14:07 03/30/2023 - Officer Ron Swanson (1K-4)</p>
                                <p>10-4</p>
                            </div>
                        </div>

                        <div class="mt-2 border-t-2">
                            <textarea name="message" id="" class="w-full h-16 p-1 text-black uppercase"></textarea>
                            <input type="submit" value="SEND" class="secondary-button-md">
                        </div>
                    </div>
                    <div x-show="openTab === 2" class="p-6 text-base leading-relaxed" style="display: none">
                        <div class="flex p-4">
                            <div class="w-1/2">
                                <p class="text-lg font-semibold">Suspects</p>
                                <ul class="ml-8 list-disc">
                                    <li><a href="#" class="underline">John Doe</a></li>
                                </ul>

                                <p class="mt-3 text-lg font-semibold">Victims</p>
                                <ul class="ml-8 list-disc">
                                    <li><a href="#" class="underline">Jane Doe</a></li>
                                </ul>
                            </div>
                            <div class="w-1/2">
                                <p class="text-lg font-semibold">Other Parties</p>
                                <ul class="ml-8 list-disc">
                                    <li><a href="#" class="underline">Rickey Bobby (Witness)</a></li>
                                </ul>

                                <p class="mt-3 text-lg font-semibold">Officers</p>
                                <ul class="ml-8 list-disc">
                                    <li><a href="#" class="underline">Ron Swanson (Lead)</a></li>
                                    <li><a href="#" class="underline">Leslie Nopp (ONSCN)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div x-show="openTab === 3" class="p-6 text-base leading-relaxed" style="display: none">
                        <div class="flex justify-between">

                            <ul>
                                <li><a href="#" class="underline">Ron Swanson Incident Report</a></li>
                                <li><a href="#" class="underline">Jane Doe Statement</a></li>
                            </ul>

                            <div class="">
                                <a href="#" class="new-button-sm">New Report</a>
                            </div>
                        </div>
                    </div>
                    <div x-show="openTab === 4" class="p-6 text-base leading-relaxed" style="display: none">
                        <div class="space-y-1">
                            <div class="p-2">
                                <p>18:08:08 03/30/2023 - System</p>
                                <p>Call Generated</p>
                            </div>
                            <div class="p-2">
                                <p>18:10:08 03/30/2023 - System</p>
                                <p>Call Dispatched</p>
                            </div>
                            <div class="p-2">
                                <p>18:11:08 03/30/2023 - Dispatcher April Lovegate (1C-4)</p>
                                <p>Case number for the death investigation: #345</p>
                            </div>
                            <div class="p-2 border border-red-400">
                                <p>18:14:07 03/30/2023 - Officer Ron Swanson (1K-4)</p>
                                <p>10-4</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

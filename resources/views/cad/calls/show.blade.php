@extends('layouts.cad')

@section('content')
    <div class="flex flex-col uppercase">
        <div class="flex items-center justify-around p-1 space-x-3 text-white rounded cursor-default">
            <p class="text-sm font-semibold">
                Officer {{ auth()->user()->officer_name ? auth()->user()->officer_name : auth()->user()->discord_name }}
            </p>
            <p class="text-lg"><span class="mr-3">{{ date('m/d/Y') }}</span><span id="running_clock"></span></p>
            <p class="flex">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="mx-3">Connected to live_database_prod</span>
            </p>
        </div>
        <div class="p-4 mt-5 space-y-3 text-white rounded cursor-default">
            <div class="flex">
                <div class="flex items-center w-1/5">
                    <span class="mr-2 text-lg">Call:</span>
                    <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">
                        {{ str_pad($call->id, 5, 0, STR_PAD_LEFT) }}</p>
                </div>
                <div class="flex items-center w-4/5 ml-3">
                    <span class="mr-2 text-lg">Nature:</span>
                    <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">{{ $call->nature }}</p>
                </div>
            </div>

            <div class="flex items-center w-full">
                <span class="mr-2 text-lg">Addr:</span>
                <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">{{ $call->location }},
                    {{ $call->city }}</p>
            </div>

            <div class="flex">
                <div class="flex items-center w-1/5">
                    <span class="mr-2 text-lg">Status:</span>
                    <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">{{ $call->status }}</p>
                </div>
                <div class="flex items-center w-1/5 ml-3">
                    <span class="mr-2 text-lg">Pri:</span>
                    <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">{{ $call->priority }}</p>
                </div>
                <div class="flex items-center w-1/5 ml-3">
                    <span class="mr-2 text-lg">Type:</span>
                    <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">{{ $call->type_name }}</p>
                </div>
                <div class="flex items-center w-1/5 ml-3">
                    <span class="mr-2 text-lg">Lead:</span>
                    <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">
                        {{ $call->user_id != null ? $call->user->officer_name_check : 'None' }}</p>
                </div>
                <div class="flex items-center w-1/5 ml-3">
                    <span class="mr-2 text-lg">RP:</span>
                    <p class="w-full px-1 py-1 text-lg font-bold border-2 border-white">
                        {{ $call->civilian_id != null ? $call->civilian->first_name . ' ' . $call->civilian->last_name : 'None' }}
                    </p>
                    <a class="ml-3" href="#">
                        <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="p-4 mt-5 space-y-3 text-white rounded cursor-default">

            <div class="w-full mb-14" x-data="{
                openTab: 1,
                activeClasses: 'bg-blue-700 text-white border-b-4 border-b-black z-20',
                inactiveClasses: 'bg-blue-900 hover:bg-blue-800 hover:text-white',
            }">
                <div class="flex flex-wrap px-4 pt-3 rounded-lg">
                    <a @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses"
                        class="px-2 py-1 text-sm font-medium text-white border-t border-x" href="#">
                        Info
                    </a>
                    <a @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"
                        class="px-2 py-1 text-sm font-medium text-white border-t border-x" href="#">
                        Names
                    </a>
                    <a @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"
                        class="px-2 py-1 text-sm font-medium text-white border-t border-x" href="#">
                        Reports
                    </a>
                    <a @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"
                        class="px-2 py-1 text-sm font-medium text-white border-t border-x" href="#">
                        Call Log
                    </a>
                </div>
                <div class="uppercase border">
                    <div class="p-6 text-base leading-relaxed" x-show="openTab === 1">
                        <div class="space-y-1">
                            <p>{{ $call->narrative }}</p>
                            <hr>
                            <livewire:cad.call-log call="{{ $call->id }}">
                        </div>

                        <div class="mt-2 border-t-2">
                            <form action="{{ route('cad.call_log.store', $call->id) }}" method="POST">
                                @csrf
                                <textarea class="textarea-input" id="" name="text" required></textarea>
                                <button class="button-md bg-gray-600 hover:bg-gray-500 text-white"
                                    type="submit">SAVE</button>
                            </form>
                        </div>
                    </div>
                    <div class="p-6 text-base leading-relaxed" style="display: none" x-show="openTab === 2">
                        <div class="flex p-4">
                            <div class="w-1/2">
                                <p class="text-lg font-semibold">Suspects</p>
                                <ul class="ml-8 list-disc">
                                    <li><a class="underline" href="#">John Doe</a></li>
                                </ul>

                                <p class="mt-3 text-lg font-semibold">Victims</p>
                                <ul class="ml-8 list-disc">
                                    <li><a class="underline" href="#">Jane Doe</a></li>
                                </ul>
                            </div>
                            <div class="w-1/2">
                                <p class="text-lg font-semibold">Other Parties</p>
                                <ul class="ml-8 list-disc">
                                    <li><a class="underline" href="#">Rickey Bobby (Witness)</a></li>
                                </ul>

                                <p class="mt-3 text-lg font-semibold">Officers</p>
                                <ul class="ml-8 list-disc">
                                    <li><a class="underline" href="#">Ron Swanson (Lead)</a></li>
                                    <li><a class="underline" href="#">Leslie Nopp (ONSCN)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-base leading-relaxed" style="display: none" x-show="openTab === 3">
                        <div class="flex justify-between">

                            <ul>
                                <li><a class="underline" href="#">Ron Swanson Incident Report</a></li>
                                <li><a class="underline" href="#">Jane Doe Statement</a></li>
                            </ul>

                            <div class="">
                                <a class="new-button-sm" href="#">New Report</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-base leading-relaxed" style="display: none" x-show="openTab === 4">
                        <div class="space-y-1">
                            <livewire:cad.call-log call="{{ $call->id }}">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

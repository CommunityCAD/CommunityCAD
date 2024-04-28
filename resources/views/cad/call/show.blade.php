@extends('layouts.cad')

@section('content')
    <div class="sticky top-0 z-50">
        @include('inc.cad.mdt-nav')
    </div>

    <div class="relative h-screen">
        <div class="bg-gray-800 mb-3">
            <div class="max-w-7xl mx-auto flex justify-between text-white">
                <p>ID: {{ $call->id }}</p>
                <p>Nature: {{ $call->nature }} - {{ $call->nature_info['name'] }}</p>
                <p>Entery Started: {{ $call->created_at->format('H:i:s m/d/Y') }}</p>
                <p>Last Update: {{ $call->updated_at->format('H:i:s m/d/Y') }}</p>
            </div>
        </div>
        <div class="grid-cols-12 grid max-w-7xl mx-auto text-white h-max" x-data="{
            openTab: 1,
            activeClasses: 'bg-[#131c23] text-white border-b-4 border-b-black z-20',
            inactiveClasses: 'bg-[#2e3547] hover:bg-[#131c23] hover:text-white',
        }">
            <div class="text-center bg-[#2e3547] divide-y-2">
                <a :class="openTab === 1 ? activeClasses : inactiveClasses" @click="openTab = 1" class="block py-3"
                    href="#">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    INFO
                </a>
                <a :class="openTab === 2 ? activeClasses : inactiveClasses" @click="openTab = 2" class="block py-3"
                    href="#">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Civilians
                </a>
                <a :class="openTab === 3 ? activeClasses : inactiveClasses" @click="openTab = 3" class="block py-3"
                    href="#">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Vehicles
                </a>
                <a :class="openTab === 4 ? activeClasses : inactiveClasses" @click="openTab = 4" class="block py-3"
                    href="#">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Reports
                </a>
                {{-- <a :class="openTab === 5 ? activeClasses : inactiveClasses" @click="openTab = 5" class="block py-3"
                    href="#">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Evidence
                </a>

                <a :class="openTab === 6 ? activeClasses : inactiveClasses" @click="openTab = 6" class="block py-3"
                    href="#">
                    <svg class="w-8 h-8 mx-auto" fill="#ffffff" id="Layer_1" stroke="#ffffff" version="1.1"
                        viewBox="0 0 508.053 508.053" width="200px" xml:space="preserve"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <path
                                        d="M475.897,76.703l-62.1-64.6c-4.5-4.6-11.5-5.7-17.1-2.5c-54.4,30.8-123.5-1.5-135.1-7.4c-3.7-2.4-8.5-2.9-12.7-1.2 c-0.9,0.3-1.7,0.8-2.5,1.3c-12,6.1-80.8,38-135,7.4c-5.6-3.2-12.6-2.1-17.1,2.5l-62.2,64.5c-3.3,3.5-4.7,8.4-3.6,13.1 c0.3,1.2,28.4,120.5,10.3,181.6c-0.1,0.3-0.2,0.6-0.2,0.9c-1.5,6.2-31.6,153.7,210.8,235c3.1,1,6.2,1,9.1,0 c242.5-81.3,212.4-228.8,211-235c-0.1-0.3-0.2-0.6-0.2-0.9c-18.1-61.1,10-180.4,10.3-181.6 C480.597,85.103,479.297,80.103,475.897,76.703z M441.997,278.803c1.3,7.2,20.5,128.6-188,200.2 c-208.8-71.8-189.7-191.5-188-200.2c17.3-59.6-2.2-159.6-8.3-188l49.6-51.6c58.7,26.5,125,0.7,146.7-9.3 c21.7,10,88,35.8,146.7,9.3l49.6,51.6C444.097,119.203,424.697,219.203,441.997,278.803z">
                                    </path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M390.197,187.003l-93.6-0.3l-29.2-88.9c-4.3-12.9-22.6-12.9-26.8,0l-29.2,88.9l-93.6,0.3c-13.6,0-19.3,17.5-8.3,25.5 l75.6,55.3l-28.7,89.1c-4.2,13,10.6,23.7,21.7,15.8l75.9-54.8l75.9,54.8c11,8,25.9-2.8,21.7-15.8l-28.7-89.1l75.6-55.3 C409.497,204.503,403.797,187.103,390.197,187.003z M297.997,251.003c-4.9,3.6-7,9.9-5.1,15.7l18.6,57.9l-49.2-35.6 c-4.9-3.6-11.6-3.6-16.5,0l-49.3,35.6l18.6-57.9c1.9-5.8-0.2-12.1-5.1-15.7l-49.1-35.9l60.8-0.2c6.1,0,11.5-3.9,13.4-9.7l19-57.8 l19,57.8c1.9,5.8,7.3,9.7,13.4,9.7l60.8,0.2L297.997,251.003z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    Officers
                </a> --}}

            </div>

            <div class="col-span-8">
                <h1 class="text-xl text-center font-bold text-white">Call {{ $call->id }} - ({{ $call->nature }})
                    {{ $call->nature_info['name'] }}</h1>
                <p class="text-lg text-center font-bold text-white">Status - ({{ $call->status }})
                    {{ $call->status_info['name'] }}</p>

                <div class="p-2 text-base leading-relaxed" x-show="openTab === 1">
                    <div class="max-w-7xl mx-auto p-2">
                        <form action="{{ route('cad.call.update', $call->id) }}"
                            class="p-2 mt-5 space-y-2 text-white border border-white rounded cursor-default" method="POST">
                            @csrf
                            @method('PUT')
                            <h1 class="text-xl font-semibold">Location</h1>
                            <div class="flex items-center">
                                <div class="w-3/5">
                                    <p class="block mr-2">Incident Address:</p>
                                    <p class="bg-gray-700 w-full px-1 py-1 rounded-sm">{{ $call->location }}</p>
                                </div>
                                <div class="w-2/5 ml-3">
                                    <p class="block mr-2">City:</p>
                                    <p class="bg-gray-700 w-full px-1 py-1 rounded-sm">{{ $call->city }}</p>
                                </div>
                            </div>
                            <hr>
                            <h1 class="text-xl font-semibold">Caller Info</h1>
                            <hr>
                            @foreach ($rps as $call_civilian)
                                <div class="bg-gray-200 rounded-lg p-2 text-black text-sm">
                                    <div class="flex justify-between items-center border-b-2 border-blue-600">
                                        <p class="text-lg">{{ strtoupper(get_setting('state')) }}</p>
                                        <p class="text-sm">{{ $call_civilian->civilian->s_n_n }}</p>
                                    </div>
                                    <div class="flex justify-between mt-1">
                                        <div class="h-20 w-20">
                                            @if (is_null($call_civilian->civilian->picture))
                                                <svg class="w-20 h-20" fill="none" stroke-width="1.5"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            @else
                                                <img alt="" src="{{ $call_civilian->civilian->picture }}">
                                            @endif

                                        </div>
                                        <div class="ml-3">
                                            <p><span class="text-blue-500 text-xs">LN</span>
                                                {{ $call_civilian->civilian->last_name }}</p>
                                            <p><span class="text-blue-500 text-xs">FN</span>
                                                {{ $call_civilian->civilian->first_name }}</p>
                                            <p>{{ $call_civilian->civilian->postal }}
                                                {{ $call_civilian->civilian->street }}
                                            </p>
                                            <p>{{ $call_civilian->civilian->city }}</p>
                                            <p><span class="text-blue-500 text-xs">DOB</span>
                                                {{ $call_civilian->civilian->date_of_birth->format('m/d/Y') }}</p>
                                        </div>
                                        <div>
                                            <p><span class="text-blue-500 text-xs">SEX</span>
                                                {{ $call_civilian->civilian->gender }}</p>
                                            <p><span class="text-blue-500 text-xs">HGT</span> 5'-09"</p>
                                            <p><span class="text-blue-500 text-xs">WGT</span> 150lb</p>
                                        </div>
                                    </div>
                                    <div class="border-t-2 border-black flex justify-between">
                                        <p class=""><span class="text-blue-500 text-xs">ROLE</span>
                                            {{ $call_civilian->type }}</p>

                                        <a class="text-red-600 hover:underline"
                                            href="{{ route('cad.call.remove_civilian', [$call->id, $call_civilian->civilian->id]) }}">Remove
                                        </a>

                                        <a class="text-blue-600 hover:underline flex items-center"
                                            href="{{ route('cad.name.return', $call_civilian->civilian->id) }}">RUN
                                            <svg class="w-3 h-3 ml-2" fill="none" stroke-width="1.5"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <h1 class="text-xl font-semibold">CAD Incident</h1>
                            <div class="flex items-center">
                                <div class="w-3/5">
                                    <p class="block mr-2">Nature:</p>
                                    <select class="select-input-sm" name="nature">
                                        @foreach ($call_natures as $code => $props)
                                            <option @selected($call->nature == $code) value="{{ $code }}">
                                                {{ $code }} -
                                                {{ $props['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('nature')" class="mt-2" />
                                </div>
                                <div class="w-2/5 ml-3">
                                    <p class="block mr-2">Received via:</p>
                                    <p class="bg-gray-700 w-full px-1 py-1 rounded-sm">{{ $call->source }}</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-1/3">
                                    <label class="block mr-2">Priority:</label>
                                    <select class="select-input-sm" name="priority">
                                        <option @selected($call->priority == 1) value="1">1</option>
                                        <option @selected($call->priority == 2) value="2">2</option>
                                        <option @selected($call->priority == 3) value="3">3</option>
                                        <option @selected($call->priority == 4) value="4">4</option>
                                        <option @selected($call->priority == 5) value="5">5</option>
                                    </select>
                                </div>
                                <div class="w-1/3 ml-3">
                                    <p class="block mr-2">Type:</p>
                                    <p class="bg-gray-700 w-full px-1 py-1 rounded-sm">{{ $call->type_name }}</p>
                                </div>
                                <div class="w-1/3 ml-3">
                                    <label class="block mr-2">Status:</label>
                                    <select class="select-input-sm" name="status">
                                        @foreach ($call_statuses as $code => $props)
                                            <option @selected($call->status == $code) value="{{ $code }}">
                                                {{ $code }} -
                                                {{ $props['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-full">
                                    <label class="block mr-2">Narrative:</label>
                                    <p class="bg-gray-700 w-full px-1 py-1 rounded-sm">{{ $call->narrative }}</p>
                                </div>
                            </div>
                            <button class="button-md bg-gray-600 hover:bg-gray-500 text-white" type="submit">Update
                                CALL</button>
                        </form>
                    </div>
                </div>

                <div class="p-6 text-base leading-relaxed" x-show="openTab === 2">
                    <p class="text-center mb-2">You can add civilians on their return page.</p>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($call->call_civilians as $call_civilian)
                            <div class="bg-gray-200 rounded-lg p-2 text-black text-sm">
                                <div class="flex justify-between items-center border-b-2 border-blue-600">
                                    <p class="text-lg">{{ strtoupper(get_setting('state')) }}</p>
                                    <p class="text-sm">{{ $call_civilian->civilian->s_n_n }}</p>
                                </div>
                                <div class="flex justify-between mt-1">
                                    <div class="h-20 w-20">
                                        @if (is_null($call_civilian->civilian->picture))
                                            <svg class="w-20 h-20" fill="none" stroke-width="1.5"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        @else
                                            <img alt="" src="{{ $call_civilian->civilian->picture }}">
                                        @endif

                                    </div>
                                    <div class="ml-3">
                                        <p><span class="text-blue-500 text-xs">LN</span>
                                            {{ $call_civilian->civilian->last_name }}</p>
                                        <p><span class="text-blue-500 text-xs">FN</span>
                                            {{ $call_civilian->civilian->first_name }}</p>
                                        <p>{{ $call_civilian->civilian->postal }} {{ $call_civilian->civilian->street }}
                                        </p>
                                        <p>{{ $call_civilian->civilian->city }}</p>
                                        <p><span class="text-blue-500 text-xs">DOB</span>
                                            {{ $call_civilian->civilian->date_of_birth->format('m/d/Y') }}</p>
                                    </div>
                                    <div>
                                        <p><span class="text-blue-500 text-xs">SEX</span>
                                            {{ $call_civilian->civilian->gender }}</p>
                                        <p><span class="text-blue-500 text-xs">HGT</span> 5'-09"</p>
                                        <p><span class="text-blue-500 text-xs">WGT</span> 150lb</p>
                                    </div>
                                </div>
                                <div class="border-t-2 border-black flex justify-between">
                                    <p class=""><span class="text-blue-500 text-xs">ROLE</span>
                                        {{ $call_civilian->type }}</p>

                                    <a class="text-red-600 hover:underline"
                                        href="{{ route('cad.call.remove_civilian', [$call->id, $call_civilian->civilian->id]) }}">Remove
                                    </a>

                                    <a class="text-blue-600 hover:underline flex items-center"
                                        href="{{ route('cad.name.return', $call_civilian->civilian->id) }}">RUN
                                        <svg class="w-3 h-3 ml-2" fill="none" stroke-width="1.5"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="p-6 text-base leading-relaxed" x-show="openTab === 3">
                    <p class="text-center mb-2">You can add vehicles on their return page.</p>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($call->call_vehicles as $call_vehicle)
                            <div class="bg-gray-200 rounded-lg p-2 text-black text-sm">
                                <div class="">
                                    <p class="text-lg text-center">{{ strtoupper(get_setting('state')) }}</p>
                                </div>
                                <div class="mt-1">
                                    <p class="text-5xl text-center">{{ $call_vehicle->vehicle->plate }}</p>
                                </div>
                                <div class="mt-1 flex ">
                                    <p class=""><span class="text-blue-500 text-xs">MK</span>
                                        {{ $call_vehicle->vehicle->model }}
                                    </p>
                                    <p class="ml-3"><span class="text-blue-500 text-xs">CL</span>
                                        {{ $call_vehicle->vehicle->color }}
                                    </p>
                                </div>
                                <div class="border-t-2 border-black flex justify-between">
                                    <p class=""><span class="text-blue-500 text-xs">ROLE</span>
                                        {{ $call_vehicle->type }}
                                    </p>

                                    <a class="text-red-600 hover:underline"
                                        href="{{ route('cad.call.remove_vehicle', [$call->id, $call_vehicle->vehicle->id]) }}">Remove
                                    </a>

                                    <a class="text-blue-600 hover:underline flex items-center"
                                        href="{{ route('cad.vehicle.return', $call_vehicle->vehicle->plate) }}">RUN
                                        <svg class="w-3 h-3 ml-2" fill="none" stroke-width="1.5"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="p-6 text-base leading-relaxed" x-show="openTab === 4">
                    <div class="grid grid-cols-2 gap-2">
                        @forelse ($call->reports as $report)
                            <div class="bg-gray-200 rounded-lg p-2 text-black text-sm">
                                <a href="#"
                                    onclick="openExternalWindow('{{ route('cad.report.show', $report->id) }}')">
                                    <div class="mt-1">
                                        <svg class="w-16 h-16 mx-auto" fill="none" stroke-width="1.5"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="mt-1 flex ">
                                        <p class=""><span class="text-blue-500 text-xs">Name</span>
                                            {{ $report->title }}
                                        </p>

                                    </div>
                                    <div class="border-t-2 border-black flex justify-between">
                                        <p class=""><span class="text-blue-500 text-xs">OFF</span>
                                            {{ $report->officer->name ?? $report->user->preferred_name }}
                                        </p>
                                        <p class="ml-3"><span class="text-blue-500 text-xs">ID</span>
                                            {{ $report->id }}
                                        </p>
                                        <p class="ml-3"><span class="text-blue-500 text-xs">TY</span>
                                            {{ $report->report_type->title }}
                                        </p>
                                    </div>
                                </a>
                            </div>

                        @empty
                            <p>No Reports Linked To This Call.</p>
                        @endforelse
                        <hr class="col-span-2">
                        @foreach ($call->tickets as $ticket)
                            @php
                                if ($ticket->type_id == 1) {
                                    $type = 'Warning';
                                } elseif ($ticket->type_id == 2) {
                                    $type = 'Ticket';
                                } elseif ($ticket->type_id == 3) {
                                    $type = 'Arrest';
                                }
                            @endphp
                            <div class="bg-gray-200 rounded-lg p-2 text-black text-sm">
                                <a href="#"
                                    onclick="openExternalWindow('{{ route('cad.ticket.show', $ticket->id) }}')">
                                    <div class="mt-1">
                                        @if ($type == 'Warning')
                                            <svg class="w-16 h-16 mx-auto" fill="none" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M12 7.75V13" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" stroke="#292D32"></path>
                                                    <path
                                                        d="M21.08 8.58003V15.42C21.08 16.54 20.48 17.58 19.51 18.15L13.57 21.58C12.6 22.14 11.4 22.14 10.42 21.58L4.47998 18.15C3.50998 17.59 2.90997 16.55 2.90997 15.42V8.58003C2.90997 7.46003 3.50998 6.41999 4.47998 5.84999L10.42 2.42C11.39 1.86 12.59 1.86 13.57 2.42L19.51 5.84999C20.48 6.41999 21.08 7.45003 21.08 8.58003Z"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        stroke="#292D32"></path>
                                                    <path d="M12 16.2V16.2999" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" stroke="#292D32"></path>
                                                </g>
                                            </svg>
                                        @elseif($type == 'Ticket')
                                            <svg class="w-16 h-16 mx-auto" fill="none" stroke="#000000"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M9 9H15M9 12H15M9 15H15M5 3V21L8 19L10 21L12 19L14 21L16 19L19 21V3L16 5L14 3L12 5L10 3L8 5L5 3Z"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        stroke="#000000"></path>
                                                </g>
                                            </svg>
                                        @elseif($type == 'Arrest')
                                            <svg class="w-16 h-16 mx-auto" id="Layer_1" version="1.1"
                                                viewBox="0 0 392.533 392.533" width="200px" xml:space="preserve"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M300.057,0c-29.673,0-56.048,14.093-73.05,35.879h-52.622c-6.012,0-10.925,4.849-10.925,10.925v36.137 c-42.408,4.59-76.283,38.141-81.131,80.549H46.772c-6.012,0-10.925,4.848-10.925,10.925v52.622 c-21.786,16.937-35.814,43.313-35.814,72.986c0,51.006,41.503,92.509,92.509,92.509s92.509-41.503,92.509-92.509 c0-29.673-14.093-56.048-35.879-73.05v-52.622c0-6.012-4.849-10.925-10.925-10.925h-33.939 c4.655-30.319,28.768-54.174,59.087-58.505v33.293c0,6.012,4.848,10.925,10.925,10.925h52.622 c16.937,21.786,43.378,35.879,73.05,35.879c51.006,0,92.509-41.503,92.509-92.509C392.501,41.503,351.063,0,300.057,0z M163.329,300.024c0,39.047-31.741,70.723-70.723,70.723c-39.046,0-70.723-31.741-70.723-70.723s31.741-70.723,70.723-70.723 C131.523,229.236,163.329,261.042,163.329,300.024z M127.386,185.277v29.091c-10.731-4.396-22.497-6.853-34.844-6.853 s-24.113,2.457-34.844,6.853v-29.091H127.386z M214.4,127.418h-29.091v-0.065V57.729H214.4 c-4.396,10.731-6.853,22.497-6.853,34.844S210.004,116.687,214.4,127.418z M300.057,163.297 c-39.046,0-70.723-31.741-70.723-70.723s31.741-70.723,70.723-70.723s70.723,31.741,70.723,70.723 S339.038,163.297,300.057,163.297z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        @endif

                                    </div>
                                    <div class="mt-1">
                                        <p class=""><span class="text-blue-500 text-xs">Name</span>
                                            {{ $ticket->civilian->name }} |
                                            {{ $ticket->offense_occured_at->format('m/d/Y H:i') }}
                                        </p>
                                        <p><span class="text-blue-500 text-xs">CHRG</span>
                                            @foreach ($ticket->charges as $charge)
                                                @if (!$loop->last)
                                                    {{ $charge->penal_code->name }} (x{{ $charge->counts }}),
                                                @else
                                                    {{ $charge->penal_code->name }} (x{{ $charge->counts }})
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="border-t-2 border-black flex justify-between">
                                        <p class=""><span class="text-blue-500 text-xs">OFF</span>
                                            {{ $ticket->officer->name ?? $ticket->user->preferred_name }}
                                        </p>
                                        <p class="ml-3"><span class="text-blue-500 text-xs">ID</span>
                                            {{ $ticket->id }}
                                        </p>
                                        <p class="ml-3"><span class="text-blue-500 text-xs">TY</span>
                                            {{ $type }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="p-6 text-base leading-relaxed" x-show="openTab === 5">
                    Evidence
                </div>
                <div class="p-6 text-base leading-relaxed" x-show="openTab === 6">
                    Officers
                </div>
            </div>
            <div class="col-span-3">
                <div>
                    @livewire('cad.call-chat', ['call' => $call])
                </div>
            </div>
        </div>
    </div>
@endsection

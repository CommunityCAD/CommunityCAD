@extends('layouts.cad')

@section('content')
    <div class="flex flex-col uppercase text-white">
        <div class="flex items-center justify-around p-1 space-x-3 rounded cursor-default">
            <p class="text-sm font-semibold">
                Officer {{ auth()->user()->officer_name_check }}
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

        <div class="flex flex-row">
            <div class="w-1/2 mx-auto p-4">
                <h1 class="text-2xl">Call {{ str_pad($call->id, 5, 0, STR_PAD_LEFT) }} | Status:
                    {{ $call->status }} - {{ $call->status_info['name'] }}</h1>
                <h3 class="">Last Update:
                    {{ $call->updated_at->format('m/d/Y H:i:s') }}</h3>
                <div class="p-4 mt-5 space-y-3 border border-white rounded cursor-default">
                    <h1 class="text-xl font-semibold">Call Info</h1>
                    <div class="space-y-1">
                        <p class=""><span class="mr-2 text-lg">Status:</span>
                            {{ $call->status }}</p>
                        <p class=""><span class="mr-2 text-lg">Type:</span>
                            {{ $call->type }}</p>
                        <p class=""><span class="mr-2 text-lg">Nature:</span>
                            {{ $call->nature }}</p>
                        <p class=""><span class="mr-2 text-lg">Source:</span>
                            {{ $call->source }}</p>
                        <p class=""><span class="mr-2 text-lg">Address:</span>
                            {{ $call->location }}, {{ $call->city }}</p>
                        <p class=""><span class="mr-2 text-lg">Priority:</span>
                            {{ $call->priority }}</p>
                        <hr>
                        <p class=""><span class="mr-2 text-lg">Narrative:</span>
                            {{ $call->narrative }}</p>
                        <hr>
                    </div>
                    <h1 class="text-xl font-semibold my-4">Reporting Persons</h1>
                    <div class="space-y-4">
                        @if (!$call->civilian)
                            <p>No Reporting person listed.</p>
                        @else
                            <p class=""><a href="{{ route('cad.name.return', $call->civilian->id) }}"
                                    target="_blank"><span class="mr-2 text-lg">Name:</span>
                                    {{ $call->civilian->name }}</a></p>
                            <p class=""><a href="{{ route('cad.name.return', $call->civilian->id) }}"
                                    target="_blank"><span class="mr-2 text-lg">SSN:</span>
                                    {{ $call->civilian->s_n_n }}</a></p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="w-1/2 p-4 mt-5 space-y-3 text-white rounded cursor-default">
                <div class="">
                    <a class="new-button-sm" href="#"
                        onclick="openExternalWindow('{{ route('cad.report.create') }}?call={{ $call->id }}')">New
                        Report</a>
                    <a class="secondary-button-sm" href="{{ route('cad.cad') }}">Back To CAD</a>
                    <a class="edit-button-sm" href="{{ route('cad.call.show', $call->id) }}" target="_blank">new
                        tab</a>
                </div>
                <div class="w-full mb-14" x-data="{
                    openTab: 1,
                    activeClasses: 'bg-blue-700 text-white border-b-4 border-b-black z-20',
                    inactiveClasses: 'bg-blue-900 hover:bg-blue-800 hover:text-white',
                }">
                    <div class="flex flex-wrap px-4 pt-3 rounded-lg">
                        <a :class="openTab === 1 ? activeClasses : inactiveClasses" @click="openTab = 1"
                            class="px-2 py-1 text-sm font-medium text-white border-t border-x" href="#">
                            Log
                        </a>
                        <a :class="openTab === 2 ? activeClasses : inactiveClasses" @click="openTab = 2"
                            class="px-2 py-1 text-sm font-medium text-white border-t border-x" href="#">
                            Persons
                        </a>
                        <a :class="openTab === 3 ? activeClasses : inactiveClasses" @click="openTab = 3"
                            class="px-2 py-1 text-sm font-medium text-white border-t border-x" href="#">
                            Reports
                        </a>
                        <a :class="openTab === 4 ? activeClasses : inactiveClasses" @click="openTab = 4"
                            class="px-2 py-1 text-sm font-medium text-white border-t border-x" href="#">
                            Units
                        </a>
                    </div>
                    <div class="uppercase border">
                        <div class="p-6 text-base leading-relaxed" x-show="openTab === 1">
                            @livewire('cad.call-chat-tab', ['call_id' => $call->id])
                        </div>
                        <div class="p-6 text-base leading-relaxed" style="display: none" x-show="openTab === 2">
                            <form action="{{ route('cad.add_persons', $call->id) }}"
                                class="w-full  pb-3 border-b-2 border-white" method="POST">
                                @csrf
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <label for="">SSN</label>
                                        <input class="text-input" name="civilian_id" type="number">
                                    </div>
                                    <div class="w-1/2 ml-2">
                                        <label for="">Type</label>
                                        <select class="select-input" id="" name="type">
                                            <option value="RP">REPORTING PARTY</option>
                                            <option value="SUSPECT">SUSPECT</option>
                                            <option value="VICTIM">VICTIM</option>
                                            <option value="WITNESS">WITNESS</option>
                                            <option value="OTHER">OTHER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full mt-3">
                                    <input class="button-md bg-green-700 hover:bg-green-600" type="submit" value="SAVE">
                                </div>
                            </form>
                            <div class="p-4">
                                <div class="w-1/2">
                                    <p class="text-lg font-semibold">LINKED PERSONS</p>
                                    @forelse ($call->call_civilians as $civilian)
                                        <ul class="ml-8 list-disc">
                                            <li><a class="underline"
                                                    href="{{ route('cad.name.return', $civilian->civilian->id) }}"
                                                    target="_blank">{{ $civilian->civilian->name }}
                                                    ({{ $civilian->type }})
                                                </a>
                                            </li>
                                        </ul>
                                    @empty
                                        <p>NO PERSONS LINKED TO THIS CALL</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="p-6 text-base leading-relaxed" style="display: none" x-show="openTab === 3">
                            <div class="flex justify-between">

                                <ul class="space-y-2">
                                    @forelse ($call->reports as $report)
                                        <li class="underline">
                                            <a href="#"
                                                onclick="openExternalWindow('{{ route('cad.report.show', $report->id) }}')">
                                                Report: {{ $report->id }}
                                                | {{ $report->title }} | Created By:
                                                {{ $report->user->officer_name_check }}
                                            </a>
                                        </li>
                                    @empty
                                        <li>No Reports Linked To This Call.</li>
                                    @endforelse
                                </ul>

                            </div>
                        </div>
                        <div class="p-6 text-base leading-relaxed" style="display: none" x-show="openTab === 4">
                            <div class="space-y-1">
                                <p class="underline">Attached Units</p>
                                @foreach ($call->nice_units as $unit)
                                    <p>{{ $unit }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row">
            <div class="w-1/2 mx-auto p-4">
                <div class="p-4 mt-5 space-y-3 border border-white rounded cursor-default">
                    <h1 class="text-xl font-semibold">Update Call</h1>
                    <form action="{{ route('cad.call.update', $call->id) }}" class="space-y-2" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="w-full">
                            <label class="block mr-2 text-lg">Status:</label>
                            <select class="select-input" name="status">
                                @foreach ($call_statuses as $code => $props)
                                    <option @selected($call->status == $code) value="{{ $code }}">{{ $code }}
                                        - {{ $props['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('nature')" class="mt-2" />
                        </div>

                        <div class="w-full">
                            <label class="block mr-2 text-lg">Location:</label>
                            <input class="text-input" name="location" type="text" value="{{ $call->location }}">
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <label class="block mr-2 text-lg">City:</label>
                            <input class="text-input" name="city" type="text" value="{{ $call->city }}">
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <label class="block mr-2 text-lg">Nature:</label>
                            <select class="select-input" name="nature">
                                @foreach ($call_natures as $code => $props)
                                    <option @selected($call->nature == $code) value="{{ $code }}">{{ $code }}
                                        - {{ $props['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('nature')" class="mt-2" />
                        </div>
                        <div>
                            <button class="edit-button-md">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="w-1/2 p-4 mt-5 space-y-3 text-white rounded cursor-default">

            </div>
        </div>
    </div>

    <script>
        function openExternalWindow(url) {
            return window.open(
                url,
                "_blank",
                "height=800,width=900,scrollbars=no,status=yes",
                true
            );
        }
    </script>
@endsection

<div wire:poll.5s>

    <div class="p-4 mt-5 text-white rounded cursor-default">
        <main class="">

            <div class="flex justify-between">
                @if (false)
                    <p class="flex text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                        </svg>
                        <span class="ml-4">Dispatch Online</span>
                    </p>
                    <a href="{{ route('cad.call.create') }}" class="new-button-md">New Call</a>
                @else
                    <p class="flex text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 3.75L18 6m0 0l2.25 2.25M18 6l2.25-2.25M18 6l-2.25 2.25m1.5 13.5c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                        </svg>

                        <span class="ml-4">Dispatch Offline</span>
                    </p>
                    <a href="{{ route('cad.call.create') }}" class="new-button-md">New Call</a>
                @endif

            </div>

            <table class="w-full mt-4 uppercase border border-collapse table-auto border-slate-400">
                <tr class="text-lg font-bold">
                    <th class="p-1 border border-slate-400">Call #</th>
                    <th class="p-1 border border-slate-400">Type</th>
                    <th class="p-1 border border-slate-400">Nature</th>
                    <th class="p-1 border border-slate-400">Location</th>
                    <th class="p-1 border border-slate-400">City</th>
                    <th class="p-1 border border-slate-400">Pri</th>
                    <th class="p-1 border border-slate-400">Status</th>
                    <th class="p-1 border border-slate-400">Time</th>
                    <th class="p-1 border border-slate-400">Units</th>
                </tr>
                @foreach ($calls as $call)
                    <tr class="{{ $call->display_status_text_color }}">
                        <td class="p-1 border border-slate-400"><a href="{{ route('cad.call.show', $call->id) }}"
                                class="hover:underline">{{ str_pad($call->id, 5, 0, STR_PAD_LEFT) }}</a>
                        </td>
                        <td class="p-1 border border-slate-400">{{ $call->type_name }}</td>
                        <td class="p-1 border border-slate-400">{{ $call->nature }}</td>
                        <td class="p-1 border border-slate-400">{{ $call->location }}</td>
                        <td class="p-1 border border-slate-400">{{ $call->city }}</td>
                        <td class="relative p-1 border border-slate-400" x-data="{ statusOpen: false }">
                            <div class="flex justify-between">
                                <span>{{ $call->priority }}</span>
                                <a @click="statusOpen = !statusOpen" class="underline cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="absolute right-0 z-50 w-32 p-3 space-y-3 text-white bg-gray-800 rounded"
                                x-show="statusOpen" @click.outside="statusOpen = false">
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_call_priority({{ $call->id }}, '1')"
                                    class="block hover:bg-gray-500">1</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_call_priority({{ $call->id }}, '2')"
                                    class="block hover:bg-gray-500">2</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_call_priority({{ $call->id }}, '3')"
                                    class="block hover:bg-gray-500">3</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_call_priority({{ $call->id }}, '4')"
                                    class="block hover:bg-gray-500">4</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_call_priority({{ $call->id }}, '5')"
                                    class="block hover:bg-gray-500">5</a>
                            </div>
                        </td>
                        <td class="relative p-1 border border-slate-400" x-data="{ statusOpen: false }">
                            <div class="flex justify-between">
                                <span>{{ $call->status }}</span>
                                <a @click="statusOpen = !statusOpen" class="underline cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="absolute right-0 z-50 w-32 p-3 space-y-3 text-white bg-gray-800 rounded"
                                x-show="statusOpen" @click.outside="statusOpen = false">
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_call_status({{ $call->id }}, 'OPN')"
                                    class="block hover:bg-gray-500">OPN</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_call_status({{ $call->id }}, 'HLD')"
                                    class="block hover:bg-gray-500">HLD</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_call_status({{ $call->id }}, 'DISP')"
                                    class="block hover:bg-gray-500">DISP</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_call_status({{ $call->id }}, 'ENRUTE')"
                                    class="block hover:bg-gray-500">ENRUTE</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_call_status({{ $call->id }}, 'ARRV')"
                                    class="block hover:bg-gray-500">ARRV</a>
                            </div>
                        </td>
                        <td class="p-1 border border-slate-400">{{ $call->time }}m</td>
                        <td class="relative p-1 border border-slate-400" x-data="{ unitsOpen: false }">
                            <div class="flex justify-between">
                                <span>
                                    @foreach ($call->nice_units as $unit)
                                        {{ $unit }},
                                    @endforeach
                                </span>
                                <a @click="unitsOpen = !unitsOpen" class="underline cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="absolute right-0 z-50 w-32 p-3 space-y-3 text-white bg-gray-800 rounded"
                                x-show="unitsOpen" @click.outside="unitsOpen = false">
                                @foreach ($active_units as $unit)
                                    @if (in_array($unit->badge_number, $call->nice_units))
                                        <a href="#" @click="unitsOpen = false"
                                            wire:click="remove_unit_from_call({{ $unit->id }}, {{ $call->id }})"
                                            class="block bg-gray-500">{{ $unit->badge_number }}</a>
                                    @else
                                        <a href="#" @click="unitsOpen = false"
                                            wire:click="add_unit_to_call({{ $unit->id }}, {{ $call->id }})"
                                            class="block hover:bg-gray-500">{{ $unit->badge_number }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>

        </main>
        <main class="mt-12">
            <div class="flex justify-around mb-3 space-x-3">

                @if (auth()->user()->active_unit->status == 'OFFDTY')
                    <a href="{{ route('cad.call.create') }}" class="new-button-md">ON DUTY</a>
                @else
                    <a href="#" wire:click="set_status({{ auth()->user()->active_unit->id }}, 'AVL')"
                        class="new-button-md">AVAILABLE</a>

                    <a href="#" wire:click="set_status({{ auth()->user()->active_unit->id }}, 'ENRUTE')"
                        class="bg-yellow-600 hover:bg-yellow-500 button-md">EN
                        ROUTE</a>
                    <a href="#" wire:click="set_status({{ auth()->user()->active_unit->id }}, 'ONSCN')"
                        class="bg-yellow-600 hover:bg-yellow-500 button-md">ON
                        SCENE</a>
                    <a href="#" wire:click="set_status({{ auth()->user()->active_unit->id }}, 'BRK')"
                        class="delete-button-md">BREAK</a>
                    <a href="{{ route('cad.call.create') }}" class="delete-button-md">OFF DUTY</a>
                @endif


            </div>
            <table class="w-full border border-collapse table-auto border-slate-400">
                <tr>
                    <th class="border border-slate-400">Agency</th>
                    <th class="border border-slate-400">Unit #</th>
                    <th class="border border-slate-400">Status</th>
                    <th class="border border-slate-400">Time</th>
                    <th class="w-1/4 border border-slate-400">Call #</th>
                    <th class="border border-slate-400">Description</th>
                </tr>
                @foreach ($active_units as $active_unit)
                    <tr class="{{ $active_unit->display_status_text_color }}">
                        <td class="p-1 border border-slate-400">{{ $active_unit->agency }}</td>
                        <td class="p-1 border border-slate-400">{{ $active_unit->badge_number }}</td>
                        <td class="relative p-1 border border-slate-400" x-data="{ statusOpen: false }">
                            <div class="flex justify-between">
                                <span>{{ $active_unit->status }}</span>
                                <a @click="statusOpen = !statusOpen" class="underline cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="absolute right-0 w-32 p-3 space-y-3 text-white bg-gray-800 rounded"
                                x-show="statusOpen" @click.outside="statusOpen = false">
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_status({{ $active_unit->id }}, 'AVL')"
                                    class="block hover:bg-gray-500">Available</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_status({{ $active_unit->id }}, 'ENRUTE')"
                                    class="block hover:bg-gray-500">En-route</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_status({{ $active_unit->id }}, 'ONSCN')"
                                    class="block hover:bg-gray-500">On-Scene</a>
                                <a href="#" @click="statusOpen = false"
                                    wire:click="set_status({{ $active_unit->id }}, 'BRK')"
                                    class="block hover:bg-gray-500">Break</a>
                            </div>
                        </td>
                        <td class="p-1 border border-slate-400">{{ $active_unit->time }}m</td>
                        <td class="relative p-1 border border-slate-400" x-data="{ callsOpen: false }">
                            <div class="flex justify-between">
                                <div class="">
                                    @foreach ($active_unit->nice_calls as $call)
                                        <a href="{{ route('cad.call.show', $call) }}">
                                            {{ str_pad($call, 5, 0, STR_PAD_LEFT) }},
                                        </a>
                                    @endforeach
                                </div>
                                <a @click="callsOpen = !callsOpen" class="underline cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="absolute right-0 w-32 p-3 space-y-3 text-white bg-gray-800 rounded"
                                x-show="callsOpen" @click.outside="callsOpen = false">
                                @foreach ($calls as $call)
                                    @if (in_array($unit->badge_number, $call->nice_units))
                                        <a href="#" @click="callsOpen = false"
                                            wire:click="remove_unit_from_call({{ $unit->id }}, {{ $call->id }})"
                                            class="block bg-gray-500">Remove From Call {{ $call->id }}</a>
                                    @else
                                        <a href="#" @click="callsOpen = false"
                                            wire:click="add_unit_to_call({{ $unit->id }}, {{ $call->id }})"
                                            class="block hover:bg-gray-500">Add To Call {{ $call->id }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td class="p-1 border border-slate-400">{{ $active_unit->description }}</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </div>
</div>

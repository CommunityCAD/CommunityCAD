<div wire:poll.5s>

    <div class="p-4 mt-5 text-white rounded cursor-default">
        <main class="">

            <div class="float-right mb-3">
                <a href="{{ route('cad.call.create') }}" class="new-button-md">New Call</a>
            </div>

            <table class="w-full uppercase border border-collapse table-auto border-slate-400">
                <tr class="text-lg font-bold">
                    <th class="p-1 border border-slate-400">Call #</th>
                    <th class="p-1 border border-slate-400">Nature</th>
                    <th class="p-1 border border-slate-400">Location</th>
                    <th class="p-1 border border-slate-400">City</th>
                    <th class="p-1 border border-slate-400">Pri</th>
                    <th class="p-1 border border-slate-400">Status</th>
                    <th class="p-1 border border-slate-400">Time</th>
                    <th class="p-1 border border-slate-400">Units</th>
                </tr>
                @foreach ($calls as $call)
                    @php
                        switch ($call->status) {
                            case 'OPEN':
                                $text_color = 'text-green-500';
                                break;
                        
                            case 'HOLD':
                                $text_color = 'text-gray-500';
                                break;
                        
                            case 'DISP':
                                $text_color = 'text-yellow-500';
                                break;
                        
                            case 'INRUTE':
                                $text_color = 'text-yellow-500';
                                break;
                        
                            case 'ARRV':
                                $text_color = 'text-orange-500';
                                break;
                        
                            case 'CLO':
                                $text_color = 'text-red-500';
                                break;
                        
                            default:
                                $text_color = 'text-red-500';
                                break;
                        }
                    @endphp
                    <tr class="{{ $text_color }}">
                        <td class="p-1 border border-slate-400"><a href="{{ route('cad.call.show', $call->id) }}"
                                class="hover:underline">{{ $call->id }}</a>
                        </td>
                        <td class="p-1 border border-slate-400">{{ $call->nature }}</td>
                        <td class="p-1 border border-slate-400">{{ $call->location }}</td>
                        <td class="p-1 border border-slate-400">{{ $call->city }}</td>
                        <td class="p-1 border border-slate-400">{{ $call->priority }}</td>
                        <td class="p-1 border border-slate-400">{{ $call->status }}</td>
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
                    <th class="border border-slate-400">Unit #</th>
                    <th class="border border-slate-400">Status</th>
                    <th class="border border-slate-400">Time</th>
                    <th class="border border-slate-400 w-1/4">Call #</th>
                    <th class="border border-slate-400">Agency</th>
                    <th class="border border-slate-400">Description</th>
                </tr>
                @foreach ($active_units as $active_unit)
                    @php
                        switch ($active_unit->status) {
                            case 'OFFDTY':
                                $text_color = 'text-red-600';
                                break;
                        
                            case 'BRK':
                                $text_color = 'text-red-600';
                                break;
                        
                            case 'AVL':
                                $text_color = 'text-green-600';
                                break;
                        
                            case 'ONSCN':
                                $text_color = 'text-yellow-600';
                                break;
                        
                            case 'ENRUTE':
                                $text_color = 'text-yellow-600';
                                break;
                        
                            default:
                                $text_color = 'text-white';
                                break;
                        }
                    @endphp

                    <tr class="{{ $text_color }}">
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
                                        <a href="#">
                                            {{ $call }},
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
                        <td class="p-1 border border-slate-400">{{ $active_unit->agency }}</td>
                        <td class="p-1 border border-slate-400">{{ $active_unit->description }}</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </div>
</div>

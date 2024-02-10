<div class="">
    <table class="w-full mt-4 uppercase border border-collapse table-auto border-slate-400">
        <tr class="text-lg font-bold text-white">
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
            <tr class="{{ $call->status_info['color'] }}">
                <td class="p-1 border border-slate-400"><a class="hover:underline"
                        href="{{ route('cad.call.show', $call->id) }}">{{ $call->id }}</a>
                </td>
                <td class="p-1 border border-slate-400">{{ $call->type_name }}</td>
                <td class="p-1 border border-slate-400">{{ $call->nature }} -
                    {{ $call->nature_info ? $call->nature_info['name'] : 'custom nature' }}
                </td>
                <td class="p-1 border border-slate-400">{{ $call->location }}</td>
                <td class="p-1 border border-slate-400">{{ $call->city }}</td>
                <td class="relative p-1 border border-slate-400" x-data="{ statusOpen: false }">
                    <div class="flex justify-between">
                        <span>{{ $call->priority }}</span>
                        <a @click="statusOpen = !statusOpen" class="underline cursor-pointer">
                            <svg class="w-6 h-6 text-white" fill="none" stroke-width="1.5" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <div @click.outside="statusOpen = false"
                        class="absolute right-0 z-50 w-32 p-3 space-y-3 text-white bg-gray-800 rounded"
                        x-show="statusOpen">
                        <a @click="statusOpen = false" class="block hover:bg-gray-500" href="#"
                            wire:click="set_call_priority({{ $call->id }}, '1')">1</a>
                        <a @click="statusOpen = false" class="block hover:bg-gray-500" href="#"
                            wire:click="set_call_priority({{ $call->id }}, '2')">2</a>
                        <a @click="statusOpen = false" class="block hover:bg-gray-500" href="#"
                            wire:click="set_call_priority({{ $call->id }}, '3')">3</a>
                        <a @click="statusOpen = false" class="block hover:bg-gray-500" href="#"
                            wire:click="set_call_priority({{ $call->id }}, '4')">4</a>
                        <a @click="statusOpen = false" class="block hover:bg-gray-500" href="#"
                            wire:click="set_call_priority({{ $call->id }}, '5')">5</a>
                    </div>
                </td>
                <td class="relative p-1 border border-slate-400" x-data="{ statusOpen: false }">
                    <div class="flex justify-between">
                        <span>{{ $call->status }} - {{ $call->status_info['name'] }}</span>
                        <a @click="statusOpen = !statusOpen" class="underline cursor-pointer">
                            <svg class="w-6 h-6 text-white" fill="none" stroke-width="1.5" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <div @click.outside="statusOpen = false"
                        class="absolute right-0 z-50 w-80 p-3 space-y-3 text-white bg-gray-800 rounded"
                        x-show="statusOpen">
                        @foreach ($call_statuses as $status => $props)
                            <a @click="statusOpen = false" class="block hover:bg-gray-500" href="#"
                                wire:click="set_call_status({{ $call->id }}, '{{ $status }}')">{{ $status }}
                                - {{ $props['name'] }}</a>
                        @endforeach
                    </div>
                </td>
                <td class="p-1 border border-slate-400">{{ $call->time }}m</td>
                <td class="relative p-1 border border-slate-400" x-data="{ unitsOpen: false }">
                    <div class="flex justify-between">
                        <span>
                            @foreach ($call->attached_units as $unit)
                                {{ $unit->user_department->badge_number }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </span>
                        @if (auth()->user()->active_unit->department_type != 2)
                            @if ($call->attached_units->contains(auth()->user()->active_unit->id))
                                <a class="cursor-pointer text-red-600"
                                    wire:click="remove_unit_from_call({{ auth()->user()->active_unit->id }}, {{ $call->id }})">
                                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </a>
                            @else
                                <a class="cursor-pointer text-green-600"
                                    wire:click="add_unit_to_call({{ auth()->user()->active_unit->id }}, {{ $call->id }})">
                                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            @endif
                        @endif
                    </div>
                    <div @click.outside="unitsOpen = false"
                        class="absolute right-0 z-50 w-32 p-3 space-y-3 text-white bg-gray-800 rounded"
                        x-show="unitsOpen">
                        {{-- @foreach ($active_units as $unit)
                                    @if (in_array($unit->badge_number, $call->nice_units))
                                        <a @click="unitsOpen = false" class="block bg-gray-500" href="#"
                                            wire:click="remove_unit_from_call({{ $unit->id }}, {{ $call->id }})">{{ $unit->badge_number }}</a>
                                    @else
                                        <a @click="unitsOpen = false" class="block hover:bg-gray-500" href="#"
                                            wire:click="add_unit_to_call({{ $unit->id }}, {{ $call->id }})">{{ $unit->badge_number }}</a>
                                    @endif
                                @endforeach --}}
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>

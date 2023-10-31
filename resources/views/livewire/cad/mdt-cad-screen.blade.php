<div class="p-4 mt-5 text-white rounded cursor-default" wire:poll.5s>
    <main class="">
        <div class="flex justify-between">
            @if ($active_dispatch == 'AVL')
                <div class="text-green-600">
                    <div class="flex">
                        <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">Dispatch Online</span>
                    </div>
                    <p>{{ $active_dispatcher->user->officer_name_check }} ({{ $active_dispatcher->badge_number }}) is
                        Primary</p>
                </div>
            @elseif ($active_dispatch == 'BUSY')
                <div class="text-yellow-600">
                    <div class="flex">
                        <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">Dispatch Busy</span>
                    </div>
                    <p>{{ $active_dispatcher->user->officer_name_check }} ({{ $active_dispatcher->badge_number }}) is
                        Primary</p>
                </div>
            @else
                <div class="text-red-600">
                    <div class="flex">
                        <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">Dispatch Offline</span>
                    </div>
                    <p></p>
                </div>
            @endif
            <div>
                <a class="new-button-md" href="#"
                    onclick="openExternalWindow('{{ route('cad.report.create') }}')">New Report</a>
                <a class="new-button-md" href="{{ route('cad.call.create') }}">New Call</a>
            </div>
        </div>
        <div>
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
                    @if ($call->created_at->addSeconds(15)->isFuture())
                        <tr>
                            <div class="bg-red-700 w-full my-3 px-2 py-4 flex justify-between items-center rounded-md">
                                <p class="text-white font-bold">New Call Created!</p>
                                <button class="rounded-full p-3 bg-red-300" id="playAudio" onclick="play('newCall')">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke-width="1.5"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21 7.5V18M15 7.5V18M3 16.811V8.69c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 010 1.954l-7.108 4.061A1.125 1.125 0 013 16.811z"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <audio autoplay id="newCall" volume="1">
                                    <source src="{{ secure_asset('audio/newcall.mp3') }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        </tr>
                    @endif
                    <tr class="{{ $call->status_info['color'] }}">
                        <td class="p-1 border border-slate-400"><a class="hover:underline"
                                href="{{ route('cad.call.show', $call->id) }}">{{ str_pad($call->id, 5, 0, STR_PAD_LEFT) }}</a>
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
                                    <svg class="w-6 h-6 text-white" fill="none" stroke-width="1.5"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                                    <svg class="w-6 h-6 text-white" fill="none" stroke-width="1.5"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                                    @foreach ($call->nice_units as $unit)
                                        {{ $unit }},
                                    @endforeach
                                </span>
                                <a @click="unitsOpen = !unitsOpen" class="underline cursor-pointer">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke-width="1.5"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                            <div @click.outside="unitsOpen = false"
                                class="absolute right-0 z-50 w-32 p-3 space-y-3 text-white bg-gray-800 rounded"
                                x-show="unitsOpen">
                                @foreach ($active_units as $unit)
                                    @if (in_array($unit->badge_number, $call->nice_units))
                                        <a @click="unitsOpen = false" class="block bg-gray-500" href="#"
                                            wire:click="remove_unit_from_call({{ $unit->id }}, {{ $call->id }})">{{ $unit->badge_number }}</a>
                                    @else
                                        <a @click="unitsOpen = false" class="block hover:bg-gray-500" href="#"
                                            wire:click="add_unit_to_call({{ $unit->id }}, {{ $call->id }})">{{ $unit->badge_number }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </main>
    <main class="mt-12">
        <div>
            <div class="flex justify-around mb-3 space-x-3">
                @if (auth()->user()->active_unit)

                    @if (auth()->user()->active_unit->status == 'OFFDTY')
                        <a class="new-button-md" href="#"
                            wire:click="set_status({{ auth()->user()->active_unit->id }}, 'AVL')">ON DUTY</a>
                        <a class="delete-button-md" href="{{ route('cad.offduty.create') }}">OFF DUTY REPORT</a>
                    @else
                        <a class="new-button-md" href="#"
                            wire:click="set_status({{ auth()->user()->active_unit->id }}, 'AVL')">AVAILABLE</a>
                        <a class="bg-yellow-600 hover:bg-yellow-500 button-md" href="#"
                            wire:click="set_status({{ auth()->user()->active_unit->id }}, 'ENRUTE')">EN
                            ROUTE</a>
                        <a class="bg-yellow-600 hover:bg-yellow-500 button-md" href="#"
                            wire:click="set_status({{ auth()->user()->active_unit->id }}, 'ONSCN')">ON
                            SCENE</a>
                        <a class="delete-button-md" href="#"
                            wire:click="set_status({{ auth()->user()->active_unit->id }}, 'BRK')">BREAK</a>
                        <a class="delete-button-md" href="{{ route('cad.offduty.create') }}">OFF DUTY</a>
                    @endif

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
                        <td class="p-1 border border-slate-400">{{ $active_unit->badge_number }}
                            ({{ $active_unit->user->officer_name_check }})</td>
                        <td class="relative p-1 border border-slate-400" x-data="{ statusOpen: false }">
                            <div class="flex justify-between">
                                <span>{{ $active_unit->status }}</span>
                                <a @click="statusOpen = !statusOpen" class="underline cursor-pointer">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke-width="1.5"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                            <div @click.outside="statusOpen = false"
                                class="absolute right-0 w-32 z-50 p-3 space-y-3 text-white bg-gray-800 rounded"
                                x-show="statusOpen">
                                <a @click="statusOpen = false" class="block hover:bg-gray-500" href="#"
                                    wire:click="set_status({{ $active_unit->id }}, 'AVL')">Available</a>
                                <a @click="statusOpen = false" class="block hover:bg-gray-500" href="#"
                                    wire:click="set_status({{ $active_unit->id }}, 'ENRUTE')">En-route</a>
                                <a @click="statusOpen = false" class="block hover:bg-gray-500" href="#"
                                    wire:click="set_status({{ $active_unit->id }}, 'ONSCN')">On-Scene</a>
                                <a @click="statusOpen = false" class="block hover:bg-gray-500" href="#"
                                    wire:click="set_status({{ $active_unit->id }}, 'BRK')">Break</a>
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
                                    <svg class="w-6 h-6 text-white" fill="none" stroke-width="1.5"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                            <div @click.outside="callsOpen = false"
                                class="absolute right-0 w-32 p-3 space-y-3 text-white bg-gray-800 rounded"
                                x-show="callsOpen">
                                @foreach ($calls as $call)
                                    @if (in_array($active_unit->badge_number, $call->nice_units))
                                        <a @click="callsOpen = false" class="block bg-gray-500" href="#"
                                            wire:click="remove_unit_from_call({{ $active_unit->id }}, {{ $call->id }})">Remove
                                            From Call {{ $call->id }}</a>
                                    @else
                                        <a @click="callsOpen = false" class="block hover:bg-gray-500" href="#"
                                            wire:click="add_unit_to_call({{ $active_unit->id }}, {{ $call->id }})">Add
                                            To Call {{ $call->id }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td class="p-1 border border-slate-400">{{ $active_unit->description }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
    @if (!auth()->user()->active_unit)
        <section x-data="{ modalOpen: true }">
            <div class="fixed top-0 left-0 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 text-black bg-black bg-opacity-90"
                x-show="modalOpen" x-transition>
                <div class="w-full max-w-[570px] rounded-[20px] bg-gray-400 py-10 px-6 md:py-[40px] md:px-[50px]">
                    <h3 class="pb-2 text-xl font-bold text-center sm:text-2xl">
                        System Use Notification
                    </h3>
                    <p class="mb-5 leading-relaxed text-justify">
                        You were forced off duty by a dispatcher. You must log out of the system and log back in to
                        continue. This instance has been logged and a supervisor has been notified. You must contact you
                        supervisor and let them know of this incident.
                    </p>
                    <p class="mb-5 leading-relaxed text-justify">
                    </p>
                    <p class="mb-5 leading-relaxed">
                        Must be on desktop computer.
                    </p>
                    <div class="flex flex-wrap -mx-3 text-center">
                        <div class="px-3">
                            <a class="delete-button-md" href="{{ route('portal.dashboard') }}">
                                Exit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>

<script>
    function play(type) {
        var audio = document.getElementById(type);
        audio.play();
    }
</script>

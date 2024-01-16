<div class="flex flex-col uppercase">
    @include('inc.cad.header')
    <div class="flex flex-row">
        <div class="w-3/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default mx-auto">
            <div class="flex">
                <div class="w-3/5">
                    <label class="block mr-2 text-lg">Name:</label>
                    <input class="text-input" type="text" wire:model.debounce.800ms='search_name'>
                </div>
                <div class="w-2/5 ml-3">
                    <label class="block mr-2 text-lg">Social Security:</label>
                    <input class="text-input" type="number" wire:model.debounce.800ms='search_ssn'>
                </div>
            </div>
            <hr>
            @forelse ($civilians as $civilian)
                <a class="block secondary-button-sm"
                    href="{{ route('cad.name.return', $civilian->id) }}">{{ $civilian->first_name }}
                    {{ $civilian->last_name }} ({{ $civilian->s_n_n }})</a>
            @empty
                <p>No search ran</p>
            @endforelse
        </div>

        {{-- <div class="w-2/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
            @if (!$civilian_return)
                <p>No search ran</p>
            @else
                <div class="flex justify-between">
                    <p>Return on: {{ $civilian_return->name }} ({{ $civilian_return->s_n_n }})</p>
                    <a class="text-red-400" href="#" wire:click="clear_return()">Clear Result</a>
                </div>

                <div class="flex flex-row">
                    <div class="w-1/2">
                        @if (!is_null($civilian_return->picture))
                            <img class="block rounded-md" src="{{ $civilian_return->picture }}">
                        @else
                            <img class="block rounded-md"
                                src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg">
                        @endif
                    </div>
                    <div class="w-1/2 ml-6">
                        <p><span class="text-gray-300 font-bold underline">Full Name:</span>
                            {{ $civilian_return->name }}</p>
                        <p><span class="text-gray-300 font-bold underline">Social Security Number:</span>
                            {{ $civilian_return->s_n_n }}</p>
                        <p><span class="text-gray-300 font-bold underline">Date of Birth:</span>
                            {{ $civilian_return->date_of_birth->format('m/d/Y') }}
                            ({{ $civilian_return->age }})
                        </p>
                        <p><span class="text-gray-300 font-bold underline">Gender:</span>
                            {{ $civilian_return->gender }}</p>
                        <p><span class="text-gray-300 font-bold underline">Race:</span>
                            {{ $civilian_return->race }}</p>
                        <p><span class="text-gray-300 font-bold underline">Weight:</span>
                            {{ $civilian_return->weight }}lb</p>
                        <p><span class="text-gray-300 font-bold underline">Height:</span>
                            {{ $civilian_return->height }}</p>
                        <p><span class="text-gray-300 font-bold underline">Address:</span>
                            {{ $civilian_return->address }}</p>
                        <p><span class="text-gray-300 font-bold underline">Occupation:</span>
                            {{ $civilian_return->occupation }}</p>
                    </div>
                </div>
                <hr>
                <div class="flex flex-row">
                    <div class="w-1/2">
                        <p class="text-lg font-bold">Licenses</p>
                        @foreach ($civilian_return->licenses as $license)
                            @php
                                $status = $license->status_name;
                                if ($license->expires_on < date('Y-m-d')) {
                                    $status = 'Expired';
                                }
                            @endphp
                            <p>({{ $license->id }}) {{ $license->license_type->name }} -
                                {{ $status }}</p>
                        @endforeach
                    </div>
                    <div class="w-1/2">
                        <p class="text-lg font-bold">Vehicles</p>
                        @foreach ($civilian_return->vehicles as $vehicle)
                            @php
                                $v_status = $vehicle->status_name;
                                if ($vehicle->registration_expire < date('Y-m-d')) {
                                    $v_status = 'Expired';
                                }
                            @endphp
                            <p><a href="{{ route('cad.vehicle') }}?plate={{ $vehicle->plate }}">({{ $vehicle->plate }})
                                    {{ $vehicle->make }} {{ $vehicle->color }} -
                                    {{ $v_status }}</a></p>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="flex flex-row">
                    <div class="w-1/2">
                        <p class="text-lg font-bold">Weapons</p>
                        @foreach ($civilian_return->weapons as $weapon)
                            <p>({{ $weapon->serial_number }}) {{ $weapon->model }}</p>
                        @endforeach
                    </div>
                    <div class="w-1/2">
                        <p class="text-lg font-bold">Medical</p>
                        @foreach ($civilian_return->medical_records as $record)
                            <p>{{ $record->name }} - {{ $record->value }}</p>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="flex flex-row">
                    <div class="w-full">
                        <p class="text-lg font-bold">Tickets/Warnings/Arrests</p>
                        @foreach ($civilian_return->tickets as $ticket)
                            @php
                                if ($ticket->type_id == 1) {
                                    $type = 'Warning';
                                    $text_color = 'text-yellow-500';
                                } elseif ($ticket->type_id == 2) {
                                    $type = 'Ticket';
                                    $text_color = 'text-orange-500';
                                } elseif ($ticket->type_id == 3) {
                                    $type = 'Arrest';
                                    $text_color = 'text-red-500';
                                }
                            @endphp
                            <a class="block {{ $text_color }}" href="#"
                                onclick="openExternalWindow('{{ route('cad.ticket.show', $ticket->id) }}')">({{ $ticket->id }})
                                {{ $type }} on {{ $ticket->offense_occured_at->format('m/d/Y H:i') }} at
                                {{ $ticket->location_of_offense }} <span class="block ml-5">Offense(s)
                                    @foreach ($ticket->charges as $charge)
                                        @if (!$loop->last)
                                            {{ $charge->penal_code->name }},
                                        @else
                                            {{ $charge->penal_code->name }}
                                        @endif
                                    @endforeach
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div>
                    <a class="new-button-sm" href="#"
                        onclick="openExternalWindow('{{ route('cad.ticket.create', $civilian->id) }}')">New
                        Warning/Ticket/Arrest</a>
                </div>
            @endif

        </div> --}}
    </div>
</div>

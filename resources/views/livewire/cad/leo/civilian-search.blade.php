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
    <div class="flex flex-row">
        <div class="w-3/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
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
                <a class="block secondary-button-sm" href="#"
                    wire:click='show_return("{{ $civilian->id }}",
                    "{{ $civilian->first_name . ' ' . $civilian->last_name }}")'>{{ $civilian->first_name }}
                    {{ $civilian->last_name }} ({{ $civilian->s_n_n }})</a>
            @empty
                <p>No search ran</p>
            @endforelse
        </div>

        <div class="w-2/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
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
                                $status = $vehicle->status_name;
                                if ($vehicle->expires_on < date('Y-m-d')) {
                                    $status = 'Expired';
                                }
                            @endphp
                            <p>({{ $vehicle->plate }}) {{ $vehicle->make }} {{ $vehicle->color }} -
                                {{ $status }}</p>
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
            @endif
        </div>
    </div>
</div>

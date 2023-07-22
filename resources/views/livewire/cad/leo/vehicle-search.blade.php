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
                    <label class="block mr-2 text-lg">Plate:</label>
                    <input class="text-input" type="text" wire:model.debounce.800ms='search_plate'>
                </div>
            </div>
            <hr>
            @forelse ($vehicles as $vehicle)
                <a class="block secondary-button-sm" href="#"
                    wire:click='show_return("{{ $vehicle->id }}")'>{{ $vehicle->plate }} {{ $vehicle->model }}
                    {{ $vehicle->color }}<br>RO: {{ $vehicle->civilian->name }} ({{ $vehicle->civilian->s_n_n }})</a>
            @empty
                <p>No results</p>
            @endforelse
        </div>

        <div class="w-2/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
            @if (!$vehicle_return)
                <p>No search ran</p>
            @else
                <div class="flex justify-between">
                    <p>Return on: {{ $vehicle_return->plate }}</p>
                    <a class="text-red-400" href="#" wire:click="clear_return()">Clear Result</a>
                </div>

                <div class="flex flex-row">
                    <div class="w-full ml-6">
                        <p><span class="text-gray-300 font-bold underline">RO:</span>
                            <span id="ro_name">{{ $vehicle_return->civilian->name }}</span>
                        </p>
                        <p><span class="text-gray-300 font-bold underline">RO SSN:</span>
                            <a href="{{ route('cad.name') }}?ssn={{ $vehicle_return->civilian->id }}"
                                id="ro_name">{{ $vehicle_return->civilian->id }}</a>
                        </p>

                        <p><span class="text-gray-300 font-bold underline">Plate:</span>
                            {{ $vehicle_return->plate }}
                        </p>
                        <p><span class="text-gray-300 font-bold underline">Model:</span>
                            {{ $vehicle_return->model }}</p>
                        @php
                            $status = $vehicle_return->status_name;
                            if ($vehicle_return->registration_expire < date('Y-m-d')) {
                                $status = 'Expired';
                            }
                        @endphp
                        <p><span class="text-gray-300 font-bold underline">Status:</span>
                            {{ $status }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>

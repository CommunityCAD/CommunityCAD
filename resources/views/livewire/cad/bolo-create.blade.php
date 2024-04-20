<div class="max-w-7xl mx-auto p-2">
    <h1 class="text-xl font-bold text-white">Create Bolo</h1>
    <form action="{{ route('cad.bolo.store') }}"
        class="p-2 mt-5 space-y-2 text-white border border-white rounded cursor-default" method="POST">
        @csrf
        <h1 class="text-xl font-semibold">Bolo</h1>
        <div class="flex">
            <div class="w-3/5">
                <label class="block mr-2">Bolo Type:</label>
                <select class="select-input-sm" name="type">
                    <option value="Person">PERSON</option>
                    <option value="Vehicle">VEHICLE</option>
                </select>
            </div>
            <div class="w-2/5 ml-3">
                <label class="block mr-2">CALL ID:</label>
                <select class="select-input-sm" name="call_id">
                    @foreach ($calls as $call)
                        <option @selected(isset($_GET['call']) && $call->id == $_GET['call']) @selected(old('call_id') == $call->id) value="{{ $call->id }}">
                            {{ $call->status }}: {{ $call->id }}
                            ({{ $call->nature }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <h1 class="text-xl font-semibold">Known Information</h1>
        <div class="flex">
            <div class="w-full text-white space-y-2">
                <label class="block mr-2">Add Civilian:</label>
                @if ($linked_civilian)
                    <div>
                        <input class="hidden" name="civilian_id" type="text" value="{{ $linked_civilian->id }}">
                        <label for="">{{ $linked_civilian->name }} | <a class="text-red-600 hover:underline"
                                href="#" wire:click='remove_civilian("{{ $linked_civilian->id }}")'>Remove</a>
                        </label>
                    </div>
                @else
                    <div class="flex justify-between items-baseline">
                        <div class="w-full">

                            <input class="text-input-sm uppercase" wire:model.debounce='civilian_search'>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <hr>

        <div class="flex">
            <div class="w-full my-3 text-white flex flex-wrap gap-2">
                @forelse ($civilians as $civilian)
                    <a class="flex py-2 px-4 shadow-md no-underline rounded-full bg-green-600 text-white font-sans font-semibold text-sm border-green-600 btn-primary hover:text-white hover:bg-green-500 focus:outline-none active:shadow-none mr-2"
                        href="#" wire:click='add_civilian("{{ $civilian->id }}")'>
                        <svg class="w-4 h-4 mr-3" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        {{ $civilian->name }}
                    </a>
                @empty
                    <p></p>
                @endforelse
            </div>
        </div>

        <hr>

        <div class="flex">
            <div class="w-full text-white space-y-2">
                <label class="block mr-2">Add Vehicle:</label>
                @if ($linked_vehicle)
                    <div>
                        <input class="hidden" name="vehicle_id" type="text" value="{{ $linked_vehicle->id }}">
                        <label for="">{{ $linked_vehicle->plate }} //
                            {{ $linked_vehicle->model }} // {{ $linked_vehicle->color }} | <a
                                class="text-red-600 hover:underline" href="#"
                                wire:click='remove_vehicle("{{ $linked_vehicle->id }}")'>Remove</a>
                        </label>
                    </div>
                @else
                    <div class="flex justify-between items-baseline">
                        <div class="w-full">
                            <input class="text-input-sm uppercase" wire:model.debounce='vehicle_search'>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <hr>

        <div class="flex">
            <div class="w-full my-3 text-white flex flex-wrap gap-2">
                @forelse ($vehicles as $vehicle)
                    <a class="flex py-2 px-4 shadow-md no-underline rounded-full bg-green-600 text-white font-sans font-semibold text-sm border-green-600 btn-primary hover:text-white hover:bg-green-500 focus:outline-none active:shadow-none mr-2"
                        href="#" wire:click='add_vehicle("{{ $vehicle->id }}")'>
                        <svg class="w-4 h-4 mr-3" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        {{ $vehicle->plate }} //
                        {{ $vehicle->model }} // {{ $vehicle->color }}
                    </a>
                @empty
                    <p></p>
                @endforelse
            </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
            <div class="flex">
                <div class="w-full">
                    <label class="block mr-2 text-lg">Last Location:</label>
                    <textarea class="textarea-input-sm uppercase" name="last_location">{{ old('last_location') }}</textarea>
                    <x-input-error :messages="$errors->get('last_location')" class="mt-2" />
                </div>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label class="block mr-2 text-lg">Last Appearance:</label>
                    <textarea class="textarea-input-sm uppercase" name="last_appearance">{{ old('last_appearance') }}</textarea>
                    <x-input-error :messages="$errors->get('last_appearance')" class="mt-2" />
                </div>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label class="block mr-2 text-lg">Last Transportation:</label>
                    <textarea class="textarea-input-sm uppercase" name="last_transportation">{{ old('last_transportation') }}</textarea>
                    <x-input-error :messages="$errors->get('last_transportation')" class="mt-2" />
                </div>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label class="block mr-2 text-lg">Wanted in Connection To:</label>
                    <textarea class="textarea-input-sm uppercase" name="wanted">{{ old('wanted') }}</textarea>
                    <x-input-error :messages="$errors->get('wanted')" class="mt-2" />
                </div>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label class="block mr-2 text-lg">Warnings:</label>
                    <textarea class="textarea-input-sm uppercase" name="warning">{{ old('warning') }}</textarea>
                    <x-input-error :messages="$errors->get('warning')" class="mt-2" />
                </div>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label class="block mr-2 text-lg">Additional Information:</label>
                    <textarea class="textarea-input-sm uppercase" name="additional_information">{{ old('additional_information') }}</textarea>
                    <x-input-error :messages="$errors->get('additional_information')" class="mt-2" />
                </div>
            </div>
        </div>
        <button class="button-md bg-gray-600 hover:bg-gray-500 text-white" type="submit">CREATE BOLO</button>
    </form>
</div>

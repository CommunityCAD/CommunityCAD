<div class="w-3/5 mx-auto p-4">
    <h1 class="text-2xl font-bold">New Call</h1>
    <form action="{{ route('cad.call.store') }}"
        class="p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default" method="POST">
        @csrf
        <h1 class="text-xl font-semibold">Call Info</h1>
        <div class="flex">
            <div class="w-3/5">
                <label class="block mr-2 text-lg">Nature:</label>
                <select class="select-input" name="nature">
                    @foreach ($call_natures as $code => $props)
                        <option value="{{ $code }}">{{ $code }} - {{ $props['name'] }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('nature')" class="mt-2" />
            </div>
            <div class="w-2/5 ml-3">
                <label class="block mr-2 text-lg">SOURCE:</label>
                <select class="select-input" name="source">
                    <option value="911 CALL">911 CALL</option>
                    <option value="NON-EMERGENCY">NON-EMERGENCY</option>
                    <option value="OFFICER">OFFICER</option>
                    <option value="FIRE">FIRE</option>
                    <option value="FLAG DOWN">FLAG DOWN</option>
                    <option value="OTHER">OTHER</option>
                </select>
                <x-input-error :messages="$errors->get('source')" class="mt-2" />

            </div>
        </div>

        <div class="flex">
            <div class="w-3/5">
                <label class="block mr-2 text-lg">Address:</label>
                <input class="text-input" name="location" type="text" value="{{ old('location') }}">
                <x-input-error :messages="$errors->get('location')" class="mt-2" />

            </div>
            <div class="w-2/5 ml-3">
                <label class="block mr-2 text-lg">City:</label>
                <input class="text-input" name="city" type="text" value="{{ old('city') }}">
                <x-input-error :messages="$errors->get('city')" class="mt-2" />

            </div>
        </div>

        <div class="flex">
            <div class="w-1/3">
                <label class="block mr-2 text-lg">Priority:</label>
                <select class="select-input" name="priority">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="w-1/3 ml-3">
                <label class="block mr-2 text-lg">Status:</label>
                <select class="select-input" name="status">
                    <option value="OPN">OPN</option>
                    <option value="HLD">HLD</option>
                </select>
            </div>
            <div class="w-1/3 ml-3">
                <label class="block mr-2 text-lg">Type:</label>
                <select class="select-input" name="type">
                    <option value="1">Police</option>
                    <option value="2">Fire</option>
                    <option value="3">EMS</option>
                </select>
            </div>
        </div>

        <div class="flex">
            <div class="w-full">
                <label class="block mr-2 text-lg">Narrative:</label>
                <textarea class="textarea-input" name="narrative">{{ old('narrative') }}</textarea>
                <x-input-error :messages="$errors->get('narrative')" class="mt-2" />

            </div>
        </div>

        <h1 class="text-xl font-semibold my-4">Reporting Persons</h1>
        <div>
            <div class="flex">
                <div class="w-full">
                    <label class="block mr-2 text-lg">Search:</label>
                    <input class="text-input" wire:model.debounce='civilian_search'>
                </div>
            </div>
            <div class="flex">
                <div class="w-2/3">
                    <label class="block mr-2 text-lg">Name:</label>
                    <input class="text-input" readonly value="{{ $civilian_name }}">
                </div>
                <div class="w-1/3 ml-3">
                    <label class="block mr-2 text-lg">SSN:</label>
                    <input class="text-input" name="civilian_id" readonly
                        value="{{ old('civilian_id') != null ? old('civilian_id') : $civilian_id }}">
                    <x-input-error :messages="$errors->get('civilian_id')" class="mt-2" />
                </div>
            </div>
            <div class="flex">
                <div class="w-full my-3 text-white">
                    @forelse ($civilians as $civilian)
                        <a class="block secondary-button-sm" href="#"
                            wire:click='fill_rp_name("{{ $civilian->id }}",
                    "{{ $civilian->first_name . ' ' . $civilian->last_name }}")'>{{ $civilian->first_name }}
                            {{ $civilian->last_name }}</a>
                    @empty
                        <p></p>
                    @endforelse
                </div>
            </div>
        </div>

        <button class="button-md bg-gray-600 hover:bg-gray-500 text-white" type="submit">CREATE CALL</button>

    </form>
</div>

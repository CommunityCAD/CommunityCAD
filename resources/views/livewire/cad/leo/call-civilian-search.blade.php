<form action="{{ route('cad.call.store') }}" method="POST"
    class="w-3/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
    @csrf

    <div class="flex">
        <div class="w-3/5">
            <label class="block mr-2 text-lg">Nature:</label>
            <input name="nature" type="text" value="{{ old('nature') }}"
                class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
            <x-input-error :messages="$errors->get('nature')" class="mt-2" />
        </div>
        <div class="w-2/5 ml-3">
            <label class="block mr-2 text-lg">SOURCE:</label>
            <select name="source"
                class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                <option value="911 CALL">911 CALL</option>
                <option value="511 CALL">411 CALL</option>
                <option value="POLICE OFFICER">POLICE OFFICER</option>
                <option value="FLAG DOWN">FLAG DOWN</option>
                <option value="OTHER">OTHER</option>
            </select>
            <x-input-error :messages="$errors->get('source')" class="mt-2" />

        </div>
    </div>

    <div class="flex">
        <div class="w-3/5">
            <label class="block mr-2 text-lg">Location:</label>
            <input name="location" type="text" value="{{ old('location') }}"
                class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
            <x-input-error :messages="$errors->get('location')" class="mt-2" />

        </div>
        <div class="w-2/5 ml-3">
            <label class="block mr-2 text-lg">City:</label>
            <input name="city" type="text" value="{{ old('city') }}"
                class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
            <x-input-error :messages="$errors->get('city')" class="mt-2" />

        </div>
    </div>

    <div class="flex">
        <div class="w-1/3">
            <label class="block mr-2 text-lg">Priority:</label>
            <select name="priority"
                class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="w-1/3 ml-3">
            <label class="block mr-2 text-lg">Status:</label>
            <select name="status"
                class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                <option value="OPN">OPN</option>
                <option value="HLD">HLD</option>
                <option value="DISP">DISP</option>
            </select>
        </div>
        <div class="w-1/3 ml-3">
            <label class="block mr-2 text-lg">Type:</label>
            <select name="type"
                class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                <option value="1">Police</option>
                <option value="2">Fire</option>
                <option value="3">EMS</option>
            </select>
        </div>
    </div>

    <div>
        <div class="flex">
            <div class="w-1/3">
                <label class="block mr-2 text-lg">RP:</label>
                <input wire:model.debounce='civilian_search'
                    class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
            </div>
            <div class="w-1/3 ml-3">
                <label class="block mr-2 text-lg">RP Name:</label>
                <input readonly disabled value="{{ $civilian_name }}"
                    class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
            </div>
            <div class="w-1/3 ml-3">
                <label class="block mr-2 text-lg">RP SSN:</label>
                <input name="rp_civilian_id" readonly
                    value="{{ old('rp_civilian_id') != null ? old('rp_civilian_id') : $civilian_id }}"
                    class="w-full px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">
                <x-input-error :messages="$errors->get('rp_civilian_id')" class="mt-2" />

            </div>
        </div>
        <div class="flex">
            <div class="w-full my-3 text-white">
                @forelse ($civilians as $civilian)
                    <a href="#"
                        wire:click='fill_rp_name("{{ $civilian->id }}",
                    "{{ $civilian->first_name . ' ' . $civilian->last_name }}")'
                        class="block secondary-button-sm">{{ $civilian->first_name }}
                        {{ $civilian->last_name }}</a>
                @empty
                    <p></p>
                @endforelse
            </div>
        </div>
    </div>


    <div class="flex">
        <div class="w-full">
            <label class="block mr-2 text-lg">Narrative:</label>
            <textarea name="narrative" class="w-full h-40 px-1 py-1 text-lg font-bold text-black uppercase border-2 border-white">{{ old('narrative') }}</textarea>
            <x-input-error :messages="$errors->get('narrative')" class="mt-2" />

        </div>
    </div>

    <input type="submit" value="CREATE" class="secondary-button-md">

</form>

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
            <input name="rp_civilian_id" readonly disabled
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

<div>
    <div class="w-full border-y-2 border-black">
        <form action="{{ route('cad.ticket.add_charges_store', $ticket->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-4 gap-3">
                <div class="col-span-3">
                    <p class="text-xs italic">Charge</p>
                    <select class="select-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                        name="penal_code_id" wire:model="penal_code_id">
                        <option value="">Choose one</option>
                        @foreach ($penal_code_titles as $title)
                            <optgroup label="PC - Title {{ $title->number }} {{ $title->name }}">
                                @foreach ($title->penal_code_codes() as $code)
                                    <option value="{{ $code->id }}">PC -
                                        {{ $title->number }}({{ $code->number }}).
                                        {{ $code->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <p class="text-xs italic">Counts</p>
                    <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" name="counts"
                        required type="number" value="1">
                </div>
            </div>
            @if ($penal_code_id)
                <div class="grid grid-cols-3 gap-3 mt-3">
                    <div class="">
                        <p class="text-xs italic">Jail Time (seconds)</p>
                        <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                            name="in_game_jail_time" required type="number"
                            value="{{ $penal_code->in_game_jail_time }}">

                    </div>
                    <div class="">
                        <p class="text-xs italic">Fine ($)</p>
                        <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                            name="fine" required type="number" value="{{ $penal_code->fine }}">

                    </div>
                    <div class="">
                        <p class="text-xs italic">CAD Jail Time (hours)</p>
                        <input class="text-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1"
                            name="cad_jail_time" required type="number" value="{{ $penal_code->cad_jail_time }}">

                    </div>

                    <div class="col-span-3">
                        <p class="text-xs italic">Description</p>
                        <textarea class="textarea-input-sm ring-gray-900 focus:ring-blue-600 rounded-none ring-1" name="description" required></textarea>
                    </div>

                    <div class="col-span-3">
                        <button class="secondary-button-sm m-3">Add Charge</button>
                        <p class="text-sm pl-4">You must add this charge before signing the ticket.</p>
                    </div>
                </div>
            @endif

        </form>
    </div>
</div>

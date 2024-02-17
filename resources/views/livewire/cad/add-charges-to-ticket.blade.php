<div>
    <div class="border-2 border-black w-full">
        <form action="{{ route('cad.ticket.add_charges_store', $ticket->id) }}" method="POST">
            @csrf
            <div class="flex">
                <div class="border-2 border-black w-5/6 p-2">
                    <p class="text-gray-500">Charge
                        <select class="select-input font-bold uppercase" name="penal_code_id" wire:model="penal_code_id">
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
                    </p>
                </div>
                <div class="border-2 border-black w-1/6 p-2">
                    <p class="text-gray-500">Counts
                        <input class="block text-black p-3 w-full font-bold uppercase" name="counts" required
                            type="number" value="1">
                    </p>
                </div>
            </div>
            @if ($penal_code_id)
                <div class="flex">
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">Jail Time (seconds)
                            <input class="block text-black p-3 w-full font-bold uppercase" name="in_game_jail_time"
                                required type="number" value="{{ $penal_code->in_game_jail_time }}">
                        </p>
                    </div>
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">Fine ($)
                            <input class="block text-black p-3 w-full font-bold uppercase" name="fine" required
                                type="number" value="{{ $penal_code->fine }}">
                        </p>
                    </div>
                    <div class="border-2 border-black w-2/6 p-2">
                        <p class="text-gray-500">CAD Jail Time (hours)
                            <input class="block text-black p-3 w-full font-bold uppercase" name="cad_jail_time" required
                                type="number" value="{{ $penal_code->cad_jail_time }}">
                        </p>
                    </div>
                </div>

                <div class="flex">
                    <div class="border-2 border-black w-full p-2">
                        <p class="text-gray-500">Description
                            <textarea class="textarea-input font-bold uppercase" name="description" required></textarea>
                        </p>
                    </div>
                </div>
            @endif

            <button class="new-button-md m-5">Add Charge</button>
            <p class="text-sm pl-4">You must save this charge before signing the ticket.</p>
        </form>
    </div>
</div>

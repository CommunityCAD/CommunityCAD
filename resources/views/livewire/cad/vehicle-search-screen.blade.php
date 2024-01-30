<div class="flex flex-col uppercase">
    @include('inc.cad.header')
    <div class="flex flex-row">
        <div class="w-3/5 mx-auto p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
            <div class="flex">
                <div class="w-3/5">
                    <label class="block mr-2 text-lg">Plate:</label>
                    <input class="text-input" type="text" wire:model.debounce.800ms='search_plate'>
                </div>
            </div>
            <hr>
            @forelse ($vehicles as $vehicle)
                <a class="block secondary-button-sm" href="{{ route('cad.vehicle.return', $vehicle->plate) }}"
                    wire:click='show_return("{{ $vehicle->id }}")'>{{ $vehicle->plate }} {{ $vehicle->model }}
                    {{ $vehicle->color }}<br>RO:
                    @if ($vehicle->civilian)
                        {{ $vehicle->civilian->name }} ({{ $vehicle->civilian->s_n_n }})
                    @elseif ($vehicle->business)
                        {{ $vehicle->business->name }} (BUSSINESS VEHICLE)
                    @endif
                </a>
            @empty
                <p>No results</p>
            @endforelse
        </div>
    </div>
</div>

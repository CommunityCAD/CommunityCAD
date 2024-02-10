<div class="flex flex-col uppercase">
    <div class="flex flex-row">
        <div class="w-3/5 mx-auto p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
            <div class="flex">
                <div class="w-3/5">
                    <label class="block mr-2 text-lg">Plate:</label>
                    <input class="text-input" type="text" wire:model.debounce.800ms='search_plate'>
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-2 gap-2">
                @forelse ($vehicles as $vehicle)
                    <a class="" href="{{ route('cad.vehicle.return', $vehicle->plate) }}">
                        <div class="bg-gray-200 rounded-lg p-2 text-black text-sm">
                            <div class="">
                                <p class="text-lg text-center">{{ strtoupper(get_setting('state')) }}</p>
                            </div>
                            <div class="mt-1">
                                <p class="text-5xl text-center">{{ $vehicle->plate }}</p>
                            </div>
                            <div class="mt-1 flex ">
                                <p class=""><span class="text-blue-500 text-xs">MK</span>
                                    {{ $vehicle->model }}
                                </p>
                                <p class="ml-3"><span class="text-blue-500 text-xs">CL</span>
                                    {{ $vehicle->color }}
                                </p>
                                <p class="ml-3">
                                    @if ($vehicle->civilian)
                                        <span class="text-blue-500 text-xs">RO</span> {{ $vehicle->civilian->name }}
                                    @else
                                        <span class="text-blue-500 text-xs">BS</span> {{ $vehicle->business->name }}
                                    @endif
                                </p>
                            </div>
                            <div class="border-t-2 border-black flex justify-between">

                            </div>
                        </div>
                    </a>
                @empty
                    <p>No results</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

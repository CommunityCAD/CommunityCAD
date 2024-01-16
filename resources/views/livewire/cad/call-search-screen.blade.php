<div>
    <div class="flex flex-col uppercase">
        @include('inc.cad.header')
        <div class="flex flex-row">
            <div class="w-3/5 mx-auto p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default">
                <div class="flex">
                    <div class="w-3/5">
                        <label class="block mr-2 text-lg">Search:</label>
                        <input class="text-input" type="text" wire:model.debounce.800ms='search'>
                    </div>
                </div>
                <hr>
                @forelse ($calls as $call)
                    @php
                        switch ($call->status) {
                            case 'OPEN':
                                $border_color = 'border-green-500';
                                break;

                            case 'HOLD':
                                $border_color = 'border-gray-500';
                                break;

                            case 'DISP':
                                $border_color = 'border-yellow-500';
                                break;

                            case 'INRTE':
                                $border_color = 'border-yellow-500';
                                break;

                            case 'ARRV':
                                $border_color = 'border-orange-500';
                                break;

                            case 'CLO':
                                $border_color = 'border-red-500';
                                break;

                            default:
                                $border_color = 'border-red-500';
                                break;
                        }
                    @endphp
                    <div
                        class="px-3 py-1 m-4 bg-gray-600 border-l-8 {{ $border_color }} cursor-pointer rounded-2xl hover:bg-gray-500">
                        <a class="flex" href="{{ route('cad.call.show', $call->id) }}">
                            <div class="ml-3 text-white">
                                <p>{{ $call->status }} || {{ $call->id }} | {{ $call->nature }} | Created:
                                    {{ $call->created_at->format('m/d/Y H:m:i') }} | Last Update:
                                    {{ $call->updated_at->format('m/d/Y H:m:i') }}
                                </p>
                                <p> Units:
                                    @foreach ($call->nice_units as $unit)
                                        {{ $unit }},
                                    @endforeach
                                </p>
                                <p>{{ $call->location }}, {{ $call->city }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-white uppercase">No Calls Matching Search</p>
                @endforelse
            </div>

        </div>
    </div>
</div>

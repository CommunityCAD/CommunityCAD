<div>
    <h1>Search Call Log</h1>
    <input type="text" wire:model='term' class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white">
    <div class="grid grid-cols-1 mt-5 sm:grid-cols-2">
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
                <a href="{{ route('cad.call.show', $call->id) }}" class="flex">
                    <div class="ml-3 text-white">
                        <p>{{ $call->status }} || {{ $call->id }} | {{ $call->nature }} | Created:
                            {{ $call->created_at->format('m/d/Y H:m:i') }}
                        </p>
                        <p> Units:
                            @foreach ($call->units['data'] as $unit)
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

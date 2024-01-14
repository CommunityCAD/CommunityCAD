<div>
    <div class="flex flex-col uppercase">
        <div class="flex items-center justify-around p-1 space-x-3 text-white rounded cursor-default">
            <p class="text-sm font-semibold">
                Officer {{ auth()->user()->officer_name ? auth()->user()->officer_name : auth()->user()->discord_name }}
            </p>
            <p class="text-lg"><span class="mr-3">{{ date('m/d/Y') }}</span><span id="running_clock"></span></p>
            <p class="flex">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke-width="1.5" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="mx-3">Connected to live_database_prod</span>
            </p>
        </div>
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

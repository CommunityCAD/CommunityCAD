<div class="flex flex-col uppercase">
    <div class="flex flex-row">
        <div class="w-3/5 p-4 mt-5 space-y-3 text-white border border-white rounded cursor-default mx-auto">
            <div class="flex">
                <div class="w-3/5">
                    <label class="block mr-2 text-lg">Name:</label>
                    <input class="text-input" type="text" wire:model.debounce.800ms='search_name'>
                </div>
                <div class="w-2/5 ml-3">
                    <label class="block mr-2 text-lg">Social Security:</label>
                    <input class="text-input" type="number" wire:model.debounce.800ms='search_ssn'>
                </div>
            </div>
            <hr>
            <div class="grid grid-cols-2 gap-2">
                @forelse ($civilians as $civilian)
                    <a class="" href="{{ route('cad.name.return', $civilian->id) }}">
                        <div class="bg-gray-200 rounded-lg p-2 text-black text-sm">
                            <div class="flex justify-between items-center border-b-2 border-blue-600">
                                <p class="text-lg">{{ strtoupper(get_setting('state')) }}</p>
                                <p class="text-sm">{{ $civilian->s_n_n }}</p>
                            </div>
                            <div class="flex justify-between mt-1">
                                <div class="h-20 w-20">
                                    @if (is_null($civilian->picture))
                                        <svg class="w-20 h-20" fill="none" stroke-width="1.5" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    @else
                                        <img alt="" src="{{ $civilian->picture }}">
                                    @endif

                                </div>
                                <div class="ml-3">
                                    <p><span class="text-blue-500 text-xs">LN</span>
                                        {{ $civilian->last_name }}</p>
                                    <p><span class="text-blue-500 text-xs">FN</span>
                                        {{ $civilian->first_name }}</p>
                                    <p>{{ $civilian->postal }} {{ $civilian->street }}
                                    </p>
                                    <p>{{ $civilian->city }}</p>
                                    <p><span class="text-blue-500 text-xs">DOB</span>
                                        {{ $civilian->date_of_birth->format('m/d/Y') }}</p>
                                </div>
                                <div>
                                    <p><span class="text-blue-500 text-xs">SEX</span>
                                        {{ $civilian->gender }}</p>
                                    <p><span class="text-blue-500 text-xs">HGT</span>
                                        {{ floor($civilian->height / 12) }}'
                                        {{ $civilian->height % 12 }}"
                                        ({{ round($civilian->height * 2.54) }}cm)
                                    </p>
                                    <p><span class="text-blue-500 text-xs">WGT</span> {{ $civilian->weight }}lb
                                        ({{ round($civilian->weight / 2.205) }}kg)</p>
                                </div>
                            </div>
                            <div class="border-t-2 border-black flex justify-between">

                            </div>
                        </div>
                    </a>
                @empty
                    <p>No search ran</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

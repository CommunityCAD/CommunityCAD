<div>
    @if (isset($paths))
        <ol role="list" class="flex items-center space-x-2">
            @foreach ($paths as $path)
                @if ($path['href'] == '')
                    <li>
                        <div class="flex items-center">
                            <a href="{{ $path['href'] }}"
                                class="mr-2 text-sm font-medium text-gray-500 hover:text-gray-700">{{ $path['text'] }}</a>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-5 w-5 flex-shrink-0 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </div>
                    </li>
                @else
                @endif
            @endforeach

            <li>
                <a href="{{ route('portal.dashboard') }}" class="text-gray-400 hover:text-gray-500">
                    <!-- Heroicon name: mini/home -->
                    <svg class="h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Home</span>
                </a>
            </li>
        </ol>
    @endif
</div>

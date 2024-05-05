<div class="ml-2 h-5 w-5 cursor-pointer z-50" x-data="{ tooltip: false }" x-on:mouseleave="tooltip = false"
    x-on:mouseover="tooltip = true">
    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
    </svg>
    <div class="text-sm text-white absolute bg-gray-700 rounded-lg w-60
    p-2 transform -translate-y-8 translate-x-8"
        x-show="tooltip">
        {{ $slot }}
    </div>
</div>

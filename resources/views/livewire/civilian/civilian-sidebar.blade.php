<div>
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            Civilian Portal
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3" x-data="{ open: false }">
                @if (false)
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <x-discord-link></x-discord-link>
                <ul x-transition:enter="transition-all ease-in-out duration-200" x-show="open"
                    x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                    x-transition:leave="transition-all ease-in-out duration-200"
                    x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-[#01161e]"
                    aria-label="submenu" @click.away="open = false">
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="#">Profile</a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="#">Settings</a>
                    </li>
                </ul>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is('portal/dashboard'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('portal/dashboard')) sidebar-link-active @endif"
                    href="{{ route('portal.dashboard') }}">
                    <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Member Portal</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is('civilian/civilians/*', 'civilian/civilians'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('civilian/civilians/*', 'civilian/civilians')) sidebar-link-active @endif"
                    href="{{ route('civilian.civilians.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>


                    <span class="ml-4">Civilians</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is(''))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('')) sidebar-link-active @endif"
                    href="{{ route('civilian.civilians.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>


                    <span class="ml-4">DMV</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is(''))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('')) sidebar-link-active @endif"
                    href="{{ route('civilian.civilians.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>


                    <span class="ml-4">ATF</span>
                </a>
            </li>



        </ul>
        <div class="px-6 my-6">

        </div>
    </div>

</div>

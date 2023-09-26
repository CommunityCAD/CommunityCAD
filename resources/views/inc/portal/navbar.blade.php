<header class="z-10 py-4 shadow-md bg-[#124559]">
    <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-300 md:justify-end">
        <!-- Mobile hamburger -->
        <button @click="sideMenu = !sideMenu" aria-label="Menu"
            class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple">
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path clip-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    fill-rule="evenodd"></path>
            </svg>
        </button>

        <ul class="flex items-center flex-shrink-0 space-x-6">
            <!-- Notifications menu -->
            <li class="relative" x-data="{ open: false }">
                <button @click="open = !open" @keydown.escape="open = false" aria-haspopup="true"
                    aria-label="Notifications"
                    class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                        </path>
                    </svg>
                    <!-- Notification badge -->
                    <span aria-hidden="true"
                        class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-gray-800 rounded-full"></span>
                </button>
                <div @click.away="open = false" @keydown.escape="open = false" x-show="open">
                    <ul aria-label="submenu"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-300 bg-gray-700 border border-gray-700 rounded-md shadow-md"
                        x-transition:leave-end="opacity-0" x-transition:leave-start="opacity-100"
                        x-transition:leave="transition ease-in duration-150">
                        <li class="flex">
                            <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-800 hover:text-gray-200"
                                href="#">
                                <span>New Applications</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                    13
                                </span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-800 hover:text-gray-200"
                                href="#">
                                <span>New Applications</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                    13
                                </span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-800 hover:text-gray-200"
                                href="#">
                                <span>New Applications</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                    13
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Profile menu -->

            <li class="relative" x-data="{ open: false }">
                <button @click="open = !open" @keydown.escape="open = false" aria-haspopup="true" aria-label="Profile"
                    class="relative align-middle rounded-md">
                    <x-discord-link></x-discord-link>
                </button>
                <div @click.away="open = false" @keydown.escape="open = false" x-show="open">
                    <ul aria-label="submenu"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-300 bg-gray-700 border border-gray-700 rounded-md shadow-md"
                        x-transition:leave-end="opacity-0" x-transition:leave-start="opacity-100"
                        x-transition:leave="transition ease-in duration-150">
                        <li class="flex">
                            <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-800 hover:text-gray-200"
                                href="{{ route('portal.user.settings.index') }}">
                                Settings
                            </a>
                        </li>
                        <li class="flex">
                            <form action="{{ route('logout') }}" class="block w-full text-red-400" method="POST">
                                @csrf
                                <a class="flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    <svg aria-hidden="true" class="w-4 h-4 mr-3" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    <span>Log out</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</header>

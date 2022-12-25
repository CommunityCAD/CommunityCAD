<div class="w-full text-gray-700 dark:bg-slate-500">
    <div x-data="{ open: false }"
        class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between p-4">
            <img src="{{ config('cad.community_logo') }}" width="40" height="40" alt="">
            <a href="{{ route('home') }}"
                class="text-lg font-semibold tracking-widest text-white uppercase rounded-lg xl:ml-3 focus:outline-none focus:shadow-outline">
                {{ config('cad.community_name') }}
            </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{ 'flex': open, 'hidden': !open }"
            class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">

            <x-theme-switch></x-theme-switch>

            @auth
                <div x-data="{ open: false }" class="relative z-50">
                    <a class="flex items-center px-4 py-2 mt-2 font-semibold text-white rounded-lg md:mt-0 hover:text-gray-300"
                        @click="open = !open" @keydown.escape="open = false">
                        <img class="object-cover mr-2 rounded-full w-9 h-9" src="{{ auth()->user()->avatar }}"
                            alt="{{ auth()->user()->discord_name }}#{{ auth()->user()->discriminator }}" />

                        <div>
                            {{ auth()->user()->discord_name }}#{{ auth()->user()->discriminator }}
                        </div>

                        <div class="ml-1">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </a>

                    <div x-show="open" @click.away="open = false" @keydown.escape="open = false">
                        <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                            aria-label="submenu">
                            <li class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="{{ route('account.show', auth()->user()->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>


                                    <span>View Account</span>
                                </a>
                            </li>
                            <li>
                                <hr>
                            </li>
                            <li class="flex">
                                <form method="POST" action="{{ route('logout') }}" class="block w-full text-red-400">
                                    @csrf
                                    <a class="flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
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


                </div>
            @endauth

            @guest
                @if (!session('id'))
                    <a class="px-4 py-2 mt-2 font-semibold text-white rounded-lg md:mt-0 hover:text-gray-300"
                        href="{{ route('auth.discord') }}">Login/Apply</a>
                @else
                    <div x-data="{ open: false }" class="relative z-50">
                        <a class="flex items-center px-4 py-2 mt-2 font-semibold text-white rounded-lg md:mt-0 hover:text-gray-300"
                            @click="open = !open" @keydown.escape="open = false">
                            <img class="object-cover mr-2 rounded-full w-9 h-9" src="{{ session('avatar') }}"
                                alt="{{ session('discord_name') }}#{{ session('discriminator') }}" />

                            <div>
                                {{ session('discord_name') }}#{{ session('discriminator') }}
                            </div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>

                        <div x-show="open" @click.away="open = false" @keydown.escape="open = false">
                            <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                aria-label="submenu">
                                <li class="flex">
                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                        href="{{ route('account.create') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>Create Account</span>
                                    </a>
                                </li>
                                <li>
                                    <hr>
                                </li>
                                <li class="flex">
                                    <form method="POST" action="{{ route('logout') }}"
                                        class="block w-full text-red-400">
                                        @csrf
                                        <a class="flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
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


                    </div>
                @endif
            @endguest

            {{-- @if (Auth::check())
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full px-2 py-2 mt-2 font-semibold text-left bg-transparent rounded-lg navbar-item-color md:w-auto md:inline md:mt-0 md:ml-4">
                        <img src="{{ Auth::user()->avatar }}" class="inline rounded-full" width="30" height="30"
                            alt="">
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 z-30 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="px-2 py-2 bg-white rounded-md shadow">
                            <p
                                class="block px-4 py-2 mt-2 text-sm font-bold text-center bg-transparent bg-gray-300 rounded-lg md:mt-0">
                                {{ Auth::user()->display_name }}</p>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-200"
                                href="{{ route('account.show', Auth::user()) }}">Your Account</a>

                            <?php
                            if (auth()->user()->account_status == 1) {
                                if (auth()->user()->reapply == 'Y') {
                                    if (auth()->user()->reapply_date <= date('Y-m-d')) {
                                        echo '<a href=' . route('apply.create') . " class=\"md:mt-0 hover:bg-gray-200 block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg\">Apply For Membership</a>";
                                    }
                                } elseif (is_null(auth()->user()->reapply)) {
                                    echo '<a href=' . route('apply.create') . " class=\"md:mt-0 hover:bg-gray-200 block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg\">Apply For Membership</a>";
                                }
                            }
                            ?>

                            @if (auth()->user()->account_status == 2)
                                <a href="{{ route('portal.home') }}"
                                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-200">Go
                                    to Portal</a>
                            @endif
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:bg-gray-200"
                                href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            @else
                @if (session('steam_hex'))
                    <a class="px-4 py-2 mt-2 font-semibold text-gray-400 rounded-lg md:mt-0 hover:text-white"
                        href="{{ route('account.create') }}">About
                        You</a>
                @else
                    <a class="px-4 py-2 mt-2 font-semibold text-gray-400 rounded-lg md:mt-0 hover:text-white"
                        href="">Login</a>
                @endif
            @endif --}}
        </nav>
    </div>
</div>

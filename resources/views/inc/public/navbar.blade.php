<div class="dark:bg-slate-500 w-full text-gray-700">
    <div x-data="{ open: false }"
        class="md:items-center md:justify-between md:flex-row md:px-6 lg:px-8 flex flex-col max-w-screen-xl px-4 mx-auto">
        <div class="flex flex-row items-center justify-between p-4">
            <img src="{{ config('cad.community_logo') }}" width="40" height="40" alt="">
            <a href="#"
                class="xl:ml-3 focus:outline-none focus:shadow-outline text-lg font-semibold tracking-widest text-white uppercase rounded-lg">
                {{ config('cad.community_name') }}
            </a>
            <button class="md:hidden focus:outline-none focus:shadow-outline rounded-lg" @click="open = !open">
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
            class="md:pb-0 md:flex md:justify-end md:flex-row flex-col flex-grow hidden pb-4">

            <x-theme-switch></x-theme-switch>

            @auth

            @endauth

            @guest
                @if (true)
                    <a class="md:mt-0 hover:text-gray-300 text-white px-4 py-2 mt-2 font-semibold rounded-lg"
                        href="#">Login</a>
                @else
                    // If they have logged in through steam but hasnt finished the application
                @endif
            @endguest

            {{-- @if (Auth::check())
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="navbar-item-color md:w-auto md:inline md:mt-0 md:ml-4 flex flex-row items-center w-full px-2 py-2 mt-2 font-semibold text-left bg-transparent rounded-lg">
                        <img src="{{ Auth::user()->avatar }}" class="inline rounded-full" width="30" height="30"
                            alt="">
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                            class="md:-mt-1 inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform">
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
                        class="md:w-48 absolute right-0 z-30 w-full mt-2 origin-top-right rounded-md shadow-lg">
                        <div class="px-2 py-2 bg-white rounded-md shadow">
                            <p
                                class="md:mt-0 block px-4 py-2 mt-2 text-sm font-bold text-center bg-transparent bg-gray-300 rounded-lg">
                                {{ Auth::user()->display_name }}</p>
                            <a class="md:mt-0 hover:bg-gray-200 block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg"
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
                                    class="md:mt-0 hover:bg-gray-200 block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg">Go
                                    to Portal</a>
                            @endif
                            <a class="md:mt-0 hover:bg-gray-200 block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg"
                                href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            @else
                @if (session('steam_hex'))
                    <a class="md:mt-0 hover:text-white px-4 py-2 mt-2 font-semibold text-gray-400 rounded-lg"
                        href="{{ route('account.create') }}">About
                        You</a>
                @else
                    <a class="md:mt-0 hover:text-white px-4 py-2 mt-2 font-semibold text-gray-400 rounded-lg"
                        href="">Login</a>
                @endif
            @endif --}}
        </nav>
    </div>
</div>

<header x-data="{
    navbarOpen: false
}" class="z-10 shadow-md bg-[#598392]">
    <div class="container mx-auto">
        <div class="relative flex items-center justify-between">
            <div class="max-w-full px-4 w-60">
                <a href="javascript:void(0)" class="block w-full py-5 text-lg font-bold text-gray-200">
                    Civilian Portal
                </a>
            </div>
            <div class="flex items-center justify-between w-full px-4">
                <div>
                    <button @click="navbarOpen = !navbarOpen" :class="navbarOpen && 'navbarTogglerActive'"
                        id="navbarToggler"
                        class="ring-primary absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] focus:ring-2 lg:hidden">
                        <span class="bg-white relative my-[6px] block h-[2px] w-[30px]"></span>
                        <span class="bg-white relative my-[6px] block h-[2px] w-[30px]"></span>
                        <span class="bg-white relative my-[6px] block h-[2px] w-[30px]"></span>
                    </button>
                    <nav :class="!navbarOpen && 'hidden'" id="navbarCollapse"
                        class="absolute right-4 top-full w-full max-w-[250px] bg-[#598392] rounded-lg py-5 px-6 shadow lg:static lg:block lg:w-full lg:max-w-full lg:shadow-none">
                        <ul class="block lg:flex">
                            <li>
                                <a href="{{ route('portal.dashboard') }}"
                                    class="flex py-2 text-base font-medium text-gray-300 hover:text-gray-100 lg:ml-12 lg:inline-flex">
                                    Member Portal
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('civilian.civilians.index') }}"
                                    class="text-gray-300 hover:text-gray-100 flex py-2 text-base font-medium lg:ml-12 lg:inline-flex @if (request()->is('civilian/*')) text-white underline @endif">
                                    Civilians
                                </a>
                            </li>
                            {{-- <li>
                                <a href="javascript:void(0)"
                                    class="flex py-2 text-base font-medium text-gray-300 hover:text-gray-100 lg:ml-12 lg:inline-flex">
                                    Businesses
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="flex py-2 text-base font-medium text-gray-300 hover:text-gray-100 lg:ml-12 lg:inline-flex">
                                    Tow
                                </a>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

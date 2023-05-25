<div>
    <div class="py-4 text-gray-200">
        <a class="ml-6 text-lg font-bold" href="{{ route('portal.dashboard') }}">
            Staff Area
        </a>
        <ul class="mt-6">
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
                @if (request()->is('staff/'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('staff/')) sidebar-link-active @endif"
                    href="{{ route('staff.index') }}">
                    <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Staff Dashboard</span>
                </a>
            </li>
            <hr>

            <li class="relative px-6 py-3">
                @if (request()->is('staff/applications/*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('staff/applications/*')) sidebar-link-active @endif"
                    href="{{ route('cad.landing') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                    </svg>
                    <span class="ml-4">Applications</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is('civilian/*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('civilian/*')) sidebar-link-active @endif"
                    href="{{ route('civilian.civilians.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                    </svg>
                    <span class="ml-4">Dispatch Center</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if (request()->is('civilian/*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('civilian/*')) sidebar-link-active @endif"
                    href="{{ route('civilian.civilians.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                    <span class="ml-4">Civilian DMV</span>
                </a>
            </li>
            <hr>

            <li class="relative px-6 py-3">
                @if (request()->is(''))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('')) sidebar-link-active @endif" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                    </svg>
                    <span class="ml-4">Internal Affairs</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is(''))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('')) sidebar-link-active @endif" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                    </svg>
                    <span class="ml-4">Development</span>
                </a>
            </li>
            <hr>

            <li class="relative px-6 py-3">
                @if (request()->is(''))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                        aria-hidden="true"></span>
                    <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                        aria-hidden="true"></span>
                @endif
                <a class="sidebar-link @if (request()->is('')) sidebar-link-active @endif" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" />
                    </svg>
                    <span class="ml-4">Supervisor</span>
                </a>
            </li>
            @can('admin_access')
                <li class="relative px-6 py-3">
                    @if (request()->is('portal/admin/*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                            aria-hidden="true"></span>
                        <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                            aria-hidden="true"></span>
                    @endif
                    <a class="sidebar-link @if (request()->is('portal/admin/*')) sidebar-link-active @endif"
                        href="{{ route('admin.index') }}">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" class="w-4 h-4" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-shield">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            <span class="ml-4">Staff & Admin</span>
                        </span>
                    </a>
                </li>
                <li class="relative px-6 py-3" x-data="{ open: false }">
                    @if (request()->is('admin/*'))
                        <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                            aria-hidden="true"></span>
                        <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                            aria-hidden="true"></span>
                    @endif
                    <a class="sidebar-link !justify-between @if (request()->is('admin/*')) sidebar-link-active @endif"
                        href="#" @click="open = !open">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" class="w-4 h-4" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-shield">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            <span class="ml-4">Staff & Admin</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <ul x-transition:enter="transition-all ease-in-out duration-200" x-show="open"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-200"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium rounded-md shadow-inner text-gray-200 bg-[#01161e]"
                        aria-label="submenu" @click.away="open = false">
                        @can('announcements_access')
                            <li class="px-2 py-1 transition-colors duration-150 ">
                                <a class="w-full hover:text-gray-400" href="#">Announcements</a>
                            </li>
                        @endcan
                        @can('application_access')
                            <li
                                class="px-2 py-1 transition-colors duration-150 @if (request()->is('admin/application/*')) sidebar-link-active @endif">
                                <a class="w-full hover:text-gray-400"
                                    href="{{ route('admin.application.index', 1) }}">Applications</a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="px-2 py-1 transition-colors duration-150">
                                <a class="w-full hover:text-gray-400" href="{{ route('admin.users.index') }}">Manage
                                    Members</a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li
                                class="px-2 py-1 transition-colors duration-150  @if (request()->is('admin/roles/*')) sidebar-link-active @endif">
                                <a class="w-full hover:text-gray-400" href="{{ route('admin.roles.index') }}">Roles</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan





            {{-- <li class="relative px-6 py-3" x-data="{ open: false }">
            @if (false)
                <span class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"
                    aria-hidden="true"></span>
                <span class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"
                    aria-hidden="true"></span>
            @endif
            <a class="sidebar-link !justify-between @if (false) !text-white @endif"
                href="#" @click="open = !open">
                <span class="inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                    </svg>


                    <span class="ml-4">Internal Affairs</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
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
        </li> --}}

        </ul>
    </div>

</div>

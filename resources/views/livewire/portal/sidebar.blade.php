<div>
    <div class="py-4 text-gray-200">
        <a class="ml-6 text-lg font-bold" href="{{ route('portal.dashboard') }}">
            Member Portal
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if (request()->is('portal/dashboard'))
                    <span aria-hidden="true"
                        class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"></span>
                    <span aria-hidden="true"
                        class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"></span>
                @endif
                <a class="sidebar-link @if (request()->is('portal/dashboard')) sidebar-link-active @endif"
                    href="{{ route('portal.dashboard') }}">
                    <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
            <hr>
            <li class="relative px-6 py-3">
                @if (request()->is('civilian/*'))
                    <span aria-hidden="true"
                        class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"></span>
                    <span aria-hidden="true"
                        class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"></span>
                @endif
                <a class="sidebar-link @if (request()->is('civilian/*')) sidebar-link-active @endif"
                    href="{{ route('cad.landing') }}">
                    <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="ml-4">CAD System</span>
                </a>
            </li>
            {{-- <li class="relative px-6 py-3">
                @if (request()->is('civilian/*'))
                    <span aria-hidden="true"
                        class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"></span>
                    <span aria-hidden="true"
                        class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"></span>
                @endif
                <a class="sidebar-link @if (request()->is('civilian/*')) sidebar-link-active @endif" href="#">
                    <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="ml-4">Courthouse</span>
                </a>
            </li>

            <li class="relative px-6 py-3">
                @if (request()->is('civilian/*'))
                    <span aria-hidden="true"
                        class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"></span>
                    <span aria-hidden="true"
                        class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"></span>
                @endif
                <a class="sidebar-link @if (request()->is('civilian/*')) sidebar-link-active @endif" href="#">
                    <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="ml-4">Reports</span>
                </a>
            </li> --}}

            <li class="relative px-6 py-3">
                @if (request()->is('civilian/*'))
                    <span aria-hidden="true"
                        class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"></span>
                    <span aria-hidden="true"
                        class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"></span>
                @endif
                <a class="sidebar-link @if (request()->is('civilian/*')) sidebar-link-active @endif"
                    href="{{ route('civilian.civilians.index') }}">
                    <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="ml-4">Civilian DMV</span>
                </a>
            </li>
            <hr>

            {{-- <li class="relative px-6 py-3">
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
            </li> --}}

            @foreach ($departments as $department)
                <li class="relative px-6 py-3">
                    @if (request()->is('portal/department/' . $department->slug . '*'))
                        <span aria-hidden="true"
                            class="absolute inset-y-0 left-0 w-1 bg-[#01161e] rounded-tr-xl rounded-br-xl"></span>
                        <span aria-hidden="true"
                            class="absolute inset-y-0 right-0 w-1 bg-[#01161e] rounded-tl-xl rounded-bl-xl"></span>
                    @endif
                    <a class="sidebar-link @if (request()->is('portal/department/' . $department->slug . '*')) sidebar-link-active @endif"
                        href="{{ route('portal.department.show', $department->slug) }}">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8.25V18a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 18V8.25m-18 0V6a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6zM7.5 6h.008v.008H7.5V6zm2.25 0h.008v.008H9.75V6z" />
                        </svg> --}}
                        <img alt="" class="w-4 h-4" src="{{ $department->logo }}">
                        <span class="ml-4">{{ $department->name }}</span>
                    </a>
                </li>
            @endforeach
            <li class="relative px-6 py-3">
                <a class="sidebar-link @if (request()->is('portal/penalcode')) sidebar-link-active @endif"
                    href="{{ route('portal.penalcode') }}">
                    <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="ml-4">Penal Code</span>
                </a>
            </li>
            <hr>

            @can('supervisor_access')
                <li class="relative px-6 py-3">
                    <a class="sidebar-link @if (request()->is('supervisor/')) sidebar-link-active @endif"
                        href="{{ route('supervisor.index') }}">
                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">Supervisor</span>
                    </a>
                </li>
            @endcan

            @can('staff_access')
                <li class="relative px-6 py-3">
                    <a class="sidebar-link @if (request()->is('staff/')) sidebar-link-active @endif"
                        href="{{ route('staff.index') }}">
                        <span class="inline-flex items-center">
                            <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <span class="ml-4">Staff</span>
                        </span>
                    </a>
                </li>
            @endcan

            @can('admin_access')
                <li class="relative px-6 py-3">
                    <a class="sidebar-link @if (request()->is('portal/admin/*')) sidebar-link-active @endif"
                        href="{{ route('admin.index') }}">
                        <span class="inline-flex items-center">
                            <svg class="w-4 h-4" class="feather feather-shield" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            <span class="ml-4">Admin</span>
                        </span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>

</div>

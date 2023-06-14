<div>
    <div class="py-4 text-gray-200">
        <a class="ml-6 text-lg font-bold" href="{{ route('portal.dashboard') }}">
            Staff Area
        </a>
        <ul class="mt-6 text-sm font-medium text-slate-200">
            <li class="relative px-6 py-3">
                <a class="flex items-center @if (request()->is('portal/dashboard')) !text-base !text-purple-500 @endif"
                    href="{{ route('portal.dashboard') }}">
                    <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Member Portal</span>
                </a>
            </li>

            @can('supervisor_access')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('portal/dashboard')) !text-base !text-purple-500 @endif"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" />
                        </svg>
                        <span class="ml-4">Supervisor Area</span>
                    </a>
                </li>
            @endcan

            @can('staff_access')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('staff')) !text-base !text-purple-500 @endif"
                        href="{{ route('staff.index') }}">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>

                            <span class="ml-4">Staff Area</span>
                        </span>
                    </a>
                </li>
            @endcan
            @can('admin_access')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin')) !text-base !text-purple-500 @endif"
                        href="{{ route('admin.index') }}">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                class="w-4 h-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-shield">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            <span class="ml-4">Admin Area</span>
                        </span>
                    </a>
                </li>
            @endcan
            <hr>
            @can('application_access')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('staff/application/*') || request()->is('staff/application')) text-lg text-purple-500 @endif"
                        href="{{ route('staff.application.index', 1) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                        <span class="ml-4">Applications</span>
                    </a>
                </li>
            @endcan

            @can('announcement_manage')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('staff/announcement/*') || request()->is('staff/announcement')) text-lg text-purple-500 @endif"
                        href="{{ route('staff.announcement.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path
                                d="M16.881 4.346A23.112 23.112 0 018.25 6H7.5a5.25 5.25 0 00-.88 10.427 21.593 21.593 0 001.378 3.94c.464 1.004 1.674 1.32 2.582.796l.657-.379c.88-.508 1.165-1.592.772-2.468a17.116 17.116 0 01-.628-1.607c1.918.258 3.76.75 5.5 1.446A21.727 21.727 0 0018 11.25c0-2.413-.393-4.735-1.119-6.904zM18.26 3.74a23.22 23.22 0 011.24 7.51 23.22 23.22 0 01-1.24 7.51c-.055.161-.111.322-.17.482a.75.75 0 101.409.516 24.555 24.555 0 001.415-6.43 2.992 2.992 0 00.836-2.078c0-.806-.319-1.54-.836-2.078a24.65 24.65 0 00-1.415-6.43.75.75 0 10-1.409.516c.059.16.116.321.17.483z" />
                        </svg>
                        <span class="ml-4">Announcements</span>
                    </a>
                </li>
            @endcan




        </ul>
    </div>

</div>

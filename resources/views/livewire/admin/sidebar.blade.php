<div>
    <div class="py-4 text-gray-200">
        <div class="ml-6 text-lg font-bold flex items-center">
            <img alt="Court Logo" class="w-12" src="{{ get_setting('community_logo') }}">
            <div class="ml-3">
                {{-- <p>{{ get_setting('community_name') }}</p> --}}
                <p>Admin Portal</p>
            </div>
        </div>
        <ul class="mt-6 text-sm font-medium text-slate-200">
            <li class="relative px-6 py-3">
                <a class="flex items-center @if (request()->is('portal/dashboard')) !text-base !text-purple-500 @endif"
                    href="{{ route('portal.dashboard') }}">
                    <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Member Portal</span>
                </a>
            </li>

            @can('supervisor_access')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('supervisor') or request()->is('supervisor/*')) !text-base !text-purple-500 @endif"
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
                    <a class="flex items-center @if (request()->is('staff') or request()->is('staff/*')) !text-base !text-purple-500 @endif"
                        href="{{ route('staff.index') }}">
                        <span class="inline-flex items-center">
                            <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
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
                    <a class="flex items-center @if (request()->is('admin') or request()->is('admin/*')) !text-base !text-purple-500 @endif"
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
            <hr>
            @can('user_access')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin/users/*') || request()->is('admin/users')) text-lg text-purple-500 @endif"
                        href="{{ route('admin.users.index') }}">
                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">Manage Members</span>
                    </a>
                </li>
            @endcan
            @can('role_manage')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin/roles/*') || request()->is('admin/roles')) !text-base !text-purple-500 @endif"
                        href="{{ route('admin.roles.index') }}">
                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">Manage Roles</span>
                    </a>
                </li>
            @endcan
            @can('department_manage')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin/department/*') || request()->is('admin/department')) !text-base !text-purple-500 @endif"
                        href="{{ route('admin.department.index') }}">
                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 8.25V18a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 18V8.25m-18 0V6a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6zM7.5 6h.008v.008H7.5V6zm2.25 0h.008v.008H9.75V6z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">Manage Departments</span>
                    </a>
                </li>
            @endcan

            @can('civilian_level_manage')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin/civilian_level/*') || request()->is('admin/civilian_level')) !text-base !text-purple-500 @endif"
                        href="{{ route('admin.civilian_level.index') }}">
                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="ml-4">Manage Civilian Levels</span>
                    </a>
                </li>
            @endcan

            @can('disciplinary_action_type_manage')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin/disciplinary_action_type/*') || request()->is('admin/disciplinary_action_type')) !text-base !text-purple-500 @endif"
                        href="{{ route('admin.disciplinary_action_type.index') }}">
                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="ml-4">Manage DAs Levels</span>
                    </a>
                </li>
            @endcan

            @can('license_type_manage')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin/license_type/*') || request()->is('admin/license_type')) !text-base !text-purple-500 @endif"
                        href="{{ route('admin.license_type.index') }}">
                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">Manage License Types</span>
                    </a>
                </li>
            @endcan

            @can('report_type_manage')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin/report_type/*') || request()->is('admin/report_type')) !text-base !text-purple-500 @endif"
                        href="{{ route('admin.report_type.index') }}">
                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">Manage Report Types</span>
                    </a>
                </li>
            @endcan

            @can('penal_code_manage')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin/penalcode/*') || request()->is('admin/penalcode')) !text-base !text-purple-500 @endif"
                        href="{{ route('admin.penalcode.code.index') }}">
                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">Manage Penal Code</span>
                    </a>
                </li>
            @endcan

            @can('cad_settings')
                <li class="relative px-6 py-3">
                    <a class="flex items-center @if (request()->is('admin/cad_setting/*') || request()->is('admin/cad_setting')) !text-base !text-purple-500 @endif"
                        href="{{ route('admin.cad_setting.index') }}">
                        <svg class="w-4 h-4" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ml-4">CAD Settings</span>
                    </a>
                </li>
            @endcan

        </ul>
    </div>

</div>

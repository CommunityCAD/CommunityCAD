@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg text-white">User Profile | {{ $user->discord }}</p>
        </div>

        @livewire('breadcrumbs', ['paths' => [['href' => route('admin.users.index'), 'text' => 'View All Members']]])

    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <div class="w-full px-6 py-8 mt-6 mb-6 text-gray-900 shadow-md sm:max-w-5xl sm:rounded-lg dark:text-white">
            <div class="md:flex md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2 dark:bg-[#124559] shadow-md sm:rounded-lg">
                    <!-- Profile Card -->
                    <div class="p-3">
                        <div class="overflow-hidden image">
                            <img class="w-full h-auto mx-auto rounded-full" src="{{ $user->avatar }}" alt="">
                        </div>
                        <h1 class="my-1 text-xl font-bold leading-8 text-[#eff6e0]">{{ $user->discord_name }}</h1>
                        <ul class="px-3 py-2 mt-3 text-[#eff6e0] bg-[#01161e] divide-y rounded shadow-sm hover:shadow">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span class="ml-auto"><span
                                        class="px-2 py-1 text-sm text-white bg-green-500 rounded">{{ $user->status_name }}</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">
                                    @if (!is_null($user->member_join_date))
                                        {{ $user->member_join_date->format('M d, Y') }}
                                    @else
                                        Not a member
                                    @endif
                                </span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Account since</span>
                                <span class="ml-auto">{{ $user->created_at->format('M d, Y') }}</span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Last login</span>
                                <span class="ml-auto">{{ $user->last_login->format('M d, Y H:i') }}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                </div>
                <!-- Right Side -->
                <div class="w-full mx-2 md:w-9/12">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="p-3 dark:bg-[#124559] text-[#eff6e0] rounded-sm shadow-sm" x-data="{ open: false }">
                        <div class="flex items-center justify-between space-x-2 text-lg font-semibold leading-8 border-b border-black cursor-pointer"
                            @click="open = !open">
                            <span clas="text-green-500">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Information</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                        <div class="" x-show="open" @click.away="open = false">
                            <div class="grid text-sm md:grid-cols-2">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-bold">Discord Name</div>
                                    <div class="px-4 py-2">{{ $user->discord_name }}#{{ $user->discriminator }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-bold">Real Name</div>
                                    <div class="px-4 py-2">{{ $user->real_name }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-bold">Email</div>
                                    <div class="px-4 py-2">{{ $user->email }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-bold">Steam Hex</div>
                                    <div class="px-4 py-2">{{ $user->steam_hex }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-bold">Steam ID</div>
                                    <div class="px-4 py-2">{{ $user->steam_id }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-bold">Discord ID</div>
                                    <div class="px-4 py-2">{{ $user->id }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-bold">Birthday</div>
                                    <div class="px-4 py-2">{{ $user->birthday->format('M d, Y') }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-bold">Age</div>
                                    <div class="px-4 py-2">{{ $user->age }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-4"></div>

                    <div class="p-3 dark:bg-[#124559] text-[#eff6e0] rounded-sm shadow-sm" x-data="{ open: false }">

                        <div class="flex items-center justify-between space-x-2 text-lg font-semibold leading-8 border-b border-black cursor-pointer"
                            @click="open = !open">

                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>

                            <span class="tracking-wide">Applications</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                        <div class="" x-show="open" @click.away="open = false">
                            <ul class="space-y-2 list-inside">
                                @foreach ($user->applications as $application)
                                    <li>
                                        <a href="{{ route('admin.application.show', $application->id) }}"
                                            class="text-teal-300 hover:underline hover:text-teal-400">Application
                                            #{{ $application->id }} for {{ $application->department->name }}</a>
                                        <div class="text-xs">Status: {{ $application->status_name }}</div>
                                        <div class="text-xs">Created At: {{ $application->created_at->format('m/d/Y') }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    @can('user_edit')
                        <div class="my-4"></div>

                        <div class="p-3 dark:bg-[#124559] text-[#eff6e0] rounded-sm shadow-sm" x-data="{ open: false }">
                            <div class="flex items-center justify-between space-x-2 text-lg font-semibold leading-8 border-b border-black cursor-pointer"
                                @click="open = !open">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" class="w-6 h-6" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shield">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                                <span class="tracking-wide">Admin Actions</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                            <div class="flex flex-wrap p-3" x-show="open" @click.away="open = false">
                                <a href="#" class="px-2 py-1 m-1 text-black rounded bg-slate-300">Edit
                                    Information</a>
                                @can('user_edit_status')
                                    <a href="{{ route('admin.users.status.edit', $user->id) }}"
                                        class="px-2 py-1 m-1 text-black rounded bg-slate-300">Force Change
                                        Status</a>
                                @endcan

                                @can('user_edit_roles')
                                    <a href="{{ route('admin.users.roles.edit', $user->id) }}"
                                        class="px-2 py-1 m-1 text-black rounded bg-slate-300">Edit Roles</a>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    @can(['user_edit', 'user_edit'])
                        <div class="my-4"></div>

                        <div class="p-3 dark:bg-[#124559] text-[#eff6e0] rounded-sm shadow-sm" x-data="{ open: false }">
                            <div class="flex items-center justify-between space-x-2 text-lg font-semibold leading-8 border-b border-black cursor-pointer"
                                @click="open = !open">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" class="w-6 h-6" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shield">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                                <span class="tracking-wide">Supervisor Actions</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                            <div class="flex flex-wrap p-3" x-show="open" @click.away="open = false">
                                <a href="#" class="px-2 py-1 m-1 text-black rounded bg-slate-300">Manage Departments</a>
                                <a href="#" class="px-2 py-1 m-1 text-black rounded bg-slate-300">Create DA</a>
                                <a href="#" class="px-2 py-1 m-1 text-black rounded bg-slate-300">Place on LOA</a>
                            </div>
                        </div>
                    @endcan

                    @can(['user_edit', 'user_edit'])
                        {{-- Will be user_da_access --}}
                        <div class="my-4"></div>

                        <div class="p-3 dark:bg-[#124559] text-[#eff6e0] rounded-sm shadow-sm" x-data="{ open: false }">
                            <div class="flex items-center justify-between space-x-2 text-lg font-semibold leading-8 border-b border-black cursor-pointer"
                                @click="open = !open">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                                </svg>

                                <span class="tracking-wide">Disciplinary Actions</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                            <div class="flex flex-wrap p-3" x-show="open" @click.away="open = false">
                                <a href="#" class="px-2 py-1 m-1 text-black rounded bg-slate-300">Manage Departments</a>
                                <a href="#" class="px-2 py-1 m-1 text-black rounded bg-slate-300">Create DA</a>
                                <a href="#" class="px-2 py-1 m-1 text-black rounded bg-slate-300">Place on LOA</a>
                            </div>
                        </div>
                    @endcan

                    @can(['user_edit', 'user_edit'])
                        {{-- Will be user_loa_access --}}
                        <div class="my-4"></div>

                        <div class="p-3 dark:bg-[#124559] text-[#eff6e0] rounded-sm shadow-sm" x-data="{ open: false }">
                            <div class="flex items-center justify-between space-x-2 text-lg font-semibold leading-8 border-b border-black cursor-pointer"
                                @click="open = !open">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                                </svg>

                                <span class="tracking-wide">LOA Reports</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                            <div class="flex flex-wrap p-3" x-show="open" @click.away="open = false">
                                <a href="#" class="px-2 py-1 m-1 text-black rounded bg-slate-300">Manage Departments</a>
                                <a href="#" class="px-2 py-1 m-1 text-black rounded bg-slate-300">Create DA</a>
                                <a href="#" class="px-2 py-1 m-1 text-black rounded bg-slate-300">Place on LOA</a>
                            </div>
                        </div>
                    @endcan






                    <div class="my-4"></div>

                    <div class="p-3 dark:bg-[#124559] text-[#eff6e0] rounded-sm shadow-sm" x-data="{ open: false }">
                        <div class="flex items-center justify-between space-x-2 text-lg font-semibold leading-8 border-b border-black cursor-pointer"
                            @click="open = !open">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                            </svg>

                            <span class="tracking-wide">User History</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                        <div class="" x-show="open" @click.away="open = false">
                            <div class="px-6 py-8">
                                <div class="">
                                    @foreach ($histories as $history)
                                        <div class="p-3 my-2 border-2 border-gray-900">
                                            <p class="text-white">Actioned by: {{ $history->user->discord }} at
                                                {{ $history->created_at->format('m/d/Y H:i:s') }}
                                            </p>
                                            <div>
                                                <p class="text-gray-400">{{ $history->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

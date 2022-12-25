@extends('layouts.public')

@section('content')
    <div class="container p-5 mx-auto my-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="p-3 bg-white border-t-4 border-green-400">
                    <div class="overflow-hidden image">
                        <img class="w-full h-auto mx-auto" src="{{ $user->avatar }}" alt="">
                    </div>
                    <h1 class="my-1 text-xl font-bold leading-8 text-gray-900">{{ $user->discord_name }}</h1>
                    <ul
                        class="px-3 py-2 mt-3 text-gray-600 bg-gray-100 divide-y rounded shadow-sm hover:text-gray-700 hover:shadow">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="px-2 py-1 text-sm text-white bg-green-500 rounded">User</span></span>
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
            <div class="w-full h-64 mx-2 md:w-9/12">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="p-3 bg-white rounded-sm shadow-sm">
                    <div class="flex items-center space-x-2 font-semibold leading-8 text-gray-900 border-b border-black">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Information</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid text-sm md:grid-cols-2">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Discord Name</div>
                                <div class="px-4 py-2">{{ $user->discord_name }}#{{ $user->discriminator }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Real Name</div>
                                <div class="px-4 py-2">{{ $user->real_name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">{{ $user->email }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Steam Hex</div>
                                <div class="px-4 py-2">{{ $user->steam_hex }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Steam ID</div>
                                <div class="px-4 py-2">{{ $user->steam_id }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Discord ID</div>
                                <div class="px-4 py-2">{{ $user->id }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">{{ $user->birthday->format('M d, Y') }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Age</div>
                                <div class="px-4 py-2">{{ $user->age }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-4"></div>

                <div class="p-3 bg-white rounded-sm shadow-sm">
                    <div>
                        <div
                            class="flex items-center justify-between mb-3 space-x-2 font-semibold leading-8 text-gray-900 border-b border-black">
                            <div class="flex items-center">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Applications</span>
                            </div>
                            <a href="#" class="px-2 py-1 text-sm text-white bg-green-500 rounded">New Application</a>
                        </div>
                        <ul class="space-y-2 list-inside">
                            <li>
                                <a href="#" class="text-teal-600 hover:underline hover:text-teal-400">Application
                                    #98743</a>
                                <div class="text-xs text-gray-500">Status: Pending Review</div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

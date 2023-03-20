@extends('layouts.public')

@section('content')

    <main class="max-w-md w-full mx-auto bg-[#124559] text-white mt-16 rounded-xl p-4">
        @auth
            <div class="space-y-3">
                <p class="text-2xl flex">Welcome back, {{ auth()->user()->discord_name }}!</p>
                <p class="text-lg">What would you like to do?</p>

                @if (auth()->user()->account_status === 1)
                    @if (is_null(auth()->user()->reapply))
                        <div class="flex">
                            <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md bg-[#598392] hover:opacity-75 hover:text-slate-200"
                                href="{{ route('application.create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 h-4 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                </svg>
                                <span>New Application</span>
                            </a>
                        </div>
                    @else
                        @if (auth()->user()->reapply)
                            @if (auth()->user()->reapply_date > now())
                                <p class="">You can not reapply until
                                    {{ auth()->user()->reapply_date->format('m/d/Y') }}. View your last application to see
                                    why it was denied.</p>
                            @else
                                <div class="flex">
                                    <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md bg-[#598392] hover:opacity-75 hover:text-slate-200"
                                        href="{{ route('application.create') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                        </svg>
                                        <span>New Application</span>
                                    </a>
                                </div>
                            @endif
                        @else
                            <p class="">You can not reapply. View your last application to see
                                why it was denied.</p>
                        @endif
                    @endif
                @endif

                @if (auth()->user()->account_status === 3)
                    <div class="flex">
                        <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md bg-[#598392] hover:opacity-75 hover:text-slate-200"
                            href="{{ route('portal.dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                            </svg>
                            <span>Go To CAD Portal</span>
                        </a>
                    </div>
                @endif

                <div class="flex">
                    <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md bg-[#598392] hover:opacity-75 hover:text-slate-200"
                        href="{{ route('account.show', auth()->user()->id) }}">
                        <span clas="text-green-500">
                            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span>View Profile</span>
                    </a>
                </div>
                <div class="flex">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md bg-red-500 hover:opacity-75 hover:text-red-200 cursor-pointer"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            <svg class="w-4 h-4 mr-1" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span>Logout</span>
                        </a>
                    </form>
                </div>

            </div>
        @endauth

        @guest
            <div class="space-y-2">
                <p class="text-2xl flex">Welcome to {{ config('cad.community_name') }}!</p>
                <img src="{{ config('cad.community_logo') }}" alt="" class="mx-auto">
                <p class="">{{ config('cad.community_intro') }}</p>

                <div class="flex w-full">
                    <a class="inline-flex items-center mx-auto px-4 py-2 transition-colors duration-150 rounded-md bg-slate-500 hover:bg-slate-800 hover:text-slate-200"
                        href="{{ route('auth.discord') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127.14 96.36" class="w-4 h-4 mr-2">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fff;
                                    }
                                </style>
                            </defs>
                            <g id="图层_2" data-name="图层 2">
                                <g id="Discord_Logos" data-name="Discord Logos">
                                    <g id="Discord_Logo_-_Large_-_White" data-name="Discord Logo - Large - White">
                                        <path class="cls-1"
                                            d="M107.7,8.07A105.15,105.15,0,0,0,81.47,0a72.06,72.06,0,0,0-3.36,6.83A97.68,97.68,0,0,0,49,6.83,72.37,72.37,0,0,0,45.64,0,105.89,105.89,0,0,0,19.39,8.09C2.79,32.65-1.71,56.6.54,80.21h0A105.73,105.73,0,0,0,32.71,96.36,77.7,77.7,0,0,0,39.6,85.25a68.42,68.42,0,0,1-10.85-5.18c.91-.66,1.8-1.34,2.66-2a75.57,75.57,0,0,0,64.32,0c.87.71,1.76,1.39,2.66,2a68.68,68.68,0,0,1-10.87,5.19,77,77,0,0,0,6.89,11.1A105.25,105.25,0,0,0,126.6,80.22h0C129.24,52.84,122.09,29.11,107.7,8.07ZM42.45,65.69C36.18,65.69,31,60,31,53s5-12.74,11.43-12.74S54,46,53.89,53,48.84,65.69,42.45,65.69Zm42.24,0C78.41,65.69,73.25,60,73.25,53s5-12.74,11.44-12.74S96.23,46,96.12,53,91.08,65.69,84.69,65.69Z" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span>Login/Apply With Discord</span>
                    </a>
                </div>
            </div>
        @endguest

        <div class="border-t mt-3 flex space-x-2 justify-between pt-2">
            <x-simple-theme-switch class="text-gray-300 underline text-sm">Change Theme</x-simple-theme-switch>

            <a class="text-sm text-slate-400 underline" href="https://communitycad.app">Community CAD
                {{ config('app.version') }}</a>
        </div>
    </main>

@endsection

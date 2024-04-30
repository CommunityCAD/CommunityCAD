@extends('layouts.public')

@section('content')

    <main class="max-w-2xl w-full mx-auto bg-[#124559] text-white mt-16 rounded-xl p-4">
        @auth
            <div class="space-y-3">
                <p class="flex text-2xl">Welcome back, {{ auth()->user()->discord_name }}!</p>
                <p class="text-lg">What would you like to do?</p>

                @if (auth()->user()->account_status === 1)
                    @if (is_null(auth()->user()->reapply))
                        @if (get_setting('members_must_apply') == 'true')
                            <div class="flex">
                                <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md bg-[#598392] hover:opacity-75 hover:text-slate-200"
                                    href="{{ route('application.create') }}">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke-width="1.5" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span>New Application</span>
                                </a>
                            </div>
                        @endif
                    @else
                        @if (get_setting('members_must_apply') == 'true')
                            @if (auth()->user()->reapply)
                                @if (auth()->user()->reapply_date > now())
                                    <p class="">You can not reapply until
                                        {{ auth()->user()->reapply_date->format('m/d/Y') }}. View your last application to see
                                        why it was denied.</p>
                                @else
                                    <div class="flex">
                                        <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md bg-[#598392] hover:opacity-75 hover:text-slate-200"
                                            href="{{ route('application.create') }}">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke-width="1.5" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"
                                                    stroke-linecap="round" stroke-linejoin="round" />
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
                @endif

                @if (auth()->user()->account_status === 3)
                    <div class="flex">
                        <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md bg-[#598392] hover:opacity-75 hover:text-slate-200"
                            href="{{ route('portal.dashboard') }}">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke-width="1.5" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Go To CAD Portal</span>
                        </a>
                    </div>
                @endif

                <div class="flex">
                    <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md bg-[#598392] hover:opacity-75 hover:text-slate-200"
                        href="{{ route('account.show', auth()->user()->id) }}">
                        <span clas="text-green-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </span>
                        <span>View Profile</span>
                    </a>
                </div>
                <div class="flex">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 bg-red-500 rounded-md cursor-pointer hover:opacity-75 hover:text-red-200"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            <svg aria-hidden="true" class="w-4 h-4 mr-1" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
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
                <p class="flex text-2xl">{{ __('Welcome to') }} {{ get_setting('community_name') }}!</p>
                <img alt="" class="mx-auto" src="{{ get_setting('community_logo') }}">

                <div class="prose text-white">
                    <p class="">{!! Str::markdown(get_setting('community_intro')) !!}</p>
                </div>

                <div class="flex w-full">
                    <a class="flex items-center mx-auto button-md bg-[#7289da] text-gray-800 hover:opacity-70"
                        href="{{ route('auth.discord') }}">
                        <svg class="w-4 h-4 mr-2" viewBox="0 0 127.14 96.36" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: rgb(31 41 55);
                                    }
                                </style>
                            </defs>
                            <g data-name="图层 2" id="图层_2">
                                <g data-name="Discord Logos" id="Discord_Logos">
                                    <g data-name="Discord Logo - Large - White" id="Discord_Logo_-_Large_-_White">
                                        <path class="cls-1"
                                            d="M107.7,8.07A105.15,105.15,0,0,0,81.47,0a72.06,72.06,0,0,0-3.36,6.83A97.68,97.68,0,0,0,49,6.83,72.37,72.37,0,0,0,45.64,0,105.89,105.89,0,0,0,19.39,8.09C2.79,32.65-1.71,56.6.54,80.21h0A105.73,105.73,0,0,0,32.71,96.36,77.7,77.7,0,0,0,39.6,85.25a68.42,68.42,0,0,1-10.85-5.18c.91-.66,1.8-1.34,2.66-2a75.57,75.57,0,0,0,64.32,0c.87.71,1.76,1.39,2.66,2a68.68,68.68,0,0,1-10.87,5.19,77,77,0,0,0,6.89,11.1A105.25,105.25,0,0,0,126.6,80.22h0C129.24,52.84,122.09,29.11,107.7,8.07ZM42.45,65.69C36.18,65.69,31,60,31,53s5-12.74,11.43-12.74S54,46,53.89,53,48.84,65.69,42.45,65.69Zm42.24,0C78.41,65.69,73.25,60,73.25,53s5-12.74,11.44-12.74S96.23,46,96.12,53,91.08,65.69,84.69,65.69Z" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span>{{ __('Login/Apply with Discord') }}</span>
                    </a>
                </div>
            </div>
        @endguest

        <div class="flex justify-between pt-2 mt-3 space-x-2 border-t">
            {{-- <x-simple-theme-switch class="text-sm text-gray-300 underline">Change Theme</x-simple-theme-switch> --}}

            <a class="text-sm underline text-slate-400" href="https://communitycad.app">Community CAD
                {{ config('app.version') }}</a>

            <a class="text-sm underline text-slate-400" href="{{ route('ingame_login') }}">Ingame Login</a>
        </div>
    </main>

@endsection

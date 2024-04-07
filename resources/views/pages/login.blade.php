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
                <form action="{{ route('ingame_login.login') }}" class="space-y-2" method="POST">
                    @csrf
                    <div>
                        <label for="">Discord Email Address</label>
                        <input class="text-input" name="email" type="email" value="{{ old('email') }}">

                        <x-input-error :messages="$errors->updatePassword->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <label for="">Password</label>
                        <input class="text-input" name="password" type="password" value="{{ old('password') }}">
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <button class="new-button-md">Login</button>
                </form>
            </div>
        @endguest

        <div class="flex justify-between pt-2 mt-3 space-x-2 border-t">
            {{-- <x-simple-theme-switch class="text-sm text-gray-300 underline">Change Theme</x-simple-theme-switch> --}}

            <a class="text-sm underline text-slate-400" href="https://communitycad.app">Community CAD
                {{ config('app.version') }}</a>
        </div>
    </main>

@endsection

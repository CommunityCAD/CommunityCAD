<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('cad.community_name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @livewireStyles
</head>

<body class="bg-slate-200 dark:bg-[#01161e]">
    <main class="max-w-md w-full mx-auto bg-slate-600 text-white mt-16 rounded-xl p-4">
        @auth
            <div class="space-y-3">
                <p class="text-2xl flex">Welcome back, @if (auth()->user()->avatar)
                        <img class="object-cover w-8 h-8 mr-2 rounded-full ml-2" src="{{ auth()->user()->avatar }}"
                            alt="{{ auth()->user()->discord_name }}#{{ auth()->user()->discriminator }}" />
                    @endif {{ auth()->user()->discord_name }}!</p>
                <p class="text-lg">What would you like to do?</p>

                @if (auth()->user()->account_status === 1 || auth()->user()->account_status === 2)
                    <div class="flex">
                        <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md bg-gray-500 hover:bg-gray-800 hover:text-gray-200"
                            href="{{ route('account.show', auth()->user()->id) }}">
                            <span clas="text-green-500">
                                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span>View Profile</span>
                        </a>
                    </div>
                @endif

                @if (auth()->user()->account_status === 3)
                    <div class="flex">
                        <a class="inline-flex items-center px-4 py-2 transition-colors duration-150 rounded-md dark:bg-gray-500 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            href="{{ route('portal.dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 mr-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                            </svg>
                            <span>Go To CAD Portal</span>
                        </a>
                    </div>
                @endif
            </div>
        @endauth

        @guest
            <div class="space-y-2">
                <p class="text-2xl flex">Welcome to {{ config('cad.community_name') }}!</p>
                <p class="">{{ config('cad.community_intro') }}</p>

                <div class="flex w-full">
                    <a class="inline-flex items-center mx-auto px-4 py-2 transition-colors duration-150 rounded-md dark:bg-gray-500 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="{{ route('auth.discord') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                        </svg>
                        <span>Login/Apply With Discord</span>
                    </a>
                </div>
            </div>
        @endguest

        <div class="border-t mt-3 flex space-x-2 justify-between">
            <x-simple-theme-switch></x-simple-theme-switch>

            <a class="text-sm text-gray-400 underline" href="https://cad.gages.space">Community CAD
                {{ config('cad.version') }}</a>
        </div>
    </main>

    @if (session('alerts'))
        <div class="">
            <div class="absolute right-0 z-50 top-9">
                <x-alert />
            </div>
        </div>
    @endif

    @livewireScripts

</body>

</html>

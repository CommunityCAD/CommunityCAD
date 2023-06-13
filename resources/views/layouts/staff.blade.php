<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ get_setting('community_name') }} | Staff</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    @livewireStyles
</head>

<body class="bg-[#101825] text-white" x-data="{ sideMenu: false }">
    <div class="flex h-screen" :class="{ 'overflow-hidden': sideMenu }">
        @include('inc.staff.sidebar')
        <div class="flex flex-col flex-1">
            @include('inc.portal.navbar')
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 py-3">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

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

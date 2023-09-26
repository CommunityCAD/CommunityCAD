<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ get_setting('community_name') }} | Admin</title>
    <link href="/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
    <link href="/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="/site.webmanifest" rel="manifest">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    @livewireStyles
</head>

<body class="bg-[#101825] text-white" x-data="{ sideMenu: false }">
    <div :class="{ 'overflow-hidden': sideMenu }" class="flex h-screen">
        @include('inc.admin.sidebar')
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

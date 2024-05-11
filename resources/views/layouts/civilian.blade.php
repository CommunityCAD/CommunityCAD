<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ get_setting('community_name') }} | Civilian</title>
    <link href="{{ get_setting('community_logo', 'https://communitycad.app/images/default_images/communitycad.png') }}"
        rel="icon" type="image/x-icon">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    @livewireStyles
</head>

<body class="bg-[#101825] text-white" x-data="{ sideMenu: false }">
    <div :class="{ 'overflow-hidden': sideMenu }" class="flex h-screen">
        @include('inc.civilian.sidebar')
        <div class="flex flex-col flex-1">
            @include('inc.civilian.navbar')
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

    <script>
        function openExternalWindow(url) {
            return window.open(
                url,
                "_blank",
                "height=800,width=900,scrollbars=no,status=yes",
                true
            );
        }
    </script>
</body>

</html>

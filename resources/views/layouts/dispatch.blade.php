<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ get_setting('community_name') }} | Dispatch</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link href="{{ get_setting('community_logo', 'https://communitycad.app/images/default_images/communitycad.png') }}"
        rel="icon" type="image/x-icon">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark'
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light'
        }
    </script>

    @livewireStyles
</head>

<body class="font-mono antialiased bg-black" onload="startTime()">

    <div class="">
        @include('inc.dispatch.navbar')
        <div class="p-4">
            @yield('content')
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
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('running_clock').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }


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

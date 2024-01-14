<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ get_setting('community_name') }} | CAD</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link href="/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
    <link href="/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="/site.webmanifest" rel="manifest">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'digital-clock-font';
            src: url('{{ asset('fonts/DIGITALDREAM.ttf') }}');
        }

        #running_clock_date,
        #running_clock_time {
            font-family: "digital-clock-font" !important;
        }
    </style>

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

<body class="font-mono antialiased bg-black uppercase" onload="startTime()">

    <div class="">
        @include('inc.cad.navbar')
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
    <div class="relative bg-red-700">
        <div class="fixed bottom-0 left-0 z-50 w-full">
            <div class="bg-slate-500 z-50 w-full">
                <p class="flex items-center space-x-4">
                    <span class=" ml-4">
                        @if (auth()->user()->active_unit->status == 'OFFDTY')
                            <svg class=" w-5 h-5 rounded-full bg-red-700">
                                <circle cx="50" cy="50" fill="red" r="40" stroke-width="3"
                                    stroke="black" />
                            </svg>
                        @else
                            <svg class=" w-5 h-5 rounded-full bg-green-700">
                                <circle cx="50" cy="50" fill="red" r="40" stroke-width="3"
                                    stroke="black" />
                            </svg>
                        @endif
                    </span>
                    <span class="">Status:
                        {{ auth()->user()->active_unit->status }}
                        {{ auth()->user()->active_unit->updated_at->format('H:i:s') }}</span>
                    <span class="">Current Call(s):
                        @forelse (auth()->user()->active_unit->nice_calls as $call)
                            {{ str_pad($call, 5, 0, STR_PAD_LEFT) }},
                        @empty
                            None
                        @endforelse
                    </span>
                    <span class="">Messages: 0</span>
                    <span class="">No Alerts</span>
                </p>
            </div>
        </div>
    </div>

    @livewireScripts

    <script>
        function startTime() {
            function convertTZ(date, tzString) {
                return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {
                    timeZone: tzString
                }));
            }

            const today = convertTZ(new Date(), "{{ config('app.timezone') }}");
            let d = today.getDate();
            let mo = today.getMonth();
            let y = today.getFullYear();

            d = checkTime(d);
            mo = checkTime(mo + 1);

            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('running_clock_date').innerHTML = mo + "/" + d + "/" + y;
            document.getElementById('running_clock_time').innerHTML = h + ":" + m + ":" + s;
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

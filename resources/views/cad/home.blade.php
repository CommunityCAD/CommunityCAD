@extends('layouts.cad')

@section('content')
    <div class="container p-4 mx-auto bg-[#124559] text-white cursor-default rounded-2xl mt-5">
        <header>
            <div class="flex justify-between">
                <h1 class="text-2xl font-semibold">Welcome Officer
                    {{ auth()->user()->officer_name_check }}</h1>
                <p class="flex">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke-width="1.5" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="mx-3">Connected to live_database_prod</span>
                </p>
            </div>
            <p><span class="mr-3">{{ date('m/d/Y') }}</span><span id="running_clock"></span></p>
        </header>

        <main class="my-5"></main>

        <main class="my-5">
            <div class="flex p-4">
                <div class="w-1/2">
                    <p class="text-lg font-semibold">Message Center</p>
                    <ul class="ml-8 list-disc">
                        <li>Alerts: <a class="text-sm underline" href="#">0 new</a></li>
                        <li>Messages: <a class="text-sm underline" href="#">0 new</a></li>
                        <li>Approvals: <a class="text-sm underline" href="#">0 new</a></li>
                        <li>State Returns: <a class="text-sm underline" href="#">0 new</a></li>
                    </ul>

                    <p class="mt-3 text-lg font-semibold">System</p>
                    <ul class="ml-8 list-disc">
                        <li>Username: <span
                                class="text-sm">{{ str_replace(' ', '_', strtolower(auth()->user()->officer_name_check)) }}</span>
                        </li>
                        <li>Server: <span class="text-sm">live_database_prod</span></li>
                        <li>Version: <span class="text-sm">2023.3.29.1856</span></li>
                    </ul>
                </div>
                <div class="w-1/2">
                    <p class="text-lg font-semibold">CAD</p>
                    <ul class="ml-8 list-disc">
                        <li>Calls: <a class="text-sm underline" href="{{ route('cad.cad') }}">{{ $call_count }}
                                active</a>
                        </li>
                        <li>Unit: <a class="text-sm underline" href="#">{{ $active_unit->badge_number }} -
                                {{ $active_unit->status }}</a></li>
                        <li>Zone: <a class="text-sm underline" href="#">Sandy Shores AOP</a></li>
                        <li>My Active Call:
                            @forelse ($active_unit->nice_calls as $call)
                                <a class="text-sm underline"
                                    href="{{ route('cad.call.show', $call) }}">{{ str_pad($call, 5, 0, STR_PAD_LEFT) }},</a>
                            @empty
                                None
                            @endforelse
                        </li>
                    </ul>

                    <p class="mt-3 text-lg font-semibold">Reports</p>
                    <ul class="ml-8 list-disc">
                        <li>Drafts: <a class="text-sm underline" href="#">0 draft</a></li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
@endsection

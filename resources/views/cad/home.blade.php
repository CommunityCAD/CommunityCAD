@extends('layouts.cad')

@section('content')
    <div>
        @include('inc.cad.mdt-nav')
    </div>

    <div class="container p-4 mx-auto bg-[#2e3547] text-white cursor-default rounded-2xl mt-5">
        <header>
            <div class="flex justify-between">
                <h1 class="text-2xl font-semibold">Welcome
                    {{ auth()->user()->active_unit->officer_name }}
                </h1>
            </div>
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
                        <li class="">Username: <span
                                class="text-sm !lowercase">{{ str_replace(' ', '_', strtolower(auth()->user()->active_unit->officer_name)) }}</span>
                        </li>
                        <li>Server: <span class="text-sm">live_database_prod</span></li>
                        <li>Version: <span class="text-sm">2023.3.29.1856</span></li>
                    </ul>
                </div>
                <div class="w-1/2">
                    <p class="text-lg font-semibold">CAD</p>
                    <ul class="ml-8 list-disc">
                        <li>Calls: <a class="text-sm underline" href="#">{{ $call_count }}
                                active</a>
                        </li>
                        <li>Unit: <a class="text-sm underline"
                                href="#">{{ auth()->user()->active_unit->user_department->badge_number }} -
                                {{ auth()->user()->active_unit->status }}</a></li>
                        <li>Zone: <a class="text-sm underline" href="#">Sandy Shores AOP</a></li>
                        <li>My Active Call:
                            {{-- @forelse ($active_unit->nice_calls as $call)
                                <a class="text-sm underline"
                                    href="{{ route('cad.call.show', $call) }}">{{ str_pad($call, 5, 0, STR_PAD_LEFT) }},</a>
                            @empty
                                None
                            @endforelse --}}
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

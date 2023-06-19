@extends('layouts.cad')

@section('content')
    <div class="container p-4 mx-auto bg-[#124559] text-white cursor-default rounded-2xl mt-5">
        <header>
            <div class="flex justify-between">
                <h1 class="text-2xl font-semibold">Welcome Officer
                    {{ auth()->user()->officer_name ? auth()->user()->officer_name : auth()->user()->discord_name }}</h1>
                <p class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-green-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z" />
                    </svg>
                    <span class="mx-3">Connected to live_database_prod</span>
                </p>
            </div>
            <p><span class="mr-3">{{ date('m/d/Y') }}</span><span id="running_clock"></span></p>
        </header>

        <main class="my-5">
            This will be an announcement or bolo page
            <br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi hic, harum consequuntur nemo impedit officia,
            ex sed, quibusdam quaerat dolorem aut. Nihil facere in ut quasi eius doloremque incidunt aliquid!
            Ea ipsa quaerat excepturi expedita non ratione delectus sit eum rem architecto accusantium eos dolorem maxime
            vel corporis ducimus incidunt deleniti magnam, dolores dignissimos, doloremque voluptatum libero. Neque, in
            aliquam!
            Enim facere cum porro laboriosam. Adipisci enim natus nisi ea placeat magnam asperiores dolores! Saepe nihil
            quod amet accusamus ullam, quam temporibus numquam unde nisi? Ex explicabo qui doloremque in?
            Sed in quaerat illum qui facilis fugit autem eius totam, veniam harum, possimus eligendi id praesentium
            perspiciatis. Consequatur fuga, nihil corporis, mollitia repudiandae voluptatum fugiat eligendi aspernatur
            voluptates ab nisi.
            Ipsa a tempora eveniet. Iusto asperiores nisi illum ipsam laboriosam doloribus obcaecati cum magni veritatis
            aperiam, nesciunt saepe architecto odit aut magnam, temporibus et quibusdam accusantium ut quas. Soluta, magni!
        </main>

        <main class="my-5">
            <div class="flex p-4">
                <div class="w-1/2">
                    <p class="text-lg font-semibold">Message Center</p>
                    <ul class="ml-8 list-disc">
                        <li>Alerts: <a href="#" class="text-sm underline">0 new</a></li>
                        <li>Messages: <a href="#" class="text-sm underline">0 new</a></li>
                        <li>Approvals: <a href="#" class="text-sm underline">0 new</a></li>
                        <li>State Returns: <a href="#" class="text-sm underline">0 new</a></li>
                    </ul>

                    <p class="mt-3 text-lg font-semibold">System</p>
                    <ul class="ml-8 list-disc">
                        <li>Username: <span
                                class="text-sm">{{ strtolower(auth()->user()->officer_name ? auth()->user()->officer_name : auth()->user()->discord_name) }}</span>
                        </li>
                        <li>Server: <span class="text-sm">live_database_prod</span></li>
                        <li>Version: <span class="text-sm">2023.3.29.1856</span></li>
                    </ul>
                </div>
                <div class="w-1/2">
                    <p class="text-lg font-semibold">CAD</p>
                    <ul class="ml-8 list-disc">
                        <li>Calls: <a href="{{ route('cad.cad') }}" class="text-sm underline">{{ $call_count }} active</a>
                        </li>
                        <li>Unit: <a href="#" class="text-sm underline">{{ $active_unit->badge_number }} -
                                {{ $active_unit->status }}</a></li>
                        <li>Zone: <a href="#" class="text-sm underline">Sandy Shores AOP</a></li>
                        <li>My Active Call:
                            @foreach ($active_unit->nice_calls as $call)
                                <a href="{{ route('cad.call.show', $call) }}"
                                    class="text-sm underline">{{ str_pad($call, 5, 0, STR_PAD_LEFT) }},</a>
                            @endforeach
                        </li>
                    </ul>

                    <p class="mt-3 text-lg font-semibold">Reports</p>
                    <ul class="ml-8 list-disc">
                        <li>Drafts: <a href="#" class="text-sm underline">0 draft</a></li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
@endsection

@extends('layouts.cad_simple')

@section('content')
    <div class="text-white max-w-3xl mx-auto">
        @foreach ($titles as $title)
            <div x-data="{ 'is_title_open': false }">
                <h2 @click="is_title_open = !is_title_open" class="text-2xl cursor-pointer font-bold">PC -
                    {{ $title->number }}
                    {{ $title->name }}
                </h2>
                <div x-show="is_title_open">
                    @foreach ($title->penal_code_codes() as $code)
                        <div class="border-l-4 border-white" x-data="{ 'is_code_open': false }">

                            <p @click="is_code_open = !is_code_open"
                                class="ml-3 cursor-pointer font-semibold text-white text-lg">
                                PC -
                                {{ $title->number }}({{ $code->number }}).
                                {{ $code->name }}</p>

                            <div class="ml-6 border-l-4 border-slate-500 pl-3 pb-3 space-y-3 text-white"
                                x-show="is_code_open">
                                <div class="prose text-white">{!! Str::markdown($code->section) !!}</div>
                                <div class="">{{ $code->notes }}</div>
                                <p class="">Penal Code PC -
                                    {{ $title->number }}({{ $code->number }}) is a {{ $code->penal_code_class->name }}
                                    punishable by:</p>

                                <ol class="list-disc list-inside">
                                    <li class="">Fine: ${{ $code->fine }}</li>
                                    <li class="">Bail: ${{ $code->bail }}</li>
                                    <li class="">Jail (In-game): {{ $code->in_game_jail_time }}s</li>
                                    <li class="">Jail (CAD): {{ $code->cad_jail_time }}m</li>
                                </ol>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.courthouse')

@section('content')
    <div class="card">
        <h1 class="text-white text-center text-2xl font-bold">Non-Guilty Tickets</h1>
        <h1 class="text-white text-center text-2xl font-bold underline">San Andreas Court</h1>

        <div class="space-y-3">
            @foreach ($non_guilty as $ticket)
                <a href="{{ route('courthouse.case.show', $ticket->call_id) }}">
                    <div class="pill space-y-5">
                        <div class="md:flex md:justify-around text-center mt-5">
                            <p>Case No. {{ $ticket->call->id }}</p>
                            <p>Cause: Non-Guilty Plea</p>
                            <p></p>
                        </div>

                        <div class="flex justify-between mb-16">
                            <div>
                                <p class="underline">Plaintiff</p>
                                <p>State of San Andreas</p>
                            </div>

                            <div>
                                <p class="underline">Defendant</p>
                                <p>{{ $ticket->civilian->name }}</p>
                            </div>
                        </div>

                        <div>
                            <p class="underline">Charges</p>

                            @foreach ($ticket->charges as $charge)
                                @if (!$loop->last)
                                    {{ $charge->penal_code->name }},
                                @else
                                    {{ $charge->penal_code->name }}
                                @endif
                            @endforeach
                        </div>

                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.courthouse')

@section('content')
    <div class="card">
        <h1 class="text-white text-center text-2xl font-bold">Non-guilty Tickets</h1>

        <div class="space-y-3">
            @foreach ($non_guilty as $ticket)
                <div class="flex justify-between items-center p-2 space-x-2 pill">
                    <div>
                        <p class="">Non-Guilty Plea | {{ $ticket->id }} |
                            {{ $ticket->type_name }} | Submitted: {{ $ticket->updated_at->format('m/d/Y') }} | Defendent:
                            {{ $ticket->civilian?->name }} | Officer: {{ $ticket->officer?->name }}
                        </p>

                        <p>
                            <a class="text-blue-500 underline hover:text-blue-400 flex items-center" href="#"
                                onclick="openExternalWindow('{{ route('courthouse.ticket.show', $ticket->id) }}')">Ticket
                                {{ $ticket->id }} <svg class="ml-1 w-4 h-4" fill="none" stroke-width="1.5"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </a>
                        </p>

                    </div>

                    <div>
                        <form action="{{ route('courthouse.ticket.update', $ticket->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            {{--
                                1: Civilian Plead guilty
                                2: Civilian plead Non-guilty
                                3: Court Found Innocent
                                4: Court Found Guilty
                            --}}

                            <input name="plea_type" type="hidden" value="3">
                            <button class="new-button-sm" href="#">Found Not Guilty</button>
                        </form>

                        <form action="{{ route('courthouse.ticket.update', $ticket->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <input name="plea_type" type="hidden" value="4">
                            <button class="delete-button-sm" href="#">Found Guilty</button>
                        </form>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection

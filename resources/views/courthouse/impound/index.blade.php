@extends('layouts.courthouse')

@section('content')
    <div class="card">
        <h1 class="text-white text-center text-2xl font-bold">Active Impound Lot</h1>

        <div class="space-y-3">
            @foreach ($vehicles as $vehicle)
                <div class="flex justify-between items-center p-2 space-x-2 pill">
                    <div>

                        <p class="">{{ $vehicle->plate }} | {{ $vehicle->model }} |
                            {{ $vehicle->status_name }} | Expires: {{ $vehicle->registration_expire->format('m/d/Y') }} |
                            RO:
                            {{ $vehicle->civilian->name }}
                        </p>

                        <p>Vehicle was suspended due to this ticket:
                            @if ($vehicle->ticket)
                                <a class="text-blue-500 underline hover:text-blue-400 flex items-center" href="#"
                                    onclick="openExternalWindow('{{ route('courthouse.ticket.show', $vehicle->ticket->id) }}')">Ticket
                                    {{ $vehicle->ticket->id }} <svg class="ml-1 w-4 h-4" fill="none" stroke-width="1.5"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            @else
                                <p>Not linked to a ticket.</p>
                            @endif
                        </p>
                    </div>

                    <div>
                        <form action="{{ route('courthouse.impound.update', $vehicle->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <input name="vehicle_status" type="hidden" value="1">
                            <button class="new-button-sm" href="#">Release Vehicle</button>
                        </form>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection

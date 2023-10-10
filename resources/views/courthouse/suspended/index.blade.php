@extends('layouts.courthouse')

@section('content')
    <div class="card">
        <h1 class="text-white text-center text-2xl font-bold">Suspended Licenses</h1>

        <div class="space-y-3">
            @foreach ($licenses as $license)
                <div class="flex justify-between items-center p-2 space-x-2 pill">
                    <div>
                        <p class="">{{ $license->license_type->name }} | {{ $license->id }} |
                            {{ $license->status_name }} | Expires: {{ $license->expires_on->format('m/d/Y') }} | RO:
                            {{ $license->civilian->name }}
                        </p>

                        <p>License was suspended due to this ticket: <a
                                class="text-blue-500 underline hover:text-blue-400 flex items-center" href="#"
                                onclick="openExternalWindow('{{ route('cad.ticket.show', $license->ticket->id) }}')">Ticket
                                {{ $license->ticket->id }} <svg class="ml-1 w-4 h-4" fill="none" stroke-width="1.5"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </p>
                    </div>

                    <div>
                        <form action="{{ route('courthouse.suspended.update', $license->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <input name="license_status" type="hidden" value="1">
                            <button class="new-button-sm" href="#">Release License</button>
                        </form>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection

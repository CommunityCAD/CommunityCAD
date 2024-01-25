@extends('layouts.portal')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">User LOA Requests</h1>
        <p class="text-sm text-white">You can submit a new request from the Settings Page.</p>
    </header>

    <div class="card">
        <h2 class="text-lg font-semibold">Request LOA</h2>
        <hr>

        <div class="space-y-3">

            <p>LOA Start Date: {{ $loa->start_date->format('m/d/Y') }}</p>
            <p>LOA End Date: {{ $loa->end_date->format('m/d/Y') }}</p>
            <p>Reason: <br> {{ $loa->reason }}</p>

            <form action="{{ route('portal.user.loa.destroy', $loa->id) }}" method="post">
                @method('delete')
                @csrf
                <button class="delete-button-md">Delete Request</button>
            </form>
        </div>
        <hr class="my-5">
        <div class="space-y-3">
            @forelse ($loa_history as $history)
                <div class="pill">
                    <p class="text-gray-400">{{ $history->user->preferred_name }} @
                        {{ $history->created_at->format('m/d/Y H:i') }}
                    </p>
                    <p>{{ $history->description }}</p>
                </div>
            @empty
                <p>No History</p>
            @endforelse

        </div>
    </div>
@endsection

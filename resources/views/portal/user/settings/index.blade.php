@extends('layouts.portal')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">User Settings</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="card">
        <h2 class="text-lg font-semibold">Manage Names</h2>
        <hr>

        <form action="{{ route('portal.user.settings.update') }}" class="mt-6 space-y-4" method="post">
            @method('PUT')
            @csrf

            <div>
                <label for="">Teamspeak Name</label>
                <span class="text-gray-500 text-sm block">Name in Teamspeak Server.</span>
                <input class="text-input" name="ts_name" type="text"
                    value="{{ old('ts_name', auth()->user()->ts_name) }}">
            </div>

            <div>
                <label for="">Display Name</label>
                <span class="text-gray-500 text-sm block">Not used. Discord information is used for everything. This is only
                    for backwards compatability.</span>
                <input class="text-input" name="display_name" type="text"
                    value="{{ old('display_name', auth()->user()->display_name) }}">
            </div>

            <div>
                <label for="">Officer Name</label>
                <span class="text-gray-500 text-sm block">Name to be displayed in the CAD/MDT and on paperwork. Omitt the
                    "Officer" before your name. "Officer" will be added by default.</span>
                <input class="text-input" name="officer_name" type="text"
                    value="{{ old('officer_name', auth()->user()->officer_name) }}">
            </div>

            <button class="new-button-md">Save</button>
        </form>
    </div>

    <div class="card">
        <h2 class="text-lg font-semibold">Update Linked Accounts</h2>
        <hr>

        <p>Coming Soon!™ For now you can log out and log back in to refresh Discord Information.</p>

        {{-- <a class="edit-button-md mt-6" href="#">Update Discord Information</a> --}}
    </div>

    <div class="card">
        <h2 class="text-lg font-semibold">Request LOA</h2>
        <hr>

        <form action="{{ route('portal.user.loa.store') }}" class="mt-6 space-y-4" method="post">
            @csrf

            <div>
                <label for="">LOA Start Date</label>
                <span class="text-gray-500 text-sm block">Date to start your LOA.</span>
                <input class="text-input" name="start_date" required type="date" value="{{ old('start_date') }}">
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>

            <div>
                <label for="">LOA End Date</label>
                <span class="text-gray-500 text-sm block">Estimated date to end your LOA.</span>
                <input class="text-input" name="end_date" required type="date" value="{{ old('end_date') }}">
                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
            </div>

            <div>
                <label for="">Reason</label>
                <span class="text-gray-500 text-sm block">Why do you need this LOA?</span>
                <textarea class="textarea-input" name="reason" required type="text" value="">{{ old('reason') }}</textarea>
                <x-input-error :messages="$errors->get('reason')" class="mt-2" />

            </div>

            <button class="new-button-md">Submit Request</button>
        </form>
    </div>

    <div class="card">
        <h2 class="text-lg font-semibold">LOA Requests</h2>
        <hr>
        <div class="space-y-3">
            @forelse ($loa_requests as $request)
                <a href="{{ route('portal.user.loa.show', $request->id) }}">
                    <div class="pill p-3">
                        Start Date: {{ $request->start_date->format('m/d/Y') }} | End Date:
                        {{ $request->end_date->format('m/d/Y') }} | Status:
                        {{ $request->status }}
                    </div>
                </a>
            @empty
                <p>You have no LOA requests.</p>
            @endforelse

        </div>

    </div>
@endsection

@extends('layouts.civilian')

@section('content')
    <div class="container mx-auto max-w-4xl mt-2 bg-[#124559] px-3 py-2 rounded-lg w-full">
        <div class="flex justify-between border-b-2 py-2">
            <h2 class="text-2xl text-white">{{ $civilian->name }} (SSN: {{ $civilian->s_n_n }})</h2>
            <div class="flex">
                <a href="#" class="px-2 py-1 bg-slate-500 text-white rounded-lg hover:bg-slate-400 inline-block">Edit
                    Civilian</a>
                <a href="#" class="px-2 py-1 bg-red-700 text-white rounded-lg hover:bg-red-600 inline-block ml-2">Mark
                    Death</a>
            </div>
        </div>
        <div class="-mx-4 flex flex-wrap pt-4">
            <div class="w-full px-4 md:w-1/2">
                @if (!is_null($civilian->picture))
                    <img class="block h-64 rounded-md" src="{{ $civilian->picture }}">
                @else
                    <img class="block h-64 rounded-md"
                        src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg">
                @endif
            </div>

            <div class="w-full px-4 md:w-1/2 text-white">
                <p><span class="text-gray-300">Full Name:</span> {{ $civilian->name }}</p>
                <p><span class="text-gray-300">Social Security Number:</span> {{ $civilian->s_n_n }}</p>
                <p><span class="text-gray-300">Date of Birth:</span> {{ $civilian->date_of_birth->format('m/d/Y') }}
                    ({{ $civilian->age }})
                </p>
                <p><span class="text-gray-300">Gender:</span> {{ $civilian->gender }}</p>
                <p><span class="text-gray-300">Race:</span> {{ $civilian->race }}</p>
                <p><span class="text-gray-300">Weight:</span> {{ $civilian->weight }}lb</p>
                <p><span class="text-gray-300">Height:</span> {{ $civilian->height }}</p>
                <p><span class="text-gray-300">Address:</span> {{ $civilian->address }}</p>
                <p><span class="text-gray-300">Occupation:</span> {{ $civilian->occupation }}</p>

            </div>
        </div>
    </div>

    <div class="container mx-auto max-w-4xl mt-2  bg-[#124559] px-3 py-2 rounded-lg w-full">
        <div class="flex justify-between border-b-2 py-2">
            <h2 class="text-2xl text-white">Licenses</h2>
            <div class="flex">
                <a href="{{ route('civilian.license.create', $civilian->id) }}"
                    class="px-2 py-1 bg-slate-500 text-white rounded-lg hover:bg-slate-400 inline-block">New
                    License</a>
            </div>
        </div>
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4">
                <div class="text-white">
                    @forelse($civilian->licenses as $license)
                        <?php
                        $status = $license->status_name;
                        $status_color = 'text-green-400';
                        $reregister_button = false;
                        $reregister = false;
                        $revoked = false;
                        
                        if ($license->expires_on < date('Y-m-d')) {
                            $status = 'Expired';
                            $status_color = 'text-yellow-400';
                            $reregister = true;
                            $reregister_button = true;
                        }
                        
                        if ($license->status_name == 'Revoked' || $license->status_name == 'Suspended') {
                            $status = $license->status_name;
                            $status_color = 'text-red-400';
                            $reregister_button = false;
                            $revoked = true;
                        }
                        ?>
                        <div class="flex justify-between items-center">
                            <p class="{{ $status_color }}">{{ $license->license_type->name }} | {{ $license->id }} |
                                {{ $status }} | Expires: {{ $license->expires_on->format('m/d/Y') }}
                            </p>
                            <div class="">
                                @if ($reregister_button)
                                    <a href="{{ route('civilian.license.renew', ['license' => $license->id, 'civilian' => $civilian->id]) }}"
                                        class="px-2 py-1 bg-green-500 text-white rounded-lg hover:bg-green-400 inline-block">Renew</a>
                                @endif

                                @if (!$revoked && !$reregister)
                                    <form class="mt-1"
                                        action="{{ route('civilian.license.destroy', ['civilian' => $civilian->id, 'license' => $license->id]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you wish to delete this license? This can\'t be undone!');">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-2 py-1 bg-red-500 text-white rounded-lg hover:bg-red-400 inline-block">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="">No Licenses</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto max-w-4xl mt-2 bg-[#124559] px-3 py-2 rounded-lg w-full">
        <h2 class="text-2xl text-white my-2 border-b-2">Medical</h2>
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4">
                @if (!is_null($civilian->picture))
                    <img class="block h-full" src="{{ $civilian->picture }}">
                @else
                    <img class="block h-full"
                        src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg">
                @endif
            </div>
        </div>
    </div>

    <div class="container mx-auto max-w-4xl mt-2 bg-[#124559] px-3 py-2 rounded-lg w-full">
        <h2 class="text-2xl text-white my-2 border-b-2">Vehicles</h2>
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4">
                @if (!is_null($civilian->picture))
                    <img class="block h-full" src="{{ $civilian->picture }}">
                @else
                    <img class="block h-full"
                        src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg">
                @endif
            </div>
        </div>
    </div>

    <div class="container mx-auto max-w-4xl mt-2 bg-[#124559] px-3 py-2 rounded-lg w-full">
        <h2 class="text-2xl text-white my-2 border-b-2">Weapons</h2>
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4">
                @if (!is_null($civilian->picture))
                    <img class="block h-full" src="{{ $civilian->picture }}">
                @else
                    <img class="block h-full"
                        src="https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg">
                @endif
            </div>
        </div>
    </div>
@endsection

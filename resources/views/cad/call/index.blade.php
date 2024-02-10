@extends('layouts.cad')

@section('content')
    <div class="sticky top-0 z-50">
        @include('inc.cad.mdt-nav')
    </div>

    <div class="relative max-w-7xl mx-auto">
        <h1 class="text-white text-xl">Recent Calls <span class="text-base">(Last 2 days)</span></h1>
        <div class="grid grid-cols-3 gap-6">
            @foreach ($recent_calls as $call)
                <div class="bg-gray-200 rounded-lg p-2 text-black text-sm">
                    <a href="{{ route('cad.call.show', $call->id) }}">
                        <div class="flex justify-between items-center border-b-2 border-blue-600">
                            <p class="text-lg">{{ $call->id }}</p>
                            <p class="text-sm">{{ $call->status }} - {{ $call->status_info['name'] }}</p>
                        </div>
                        <div class="flex mt-1">
                            <div class="h-20 w-20">
                                <svg class="w-20 h-20 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p><span class="text-blue-500 text-xs">Type</span>
                                    {{ $call->type_name }}</p>
                                <p><span class="text-blue-500 text-xs">Created At</span>
                                    {{ $call->created_at->format('m/d/y H:i:s') }}</p>
                                <p><span class="text-blue-500 text-xs">Nature</span>
                                    {{ $call->nature }} - {{ $call->nature_info['name'] }}</p>
                            </div>
                        </div>
                        <div class="border-t-2 border-black flex justify-between">

                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <hr class="mt-10 mb-5">
        <h1 class="text-white text-xl">All Calls</h1>
        <div class="grid grid-cols-3 gap-6">
            @foreach ($all_calls as $call)
                <div class="bg-gray-200 rounded-lg p-2 text-black text-sm">
                    <a href="{{ route('cad.call.show', $call->id) }}">
                        <div class="flex justify-between items-center border-b-2 border-blue-600">
                            <p class="text-lg">{{ $call->id }}</p>
                            <p class="text-sm">{{ $call->status }} - {{ $call->status_info['name'] }}</p>
                        </div>
                        <div class="flex mt-1">
                            <div class="h-20 w-20">
                                <svg class="w-20 h-20 mx-auto" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p><span class="text-blue-500 text-xs">Type</span>
                                    {{ $call->type_name }}</p>
                                <p><span class="text-blue-500 text-xs">Created At</span>
                                    {{ $call->created_at->format('m/d/y H:i:s') }}</p>
                                <p><span class="text-blue-500 text-xs">Nature</span>
                                    {{ $call->nature }} - {{ $call->nature_info['name'] }}</p>
                            </div>
                        </div>
                        <div class="border-t-2 border-black flex justify-between">

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

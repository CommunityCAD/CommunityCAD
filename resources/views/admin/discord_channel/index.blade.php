@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Discord Channels</h1>
        <p class="text-sm font-bold text-red-600"></p>
    </header>
    <div class="card">
        @foreach ($channels as $channel)
            <div class="pill">
                <a class="" href="{{ route('admin.discord_channel.edit', $channel->id) }}">
                    <div class="flex items-center justify-between ml-3 text-white">
                        <div class="block truncate text-ellipsis overflow-hidden">
                            <p class="font-bold">{{ $channel->name }}</p>
                            <p class="p-3 hidden lg:block text-sm">
                                {{ $channel->channel_id }}
                            </p>
                        </div>
                        <span class="ml-4">
                            <button class="edit-button-sm">
                                <x-edit-button></x-edit-button>
                            </button>
                        </span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

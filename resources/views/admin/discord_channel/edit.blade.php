@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Edit Channel</h1>
        <p class="text-sm font-bold text-white"></p>
    </header>
    <div class="card">

        <form action="{{ route('admin.discord_channel.update', $discord_channel->id) }}" id="mdeditor" method="POST">
            @csrf
            @method('PUT')

            <p class="block mt-3 text-black-500">{{ $discord_channel->name }}</p>

            <div>
                <label class="block mt-3 text-black-500" for="channel_id">Channel ID</label>
                <input autofocus class="text-input" name="channel_id" type="number"
                    value="{{ $discord_channel->channel_id }}" />
                <x-input-error :messages="$errors->get('channel_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="w-1/3 mr-5 edit-button-md">Save</button>
                <a class="w-1/3 delete-button-md" href="{{ route('admin.discord_channel.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection

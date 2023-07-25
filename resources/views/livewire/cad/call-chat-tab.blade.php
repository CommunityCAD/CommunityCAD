<div wire:poll.10s>
    <div class="space-y-1">
        @forelse ($call_chat as $chat)
            <div class="p-2 @if ($loop->last) border border-red-400 @endif">
                <p>{{ $chat->created_at->format('H:i:s m/d/Y') }} - {{ $chat->from }}</p>
                <p>{{ $chat->text }}</p>
            </div>
        @empty
            <p class="p-2">No Call Log</p>
        @endforelse
    </div>

    <div class="mt-2 border-t-2">
        <form action="{{ route('cad.call_log.store', $call_id) }}" method="POST">
            @csrf
            <input autofocus class="text-input" name="text" required type="text">
            <button class="secondary-button-md bg-gray-600 mt-4 hover:bg-gray-500 text-white"
                type="submit">Send</button>
        </form>
    </div>
</div>

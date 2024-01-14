<div wire:poll.10s>
    <div class="h-52 overflow-y-auto overflow-x-hidden">
        <div class="space-y-1">
            @forelse ($call_chat as $chat)
                @php
                    $text_color = 'text-gray-400';
                    if ($chat->from != 'SYSTEM') {
                        $text_color = 'text-white';
                    }
                @endphp
                <div class="@if ($loop->first) border border-red-400 @endif">
                    <p class="border-b-2 border-gray-500 {{ $text_color }}">
                        <span class="text-sm font-light">{{ $chat->created_at->format('H:i:s m/d/Y') }} -
                            {{ $chat->from }}</span>

                        <br>{{ $chat->text }}
                    </p>
                </div>
            @empty
                <p class="p-2">No Call Log</p>
            @endforelse
        </div>
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

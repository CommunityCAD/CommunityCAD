<div wire:poll.10s>
    <div class="pb-2 border-b-2 mb-3">
        <form action="{{ route('cad.call_log.store', $call->id) }}" class="" method="POST">
            @csrf
            <div class="flex items-center">
                <input autofocus class="text-input block uppercase" name="text" required type="text">
                <button class="secondary-button-md ml-2 block bg-gray-600 mt-4 hover:bg-gray-500 text-white"
                    type="submit">Send</button>
            </div>
        </form>
    </div>

    <div class="max-h-screen overflow-y-auto overflow-x-hidden">
        <div class="space-y-1">
            @forelse ($call_chat as $chat)
                @php
                    $text_color = 'text-gray-400';
                    if ($chat->from != 'SYSTEM') {
                        $text_color = 'text-white';
                    }
                @endphp
                <div class="@if ($loop->first) border border-red-400 p-1 @endif">
                    <p class="border-b-2 border-gray-500 {{ $text_color }}">
                    <p class="font-bold">{{ $chat->from }}</p>
                    <p class="text-sm -mt-1">{{ $chat->created_at->format('H:i:s m/d/Y') }}</p>
                    <p>{{ $chat->text }}</p>
                    </p>
                </div>
            @empty
                <p class="p-2">No Call Log</p>
            @endforelse
        </div>
    </div>

</div>

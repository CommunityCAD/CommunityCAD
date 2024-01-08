<div wire:poll.10s>
    <div class="h-52 overflow-y-auto overflow-x-hidden">
        @forelse ($call_logs as $call_log)
            <div class="@if ($loop->first) border border-red-400 @endif">
                <p class="border-b-2 border-gray-500">
                    <span class="text-sm font-light">{{ $call_log->created_at->format('H:i:s m/d/Y') }} -
                        {{ $call_log->from }}</span> | {{ $call_log->text }}
                </p>
            </div>
        @empty
            <p class="p-2">No Call Log</p>
        @endforelse
    </div>
</div>

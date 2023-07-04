<div wire:poll.10s>
    @forelse ($call_logs as $call_log)
        <div class="p-2 @if ($loop->last) border border-red-400 @endif">
            <p>{{ $call_log->created_at->format('H:i:s m/d/Y') }} - {{ $call_log->from }}</p>
            <p>{{ $call_log->text }}</p>
        </div>
    @empty
        <p class="p-2">No Call Log</p>
    @endforelse
</div>

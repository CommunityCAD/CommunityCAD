@foreach ($calls as $call)
    <tr class="text-green-500" wire:poll>
        <td class="p-1 border border-slate-400"><a href="#" class="hover:underline">{{ $call->id }}</a></td>
        <td class="p-1 border border-slate-400">{{ $call->nature }}</td>
        <td class="p-1 border border-slate-400">{{ $call->location }}</td>
        <td class="p-1 border border-slate-400">{{ $call->city }}</td>
        <td class="p-1 border border-slate-400">{{ $call->priority }}</td>
        <td class="p-1 border border-slate-400">{{ $call->status }}</td>
        <td class="p-1 border border-slate-400">{{ $call->time }}m</td>
        <td class="p-1 border border-slate-400">
            @foreach ($call->units['data'] as $unit)
                {{ $unit }},
            @endforeach
        </td>
    </tr>
@endforeach

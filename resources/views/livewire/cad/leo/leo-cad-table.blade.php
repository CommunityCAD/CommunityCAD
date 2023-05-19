<div wire:poll.5s>
    <table class="w-full uppercase border border-collapse table-auto border-slate-400">
        <tr class="text-lg font-bold">
            <th class="p-1 border border-slate-400">Call #</th>
            <th class="p-1 border border-slate-400">Nature</th>
            <th class="p-1 border border-slate-400">Location</th>
            <th class="p-1 border border-slate-400">City</th>
            <th class="p-1 border border-slate-400">Pri</th>
            <th class="p-1 border border-slate-400">Status</th>
            <th class="p-1 border border-slate-400">Time</th>
            <th class="p-1 border border-slate-400">Units</th>
        </tr>
        @foreach ($calls as $call)
            @php
                switch ($call->status) {
                    case 'OPEN':
                        $text_color = 'text-green-500';
                        break;
                
                    case 'HOLD':
                        $text_color = 'text-gray-500';
                        break;
                
                    case 'DISP':
                        $text_color = 'text-yellow-500';
                        break;
                
                    case 'INRUTE':
                        $text_color = 'text-yellow-500';
                        break;
                
                    case 'ARRV':
                        $text_color = 'text-orange-500';
                        break;
                
                    case 'CLO':
                        $text_color = 'text-red-500';
                        break;
                
                    default:
                        $text_color = 'text-red-500';
                        break;
                }
            @endphp
            <tr class="{{ $text_color }}">
                <td class="p-1 border border-slate-400"><a href="{{ route('cad.call.show', $call->id) }}"
                        class="hover:underline">{{ $call->id }}</a>
                </td>
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
    </table>
</div>

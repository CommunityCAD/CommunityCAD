<div>
    <table class="w-full border border-collapse table-auto border-slate-400">
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
            <tr class="text-green-500">
                <td class="p-1 border border-slate-400"><a href="#"
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

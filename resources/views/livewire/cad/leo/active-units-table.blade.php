<div>
    <table class="w-full border border-collapse table-auto border-slate-400">
        <tr>
            <th class="border border-slate-400">Unit #</th>
            <th class="border border-slate-400">Status</th>
            <th class="border border-slate-400">Time</th>
            <th class="border border-slate-400">Call #</th>
            <th class="border border-slate-400">Agency</th>
            <th class="border border-slate-400">Description</th>
            <th></th>
        </tr>
        @foreach ($active_units as $active_unit)
            @php
                switch ($active_unit->status) {
                    case 'OFFDTY':
                        $text_color = 'text-red-600';
                        break;
                
                    case 'BRK':
                        $text_color = 'text-red-600';
                        break;
                
                    case 'AVL':
                        $text_color = 'text-green-600';
                        break;
                
                    case 'ONSCN':
                        $text_color = 'text-yellow-600';
                        break;
                
                    case 'ENRUTE':
                        $text_color = 'text-yellow-600';
                        break;
                
                    default:
                        $text_color = 'text-white';
                        break;
                }
            @endphp

            <tr class="{{ $text_color }}">
                <td class="border border-slate-400">{{ $active_unit->badge_number }}</td>
                <td class="border border-slate-400">{{ $active_unit->status }}</td>
                <td class="border border-slate-400">{{ $active_unit->time }}m</td>
                <td class="border border-slate-400">{{ $active_unit->call_id }}</td>
                <td class="border border-slate-400">{{ $active_unit->agency }}</td>
                <td>{{ $active_unit->description }}</td>
                <td></td>
            </tr>
        @endforeach
    </table>
</div>

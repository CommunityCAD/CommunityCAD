<div>
    <h1>Search Call Log</h1>
    <input class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white" type="text" wire:model='search'>
    <div class="grid grid-cols-1 mt-5 sm:grid-cols-2">
        @forelse ($reports as $report)
            <div class="px-3 py-1 m-4 bg-gray-600 border-l-8 cursor-pointer rounded-2xl hover:bg-gray-500">
                <a class="flex" href="{{ route('cad.report.show', $report->id) }}">
                    <div class="ml-3 text-white">
                        <p>{{ $report->title }} | Call: {{ $report->call_id }} | {{ $report->user->officer_name_check }}
                            | Created:
                            {{ $report->created_at->format('m/d/Y H:m:i') }}
                        </p>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-white uppercase">No Reports Matching Search</p>
        @endforelse
    </div>
</div>

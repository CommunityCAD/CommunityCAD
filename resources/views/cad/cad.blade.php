@extends('layouts.cad')

@section('content')
    <div class="flex flex-col h-screen">
        <div class="flex items-center justify-around p-1 space-x-3 text-white rounded cursor-default">
            <p class="text-sm font-semibold">
                Officer {{ auth()->user()->officer_name ? auth()->user()->officer_name : auth()->user()->discord_name }}
            </p>
            <p class="text-lg"><span class="mr-3">{{ date('m/d/Y') }}</span><span id="running_clock"></span></p>
            <p class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z" />
                </svg>
                <span class="mx-3">Connected to live_database_prod</span>
            </p>
        </div>
        <div class="h-full p-4 mt-5 text-white rounded cursor-default">
            <main class="h-3/5">
                <div class="float-right mb-3">
                    <a href="{{ route('cad.call.create') }}" class="new-button-sm">New Call</a>
                </div>

                <livewire:cad.leo.leo-cad-table>

            </main>
            <main class="overflow-scroll h-2/5">
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
                    <tr>
                        <td class="border border-slate-400">1K-1</td>
                        <td class="border border-slate-400">AVAIL</td>
                        <td class="border border-slate-400">1.9m</td>
                        <td class="border border-slate-400"></td>
                        <td class="border border-slate-400">BCSO</td>
                        <td>incid#=228;status=Completed Call;disp=CLO</td>
                        <td></td>
                    </tr>
                </table>
            </main>
        </div>
    </div>
@endsection

@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg text-white">All Members</p>
        </div>

        @livewire('breadcrumbs', ['paths' => []])

    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">

            <div class="mb-3">
                @can('user_advanced_access')
                    <a class="px-2 py-1 bg-blue-500 rounded hover:bg-blue-600" href="{{ route('admin.users.advanced.index') }}">
                        View All Users
                    </a>
                @endcan
            </div>

            <table class="w-full border border-collapse table-auto border-spacing-2 border-slate-500">
                <thead>
                    <tr>
                        <th class="border border-spacing-2 border-slate-500">Discord</th>
                        <th class="border border-spacing-2 border-slate-500">Department</th>
                        <th class="border border-spacing-2 border-slate-500"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($users as $user)
                        <tr>
                            <td class="border border-slate-500">{{ $user->discord }}</td>
                            <td class="border border-slate-500">
                                User Main Department
                            </td>
                            <td class="py-3 border border-slate-500">
                                @can('user_view')
                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                        class="px-2 py-1 bg-blue-500 rounded hover:bg-blue-600">View</a>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

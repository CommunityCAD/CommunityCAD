@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b border-gray-700" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg dark:text-white">All Roles</p>
        </div>

        @livewire('breadcrumbs', ['paths' => []])

    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <div class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden shadow-md bg-[#124559] sm:max-w-4xl sm:rounded-lg text-white">

            <div class="mb-3">
                @can('role_create')
                    <a class="px-2 py-1 bg-green-500 rounded hover:bg-green-600" href="{{ route('admin.roles.create') }}">
                        Add Role
                    </a>
                @endcan
            </div>

            <table class="w-full border border-collapse table-auto border-spacing-2 border-slate-500">
                <thead>
                    <tr>
                        <th class="border border-spacing-2 border-slate-500">Title</th>
                        <th class="border border-spacing-2 border-slate-500">Permissions</th>
                        <th class="border border-spacing-2 border-slate-500"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($roles as $role)
                        <tr>
                            <td class="border border-slate-500">{{ $role->title }}</td>
                            <td class="flex flex-wrap p-3 text-xs border border-slate-500">
                                @foreach ($role->permissions as $permission)
                                    <p class="px-2 py-1 m-1 text-black rounded bg-slate-300">{{ $permission->title }}</p>
                                @endforeach
                            </td>
                            <td class="border border-slate-500">
                                @can('role_edit')
                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                        class="px-2 py-1 bg-blue-500 rounded hover:bg-blue-600">Edit</a>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection

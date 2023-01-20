@extends('layouts.portal')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <h2 class="text-2xl font-bold dark:text-gray-200">Roles</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">

            <div class="mb-3">
                @can('role_create')
                    <a class="bg-green-500 px-2 py-1 rounded hover:bg-green-600" href="{{ route('admin.roles.create') }}">
                        Add Role
                    </a>
                @endcan
            </div>

            <table class="table-auto w-full border-collapse border-spacing-2 border border-slate-500">
                <thead>
                    <tr>
                        <th class="border-spacing-2 border border-slate-500">Title</th>
                        <th class="border-spacing-2 border border-slate-500">Permissions</th>
                        <th class="border-spacing-2 border border-slate-500"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($roles as $role)
                        <tr>
                            <td class="border border-slate-500">{{ $role->title }}</td>
                            <td class="border border-slate-500 flex flex-wrap p-3 text-xs">
                                @foreach ($role->permissions as $permission)
                                    <p class="bg-slate-300 px-2 py-1 rounded text-black m-1">{{ $permission->title }}</p>
                                @endforeach
                            </td>
                            <td class="border border-slate-500">
                                @can('role_edit')
                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                        class="bg-blue-500 px-2 py-1 rounded hover:bg-blue-600">Edit</a>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection

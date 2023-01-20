@extends('layouts.portal')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <h2 class="text-2xl font-bold dark:text-gray-200">Permissions</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">

            <div class="mb-3 flex justify-between">
                <a class="bg-green-500 px-2 py-1 rounded hover:bg-green-600" href="{{ route('admin.roles.create') }}">
                    Add Role
                </a>
                <div class="">
                    <a class="bg-green-500 px-2 py-1 rounded hover:bg-green-600"
                        href="{{ route('admin.permissions.create') }}">
                        Add Permission
                    </a>
                </div>
            </div>

            <table class="table-auto w-full border-collapse border-spacing-2 border border-slate-500">
                <thead>
                    <tr>
                        <th class="border-spacing-2 border border-slate-500">Title</th>
                        <th class="border-spacing-2 border border-slate-500"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class="border border-spacing-2 border-slate-500">{{ $permission->title }}</td>
                            <td class="border border-spacing-2 border-slate-500 p-3">
                                <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                    class="bg-blue-500 px-2 py-1 rounded hover:bg-blue-600">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection

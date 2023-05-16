@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b border-gray-700" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg dark:text-white">All Roles</p>
        </div>

        @livewire('breadcrumbs', ['paths' => []])

    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <div class="main-wrapper">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-2xl underline">Roles</h2>
                <div class="">
                    @can('role_create')
                        <a href="{{ route('admin.roles.create') }}" class="new-button-sm">
                            <x-new-button></x-new-button>
                        </a>
                    @endcan
                </div>
            </div>
            @foreach ($roles as $role)
                <div class="px-3 py-1 m-4 bg-gray-600 border-l-4 cursor-pointer rounded-2xl hover:bg-gray-500">
                    <a href="{{ route('admin.roles.edit', $role->id) }}">
                        <div class="flex items-center justify-between ml-3 text-white">
                            <span class="w-1/12">{{ $role->title }}</span>
                            <span class="flex flex-wrap w-10/12 p-3 text-xs">
                                @foreach ($role->permissions as $permission)
                                    <p class="px-2 py-1 m-1 text-black rounded bg-slate-300">{{ $permission->title }}</p>
                                @endforeach
                            </span>
                            <span class="w-1/12">
                                <button class="edit-button-sm">
                                    <x-edit-button></x-edit-button>
                                </button>

                            </span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

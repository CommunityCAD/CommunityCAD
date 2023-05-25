@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Roles</h1>
        <p class="text-sm text-white">Add, edit and delete roles.</p>
    </header>
    <div class="admin-card">
        <div class="flex items-center justify-end mb-3">
            <div class="">
                @can('role_create')
                    <a href="{{ route('admin.roles.create') }}" class="new-button-sm">
                        <x-new-button></x-new-button>
                    </a>
                @endcan
            </div>
        </div>
        @foreach ($roles as $role)
            <div class="border-l-4 cursor-pointer admin-pill">
                <a href="{{ route('admin.roles.edit', $role->id) }}">
                    <div class="flex items-center justify-between ml-3 text-white">
                        <span class="w-1/12">{{ $role->title }}</span>
                        <span class="flex flex-wrap w-10/12 p-3 text-xs">
                            @foreach ($role->permissions as $permission)
                                @php
                                    switch ($permission->category) {
                                        case 'admin':
                                            $bg_color = 'bg-red-500';
                                            break;
                                    
                                        case 'staff':
                                            $bg_color = 'bg-yellow-500';
                                            break;
                                    
                                        default:
                                            $bg_color = 'bg-slate-300';
                                            break;
                                    }
                                @endphp
                                <p class="px-2 py-1 m-1 text-black rounded {{ $bg_color }}">{{ $permission->title }}</p>
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
@endsection

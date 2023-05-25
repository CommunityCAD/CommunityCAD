@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Departments</h1>
        <p class="text-sm text-white">Search for a department to edit or create a new one.</p>
    </header>

    <div class="admin-card">
        <div class="flex items-center justify-end mb-3">
            <div class="">
                @can('department_create')
                    <a href="{{ route('admin.department.create') }}" class="new-button-sm">
                        <x-new-button></x-new-button>
                    </a>
                @endcan
            </div>
        </div>
        @foreach ($departments as $department)
            <div class="border-l-4 cursor-pointer admin-pill">
                <a href="{{ route('admin.department.edit', $department->slug) }}">
                    <div class="flex items-center justify-between ml-3 text-white">
                        <div class="flex items-center">
                            <img src="{{ $department->logo }}" class="w-12 h-12 mr-4">
                            <span class="">{{ $department->name }}</span>
                        </div>
                        <span class="">
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

@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Report Types</h1>
        <p class="text-sm text-white">These are the types of reports your officers can fill out.</p>
    </header>

    <div class="admin-card">
        <div class="flex items-center justify-end mb-3">
            <div class="">
                @can('report_type_manage')
                    <a class="new-button-sm" href="{{ route('admin.report_type.create') }}">
                        <x-new-button></x-new-button>
                    </a>
                @endcan
            </div>
        </div>
        @foreach ($types as $type)
            <div class="border-l-4 admin-pill">
                @if (!$type->is_locked)
                    <a href="{{ route('admin.report_type.edit', $type->id) }}">
                @endif
                <div class="flex items-center justify-between ml-3 text-white">
                    <div class="">
                        <p class="">{{ $type->title }}</p>
                    </div>
                    @if ($type->is_locked)
                        <button class="text-red-500">
                            <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </button>
                    @else
                        <button class="edit-button-sm">
                            <x-edit-button></x-edit-button>
                        </button>
                    @endif

                </div>
                @if (!$type->is_locked)
                    </a>
                @endif
            </div>
        @endforeach
    </div>
@endsection

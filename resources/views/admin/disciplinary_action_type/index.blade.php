@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Disciplinary Action Types</h1>
        <p class="text-sm text-white">These are the types of Disciplinary actions your members can get. Default order is
            alphabetically.</p>
    </header>

    <div class="admin-card">
        <div class="flex items-center justify-end mb-3">
            <div class="">
                @can('disciplinary_action_type_manage')
                    <a href="{{ route('admin.disciplinary_action_type.create') }}" class="new-button-sm">
                        <x-new-button></x-new-button>
                    </a>
                @endcan
            </div>
        </div>
        @foreach ($da_types as $type)
            <div class="border-l-4 cursor-pointer admin-pill">
                <a href="{{ route('admin.disciplinary_action_type.edit', $type->id) }}">
                    <div class="flex items-center justify-between ml-3 text-white">
                        <div class="">
                            <p class="">{{ $type->name }}</p>
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

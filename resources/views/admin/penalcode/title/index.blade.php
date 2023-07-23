@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Penal Code Titles</h1>
        <p class="text-sm text-white">Control your community penal code.</p>
    </header>

    <div class="admin-card">
        <a class="secondary-button-md" href="{{ route('admin.penalcode.code.index') }}">
            Manage Codes
        </a>

        <a class="secondary-button-md" href="{{ route('admin.penalcode.class.index') }}">
            Manage Classifications
        </a>
    </div>

    <div class="admin-card">
        <div class="flex items-center justify-end mb-3">
            <div class="">
                @can('penal_code_manage')
                    <a class="new-button-sm" href="{{ route('admin.penalcode.title.create') }}">
                        <x-new-button></x-new-button>
                    </a>
                @endcan
            </div>
        </div>
        @foreach ($titles as $title)
            <div class="border-l-4 cursor-pointer admin-pill">
                <a href="{{ route('admin.penalcode.title.edit', $title->id) }}">
                    <div class="flex items-center justify-between ml-3 text-white">
                        <div class="">
                            <p class="">Title {{ $title->number }} - {{ $title->name }}</p>
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

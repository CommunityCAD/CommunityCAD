@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Penal Code</h1>
        <p class="text-sm text-white">Control your community penal code.</p>
    </header>

    <div class="admin-card">
        <a class="secondary-button-md" href="{{ route('admin.penalcode.title.index') }}">
            Manage Titles
        </a>

        <a class="secondary-button-md" href="{{ route('admin.penalcode.class.index') }}">
            Manage Classifications
        </a>
    </div>

    <div class="admin-card">
        <div class="flex items-center justify-end mb-3">
            <div class="">
                @can('penal_code_manage')
                    <a class="new-button-sm" href="{{ route('admin.penalcode.code.create') }}">
                        <x-new-button></x-new-button>
                    </a>
                @endcan
            </div>
        </div>
        @foreach ($titles as $title)
            <h2>PC - {{ $title->number }} {{ $title->name }}</h2>

            @foreach ($title->penal_code_codes() as $code)
                <div class="border-l-4 cursor-pointer admin-pill">
                    <a href="{{ route('admin.penalcode.code.edit', $code->id) }}">
                        <div class="flex items-center justify-between ml-3 text-white">
                            <div class="">
                                <p class="">PC - {{ $title->number }}({{ $code->number }}).
                                    {{ $code->name }}</p>
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
        @endforeach
    </div>
@endsection

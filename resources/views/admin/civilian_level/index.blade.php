@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Civilian Levels</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="admin-card">
        <div class="flex items-center justify-end mb-3">
            <div class="">
                @can('civilian_level_manage')
                    <a href="{{ route('admin.civilian_level.create') }}" class="new-button-sm">
                        <x-new-button></x-new-button>
                    </a>
                @endcan
            </div>
        </div>
        @foreach ($civilianLevels as $level)
            <div class="border-l-4 cursor-pointer admin-pill">
                <a href="{{ route('admin.civilian_level.edit', $level->id) }}">
                    <div class="flex items-center justify-between ml-3 text-white">
                        <div class="">
                            <p class="">{{ $level->name }}</p>
                            <p class="text-sm">Max Civilians: {{ $level->civilian_limit }} | Max Vehicles per Civilian:
                                {{ $level->vehicle_limit }} | Max Firearms per Civilian: {{ $level->firearm_limit }}</p>
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

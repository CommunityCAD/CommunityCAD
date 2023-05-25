@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">CAD Settings</h1>
        <p class="text-sm font-bold text-red-600">Edit CAD Settings. Refer to the Docs before changing values here.</p>
    </header>
    <div class="admin-card">
        @foreach ($settings as $setting)
            <div class="admin-pill">
                <a href="{{ route('admin.cad_setting.edit', $setting->id) }}">
                    <div class="flex items-center justify-between ml-3 text-white">
                        <span class="">{{ $setting->name }}</span>
                        <span class="p-3">
                            {{ $setting->value }}
                        </span>
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

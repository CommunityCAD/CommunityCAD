@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">CAD Settings</h1>
        <p class="text-sm font-bold text-red-600">Edit CAD Settings. Refer to the Docs before changing values here.</p>
    </header>
    <div class="card">
        @foreach ($settings as $setting)
            <div class="pill">
                <a class="" href="{{ route('admin.cad_setting.edit', $setting->id) }}">
                    <div class="flex items-center justify-between ml-3 text-white">
                        <div class="block truncate text-ellipsis overflow-hidden">
                            <p class="font-bold">{{ $setting->name }}</p>
                            <p class="p-3 hidden lg:block text-sm">
                                {{ $setting->value }}
                            </p>
                        </div>
                        <span class="ml-4">
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

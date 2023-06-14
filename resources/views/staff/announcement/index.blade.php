@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage Announcements</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="admin-card">
        <div class="flex items-center justify-end mb-3">
            <div class="">
                <a href="{{ route('staff.announcement.create') }}" class="new-button-sm">
                    <x-new-button></x-new-button>
                </a>
            </div>
        </div>
        @foreach ($announcements as $announcement)
            <div class="border-l-4 cursor-pointer admin-pill">
                <a href="{{ route('staff.announcement.edit', $announcement->id) }}">
                    <div class="flex items-center justify-between ml-3 text-white">
                        <div class="flex">
                            @if ($announcement->department_id != 0)
                                <img src="{{ $announcement->department->logo }}" class="w-10 h-10"
                                    alt="{{ $announcement->department->initials }}">
                            @else
                                <img src="{{ get_setting('community_logo') }}" class="w-10 h-10"
                                    alt="{{ $announcement->department->initials }}">
                            @endif

                            <div class="ml-4">
                                <p class="">{{ $announcement->title }} for {{ $announcement->department->name }}</p>
                                <p class="text-sm">{{ $announcement->text }}</p>
                            </div>
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

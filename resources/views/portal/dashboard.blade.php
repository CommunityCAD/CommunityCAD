@extends('layouts.portal')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Member Portal</h1>
        <p class="text-sm text-white">Welcome to {{ get_setting('community_name') }}</p>
    </header>

    <div class="md:flex md:justify-between">
        <div class="flex items-center justify-between border-red-500 md:mr-2 card">
            <div class="">
                <p class="text-sm text-red-500">Total Members</p>
                <p class="text-2xl">{{ $total_members }}</p>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                    <path fill-rule="evenodd"
                        d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z"
                        clip-rule="evenodd" />
                    <path
                        d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                </svg>
            </div>
        </div>

        <div class="flex items-center justify-between border-yellow-600 card md:mx-2">
            <div class="">
                <p class="text-sm text-yellow-600">Total Play Time</p>
                <p class="text-2xl">Coming Soon!</p>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="flex items-center justify-between border-teal-400 card md:ml-2">
            <div class="">
                <p class="text-sm text-teal-400">Online Members or Active</p>
                <p class="text-2xl">{{ $total_active_members }}/{{ $total_members }}</p>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                    <path fill-rule="evenodd"
                        d="M12 1.5a.75.75 0 01.75.75V4.5a.75.75 0 01-1.5 0V2.25A.75.75 0 0112 1.5zM5.636 4.136a.75.75 0 011.06 0l1.592 1.591a.75.75 0 01-1.061 1.06l-1.591-1.59a.75.75 0 010-1.061zm12.728 0a.75.75 0 010 1.06l-1.591 1.592a.75.75 0 01-1.06-1.061l1.59-1.591a.75.75 0 011.061 0zm-6.816 4.496a.75.75 0 01.82.311l5.228 7.917a.75.75 0 01-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 01-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 01-1.247-.606l.569-9.47a.75.75 0 01.554-.68zM3 10.5a.75.75 0 01.75-.75H6a.75.75 0 010 1.5H3.75A.75.75 0 013 10.5zm14.25 0a.75.75 0 01.75-.75h2.25a.75.75 0 010 1.5H18a.75.75 0 01-.75-.75zm-8.962 3.712a.75.75 0 010 1.061l-1.591 1.591a.75.75 0 11-1.061-1.06l1.591-1.592a.75.75 0 011.06 0z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>

    <div class="border-purple-500 card">
        <div class="flex justify-between">
            <div class="flex items-center space-x-2 text-purple-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path
                        d="M16.881 4.346A23.112 23.112 0 018.25 6H7.5a5.25 5.25 0 00-.88 10.427 21.593 21.593 0 001.378 3.94c.464 1.004 1.674 1.32 2.582.796l.657-.379c.88-.508 1.165-1.592.772-2.468a17.116 17.116 0 01-.628-1.607c1.918.258 3.76.75 5.5 1.446A21.727 21.727 0 0018 11.25c0-2.413-.393-4.735-1.119-6.904zM18.26 3.74a23.22 23.22 0 011.24 7.51 23.22 23.22 0 01-1.24 7.51c-.055.161-.111.322-.17.482a.75.75 0 101.409.516 24.555 24.555 0 001.415-6.43 2.992 2.992 0 00.836-2.078c0-.806-.319-1.54-.836-2.078a24.65 24.65 0 00-1.415-6.43.75.75 0 10-1.409.516c.059.16.116.321.17.483z" />
                </svg>
                <p class="">Community Announcements</p>
            </div>
            @can('announcement_manage')
                <a href="{{ route('staff.announcement.create') }}" class="new-button-sm">
                    <x-new-button></x-new-button>
                </a>
            @endcan

        </div>
        <div class="">
            @foreach ($announcements as $announcement)
                <div class="p-3 my-2 border-b-2 border-purple-900 announcement">
                    <div class="flex justify-between">
                        <div class="flex">
                            @if ($announcement->department_id != 0)
                                <img src="{{ $announcement->department->logo }}" class="w-10 h-10"
                                    alt="{{ $announcement->department->initials }}">
                            @else
                                <img src="{{ get_setting('community_logo') }}" class="w-10 h-10"
                                    alt="{{ $announcement->department->initials }}">
                            @endif
                            <div class="ml-3">
                                <p class="text-lg text-white">{{ $announcement->title }}</p>
                                <p class="text-gray-400">{{ $announcement->text }}</p>
                            </div>
                        </div>
                        <div class="space-y-6">
                            @can('announcement_manage')
                                <a href="{{ route('staff.announcement.edit', $announcement->id) }}" class="edit-button-sm">
                                    <x-edit-button></x-edit-button>
                                </a>
                                <form class="delete-button-sm"
                                    action="{{ route('staff.announcement.destroy', $announcement->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you wish to delete this announcement? This can\'t be undone!');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="">
                                        <x-delete-button></x-delete-button>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                    <p class="text-right text-gray-400">Posted by: {{ $announcement->user->discord }} at
                        {{ $announcement->created_at->format('m/d/Y H:i') }}</p>
                </div>
            @endforeach
        </div>
    </div>
    {{--
    <div class="my-4 border-green-600 card">
        <div class="flex justify-between">
            <div class="flex items-center space-x-2 text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path
                        d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                    <path fill-rule="evenodd"
                        d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                        clip-rule="evenodd" />
                </svg>
                <p class="">Upcoming Events</p>
            </div>
            <a href="#" class="new-button-sm">
                <x-new-button></x-new-button>
            </a>
        </div>
    </div> --}}
@endsection

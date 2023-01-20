@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between border-b mb-4" aria-label="Breadcrumb">
        <div class="">
            <p class="text-white text-lg">{{ $page_title }}</p>
        </div>

        @livewire('breadcrumbs', ['paths' => [['href' => route('portal.dashboard'), 'text' => 'View Properties']]])

    </nav>

    <div class="space-x-2 space-y-2 my-4">
        <a class="px-3 py-2 bg-slate-500 text-white inline-block rounded-md"
            href="{{ route('admin.application.index') }}">All</a>
        <a class="px-3 py-2 bg-yellow-600 text-white inline-block rounded-md"
            href="{{ route('admin.application.index', 1) }}">Pending Review</a>
        @can('application_admin_review')
            <a class="px-3 py-2 bg-yellow-300 text-black inline-block rounded-md"
                href="{{ route('admin.application.index', 2) }}">Pending Admin Review</a>
        @endcan
        <a class="px-3 py-2 bg-blue-600 text-white inline-block rounded-md"
            href="{{ route('admin.application.index', 3) }}">Pending Interview</a>
        <a class="px-3 py-2 bg-green-600 text-white inline-block rounded-md"
            href="{{ route('admin.application.index', 4) }}">Approved</a>
        <a class="px-3 py-2 bg-red-600 text-white inline-block rounded-md"
            href="{{ route('admin.application.index', 5) }}">Denied</a>
        <a class="px-3 py-2 bg-red-600 text-white inline-block rounded-md"
            href="{{ route('admin.application.index', 6) }}">Withdrawn</a>
    </div>

    @foreach ($applications as $application)
        @php
            switch ($application->status) {
                case 1:
                    $border_color = 'border-yellow-600';
                    $text_color = 'text-yellow-600';
                    break;
                case 2:
                    $border_color = 'border-yellow-300';
                    $text_color = 'text-yellow-300';
                    break;
                case 3:
                    $border_color = 'border-blue-600';
                    $text_color = 'text-blue-600';
                    break;
                case 4:
                    $border_color = 'border-green-600';
                    $text_color = 'text-green-600';
                    break;
                case 5:
                    $border_color = 'border-red-600';
                    $text_color = 'text-red-600';
                    break;
                case 6:
                    $border_color = 'border-red-600';
                    $text_color = 'text-red-600';
                    break;
            }
        @endphp
        <div
            class="my-4 dark:bg-[#124559] hover:opacity-70 px-3 py-2 rounded-lg w-full text-white border-l-8 {{ $border_color }}">
            <a href="{{ route('admin.application.show', $application->id) }}">
                <div class="flex justify-between">
                    <p class="{{ $text_color }}">{{ $application->id }} |
                        {{ $application->user->discord_name }}#{{ $application->user->discriminator }}</p>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd"
                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                clip-rule="evenodd" />
                        </svg>

                    </div>
                </div>

                <div class="">

                    <p class="">Department: {{ $application->department->name }}</p>

                </div>
            </a>
        </div>
    @endforeach
@endsection

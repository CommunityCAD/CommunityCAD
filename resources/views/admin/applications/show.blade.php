@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg text-white">Show Application {{ $application->id }} |
                {{ $application->user->discord_name }}#{{ $application->user->discriminator }}</p>
        </div>

        @livewire('breadcrumbs', ['paths' => [['href' => route('admin.application.index', 1), 'text' => 'View Applications']]])

    </nav>

    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <h2 class="text-2xl font-bold dark:text-gray-200">User Information Application</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">
            <div class="">
                <div class="grid text-sm md:grid-cols-2">
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Discord Name</div>
                        <div class="px-4 py-2">
                            {{ $application->user->discord_name }}#{{ $application->user->discriminator }}
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Real Name</div>
                        <div class="px-4 py-2">{{ $application->user->real_name }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Email</div>
                        <div class="px-4 py-2">{{ $application->user->email }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Steam Hex</div>
                        <div class="px-4 py-2">{{ $application->user->steam_hex }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Steam ID</div>
                        <div class="px-4 py-2">{{ $application->user->steam_id }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Discord ID</div>
                        <div class="px-4 py-2">{{ $application->user->id }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Birthday</div>
                        <div class="px-4 py-2">{{ $application->user->birthday->format('M d, Y') }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Age</div>
                        <div class="px-4 py-2">{{ $application->user->age }}</div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-bold dark:text-gray-200">Application Meta Data</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">
            <div class="">
                <div class="grid text-sm md:grid-cols-2">
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Created At</div>
                        <div class="px-4 py-2">{{ $application->created_at->format('m/d/Y') }}
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Last Action</div>
                        <div class="px-4 py-2">{{ $application->updated_at->format('m/d/Y') }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Status</div>
                        <div class="px-4 py-2">{{ $application->status_name }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        @php
                            $flag = '';
                            if ($application->user->age < config('cad.minimum_age')) {
                                $flag .= "<span class='text-red-600'>{Under Age}</span>";
                            }
                        @endphp
                        <div class="px-4 py-2 font-bold">Flags</div>
                        <div class="px-4 py-2">{!! $flag !!}</div>
                    </div>

                </div>
            </div>
        </div>

        <h2 class="text-2xl font-bold dark:text-gray-200">Community Application</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg ">
            <div class="text-gray-900 dark:text-white">
                <div class="w-full">
                    <label for="department_id" class="block mt-3 font-bold">What department are you applying
                        for?</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        {{ $application->department->name }}</p>
                </div>

                <div class="w-full">
                    <label for="why_join_department" class="block mt-3 font-bold">Why do you wish to join this
                        department?</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        {{ $application->why_join_department }}</p>
                </div>

                <div class="w-full">
                    <label for="experience_department" class="block mt-3 font-bold">Do you have any
                        experiences in
                        this
                        field?</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        {{ $application->experience_department }}</p>
                </div>

                <div class="w-full">
                    <label for="department_duties" class="block mt-3 font-bold">In your own words, what are
                        the
                        general
                        duties of the department?</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        {{ $application->department_duties }}</p>
                </div>

                <div class="w-full">
                    <label for="scenario" class="block mt-3 font-bold">Please create a detailed scenario (For
                        Example: 911 call, traffic stop, crime scene, etc.)</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        {{ $application->scenario }}</p>
                </div>

                <hr class="my-4">

                <div class="w-full">
                    <label for="about_you" class="block mt-3 font-bold">Tell us about yourself</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        {{ $application->about_you }}</p>
                </div>

                <div class="w-full">
                    <label for="skills" class="block mt-3 font-bold">Do you have any skills that can be
                        useful in
                        your department and/or the community?</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        {{ $application->skills }}</p>
                </div>

                <div class="w-full">
                    <label for="legal_copy" class="block mt-3 font-bold">Do you have a working and legal copy
                        of
                        GTA V on PC?</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        @if ($application->legal_copy)
                            Yes
                        @else
                            No
                        @endif
                    </p>
                </div>

                <div class="w-full">
                    <label for="previous_member" class="block mt-3 font-bold">Are you a previous member of
                        {{ config('cad.community_name') }}?</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        @if ($application->previous_member)
                            Yes
                        @else
                            No
                        @endif
                    </p>
                </div>

                <div class="w-full">
                    <label for="why_join_community" class="block mt-3 font-bold">Why do you want to be apart
                        of
                        {{ config('cad.community_name') }}?</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        {{ $application->why_join_community }}</p>
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-bold dark:text-gray-200">Application Options</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">
            <div class="">
                <div class="space-y-4">
                    @can('application_action')
                        @switch($application->status)
                            @case(1)
                                <a class="block px-4 py-2 m-3 font-bold text-white bg-green-500 rounded cursor-pointer hover:bg-green-600"
                                    href="{{ route('admin.application.approve_application', $application->id) }}">
                                    Approve Application
                                </a>
                                <a class="block px-4 py-2 m-3 font-bold text-white bg-red-500 rounded cursor-pointer hover:bg-red-600"
                                    href="{{ route('admin.application.deny_application.edit', $application->id) }}">
                                    Deny Application
                                </a>
                                <a class="block px-4 py-2 m-3 font-bold text-white bg-yellow-500 rounded cursor-pointer hover:bg-yellow-600"
                                    href="{{ route('admin.application.flag_application.edit', $application->id) }}">
                                    Flag Application
                                </a>
                            @break

                            @case(3)
                                <a class="block px-4 py-2 m-3 font-bold text-white bg-green-500 rounded cursor-pointer hover:bg-green-600"
                                    href="{{ route('admin.application.approve_interview', $application->id) }}">Approve
                                    Interview</a>
                                <a class="block px-4 py-2 m-3 font-bold text-white bg-red-500 rounded cursor-pointer hover:bg-red-600"
                                    href="{{ route('admin.application.deny_interview.edit', $application->id) }}">Deny
                                    Interview</a>
                            @break

                            @case(2)
                                <p>Please review below to see why this application was flagged.</p>
                                <a class="block px-4 py-2 m-3 font-bold text-white bg-green-500 rounded cursor-pointer hover:bg-green-600"
                                    href="{{ route('admin.application.approve_application', $application->id) }}">
                                    Approve Application
                                </a>
                                <a class="block px-4 py-2 m-3 font-bold text-white bg-red-500 rounded cursor-pointer hover:bg-red-600"
                                    href="{{ route('admin.application.deny_application.edit', $application->id) }}">
                                    Deny Application
                                </a>
                            @break

                            @default
                                <p class="pl-3 text-lg text-white">You have no options here.</p>
                        @endswitch
                    @endcan

                    @cannot('application_action')
                        <p class="pl-3 text-lg text-white">You do not have permission to action applications.</p>
                    @endcannot
                </div>
            </div>
        </div>
        <h2 class="text-2xl font-bold dark:text-gray-200">Application Comments</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">
            <div class="">
                @if (is_string($application->usableComments))
                    <p class="text-white">{{ $application->usableComments }}</p>
                @else
                    @foreach ($application->usableComments as $comment)
                        <div class="p-3 my-2 border-2 border-gray-900">
                            <p class="text-white">Actioned by: {{ $comment->commenter }} at
                                {{ date('Y-m-d H:i:s', $comment->time) }}
                            </p>
                            <div>
                                <p class="text-gray-400">{{ $comment->comments }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
@endsection

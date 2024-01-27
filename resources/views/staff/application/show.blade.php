@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">View Application for {{ $application->user->preferred_name }}</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <h2 class="text-2xl font-bold dark:text-gray-200">User Information Application</h2>

        <div class="card">
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
                        <p class="px-4 py-2 font-bold">Discord Username</p>
                        <p class="px-4 py-2">{{ $application->user->discord_username }}</p>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Steam Hex</div>
                        <div class="px-4 py-2">{{ $application->user->steam_hex }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Discord ID</div>
                        <div class="px-4 py-2">{{ $application->user->id }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Steam ID</div>
                        <div class="px-4 py-2">{{ $application->user->steam_id }}</div>
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

        <div class="card">
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
                            $flag = "<span class='text-green-600'>None</span>";
                            if ($application->user->age < get_setting('minimum_age')) {
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

        <div class="card">
            <div class="">
                <div class="w-full">
                    <label class="block mt-3 font-bold" for="department_id">What department are you applying
                        for?</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $application->department->name }}</p>
                </div>

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="why_join_department">Why do you wish to join this
                        department?</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $application->why_join_department }}</p>
                </div>

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="experience_department">Do you have any
                        experiences in
                        this
                        field?</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $application->experience_department }}</p>
                </div>

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="department_duties">In your own words, what are
                        the
                        general
                        duties of the department?</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $application->department_duties }}</p>
                </div>

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="scenario">Please create a detailed scenario (For
                        Example: 911 call, traffic stop, crime scene, etc.)</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $application->scenario }}</p>
                </div>

                <hr class="my-4">

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="about_you">Tell us about yourself</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $application->about_you }}</p>
                </div>

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="skills">Do you have any skills that can be
                        useful in
                        your department and/or the community?</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $application->skills }}</p>
                </div>

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="legal_copy">Do you have a working and legal copy
                        of
                        GTA V on PC?</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        @if ($application->legal_copy)
                            Yes
                        @else
                            No
                        @endif
                    </p>
                </div>

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="previous_member">Are you a previous member of
                        {{ get_setting('community_name') }}?</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        @if ($application->previous_member)
                            Yes
                        @else
                            No
                        @endif
                    </p>
                </div>

                <div class="w-full">
                    <label class="block mt-3 font-bold" for="why_join_community">Why do you want to be apart
                        of
                        {{ get_setting('community_name') }}?</label>
                    <p class="w-full p-3 mt-2 border border-black rounded-md">
                        {{ $application->why_join_community }}</p>
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-bold dark:text-gray-200">Application Options</h2>

        <div class="card">
            <div class="">
                <div class="space-y-4">
                    @can('application_action')
                        @switch($application->status)
                            @case(1)
                                <a class="new-button-md" href="{{ route('staff.application.approve_application', $application->id) }}">
                                    Approve Application
                                </a>
                                <a class="delete-button-md"
                                    href="{{ route('staff.application.deny_application.edit', $application->id) }}">
                                    Deny Application
                                </a>
                                <a class="bg-yellow-600 button-md hover:bg-yellow-500"
                                    href="{{ route('staff.application.flag_application.edit', $application->id) }}">
                                    Flag Application
                                </a>
                            @break

                            @case(3)
                                <a class="new-button-md"
                                    href="{{ route('staff.application.approve_interview', $application->id) }}">Approve
                                    Interview</a>
                                <a class="delete-button-md"
                                    href="{{ route('staff.application.deny_interview.edit', $application->id) }}">Deny
                                    Interview</a>
                            @break

                            @case(2)
                                <p>Please review below to see why this application was flagged.</p>
                                <a class="new-button-md"
                                    href="{{ route('staff.application.approve_application', $application->id) }}">
                                    Approve Application
                                </a>
                                <a class="delete-button-md"
                                    href="{{ route('staff.application.deny_application.edit', $application->id) }}">
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

        <div class="card">
            <div class="">
                @foreach ($histories as $history)
                    <div class="p-3 my-2 border-2 border-gray-900">
                        <p class="text-white">Actioned by: {{ $history->user->preferred_name }} at
                            {{ $history->created_at->format('m/d/Y H:i:s') }}
                        </p>
                        <div>
                            <p class="text-gray-400">{{ $history->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

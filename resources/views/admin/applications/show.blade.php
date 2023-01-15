@extends('layouts.portal')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <h2 class="text-2xl font-bold dark:text-gray-200">User Information Application</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">
            <div class="">
                <div class="grid text-sm md:grid-cols-2">
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-bold">Discord Name</div>
                        <div class="px-4 py-2">{{ $application->user->discord_name }}#{{ $application->user->discriminator }}
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
                        <div class="px-4 py-2 font-bold">Flags</div>
                        <div class="px-4 py-2">{under age}</div>
                    </div>

                </div>

                <div class="w-full text-sm">
                    <div class="px-4 py-2 font-bold">Application Comments</div>
                    <div class="px-4 py-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde doloremque molestiae eaque
                        voluptate deleniti qui temporibus? Officiis eveniet odio alias quisquam autem ea, libero quia
                        optio quod inventore! Itaque, deserunt?
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

                <hr class="my-4">

                <h3 class="my-4 text-lg text-center">Application Actions</h3>
                <div class="space-y-4">
                    @switch($application->status)
                        @case(1)
                            <a class="block px-4 py-2 m-3 font-bold rounded cursor-pointer hover:bg-green-600 text-white bg-green-500"
                                href="#">
                                Approve Application
                            </a>
                            <a class="block px-4 py-2 m-3 font-bold rounded cursor-pointer hover:bg-red-600 text-white bg-red-500"
                                href="#">
                                Deny Application
                            </a>
                            <a class="block px-4 py-2 m-3 font-bold rounded cursor-pointer hover:bg-yellow-600 text-white bg-yellow-500"
                                href="#">
                                Flag Application
                            </a>
                        @break

                        @case(3)
                            <a class="btn btn-green" href="#">Approve
                                Interview</a>
                            <a class="btn btn-red" href="#">Deny
                                Interview</a>
                        @break

                        @case(2)
                            @can('applications_admin')
                                <a class="btn btn-green" href="#">Approve
                                    Application</a>
                                <a class="btn btn-red" href="#">Deny
                                    Application</a>
                            @endcan
                            @cannot('applications_admin')
                                <p class="pl-3 text-lg text-white">This application is in Admin Review.<br>You can not approve or deny
                                    this
                                    application.</p>
                            @endcannot
                        @break

                        @default
                            <p class="pl-3 text-lg text-white">You have no options here.</p>
                    @endswitch
                </div>


            </div>
        </div>

    </div>
@endsection

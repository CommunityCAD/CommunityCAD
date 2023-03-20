@extends('layouts.public')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <h2 class="text-2xl font-bold dark:text-gray-200">Community Application</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-2xl sm:rounded-lg ">
            <div class="text-gray-900 dark:text-white">

                @if ($application->status <= 3)
                    <div class="w-full">
                        <form action="{{ route('application.update', $application->id) }}" method="post">
                            @csrf
                            @method('put')

                            <input type="hidden" name="status" value="6">
                            <input type="submit"
                                class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md cursor-pointer hover:opacity-70"
                                value="Withdraw Application">
                        </form>
                    </div>
                @endif

                <div class="w-full">
                    <label for="department_id" class="block mt-3 font-bold">Application Status</label>
                    <p class="w-full p-3 mt-2 border rounded-md">
                        {{ $application->status_name }}</p>
                </div>

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

    </div>
@endsection

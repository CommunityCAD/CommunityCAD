@extends('layouts.public')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <h2 class="text-2xl font-bold dark:text-gray-200">Community Application</h2>

        <div class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden shadow-md bg-[#124559] sm:max-w-2xl sm:rounded-lg ">
            <div class="text-white">
                <form action="{{ route('application.store') }}" method="POST">
                    @csrf
                    <div class="w-full">
                        <label class="block mt-3 text-black-500" for="department_id">What department are you applying
                            for?</label>
                        <select class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" id=""
                            name="department_id">
                            <option value="">-- Choose One --</option>

                            @foreach ($departments as $department)
                                <option {{ old('department_id') == $department->id ? 'selected="selected"' : '' }}
                                    value="{{ $department->id }}">
                                    {{ $department->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label class="block mt-3 text-black-500" for="why_join_department">Why do you wish to join this
                            department?</label>
                        <textarea class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="why_join_department"
                            type="text">{{ old('why_join_department') }}</textarea>
                        <x-input-error :messages="$errors->get('why_join_department')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label class="block mt-3 text-black-500" for="experience_department">Do you have any experiences in
                            this
                            field?</label>
                        <textarea class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="experience_department"
                            type="text">{{ old('experience_department') }}</textarea>
                        <x-input-error :messages="$errors->get('experience_department')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label class="block mt-3 text-black-500" for="department_duties">In your own words, what are the
                            general
                            duties of the department?</label>
                        <textarea class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="department_duties"
                            type="text">{{ old('department_duties') }}</textarea>
                        <x-input-error :messages="$errors->get('department_duties')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label class="block mt-3 text-black-500" for="scenario">Please create a detailed scenario (For
                            Example: 911 call, traffic stop, crime scene, etc.)</label>
                        <textarea class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="scenario" type="text">{{ old('scenario') }}</textarea>
                        <x-input-error :messages="$errors->get('scenario')" class="mt-2" />
                    </div>

                    <hr class="my-4">

                    <div class="w-full">
                        <label class="block mt-3 text-black-500" for="about_you">Tell us about yourself</label>
                        <textarea class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="about_you" type="text">{{ old('about_you') }}</textarea>
                        <x-input-error :messages="$errors->get('about_you')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label class="block mt-3 text-black-500" for="skills">Do you have any skills that can be useful in
                            your department and/or the community?</label>
                        <textarea class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="skills" type="text">{{ old('skills') }}</textarea>
                        <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label class="block mt-3 text-black-500" for="legal_copy">Do you have a working and legal copy of
                            GTA V on PC?</label>
                        <select class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" id=""
                            name="legal_copy">
                            <option {{ old('legal_copy') == 0 ? 'selected="selected"' : '' }} value="0">No
                            </option>
                            <option {{ old('legal_copy') == 1 ? 'selected="selected"' : '' }} value="1">Yes
                            </option>

                        </select>
                        <x-input-error :messages="$errors->get('legal_copy')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label class="block mt-3 text-black-500" for="previous_member">Are you a previous member of
                            {{ get_setting('community_name') }}?</label>
                        <select class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" id=""
                            name="previous_member">
                            <option {{ old('previous_member') == 0 ? 'selected="selected"' : '' }} value="0">No
                            </option>
                            <option {{ old('previous_member') == 1 ? 'selected="selected"' : '' }} value="1">Yes
                            </option>

                        </select>
                        <x-input-error :messages="$errors->get('previous_member')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label class="block mt-3 text-black-500" for="why_join_community">Why do you want to be apart of
                            {{ get_setting('community_name') }}?</label>
                        <textarea class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="why_join_community"
                            type="text">{{ old('why_join_community') }}</textarea>
                        <x-input-error :messages="$errors->get('why_join_community')" class="mt-2" />
                    </div>

                    <button
                        class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-[#01161e] border border-transparent rounded-md hover:opacity-70"
                        type="submit">
                        Submit Application
                    </button>
                </form>

                <h3 class="my-4 text-lg text-center">Application Terms</h3>
                <div class="space-y-4">
                    @if (get_setting('minimum_age') > 0)
                        <p>You are at least {{ get_setting('minimum_age') }} years of age at the time of
                            submitting this application.
                        </p>
                    @endif
                    <div class="prose prose-lg">
                        <p class="">{!! Str::markdown(get_setting('application_terms')) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

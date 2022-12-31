@extends('layouts.public')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <h2 class="text-2xl font-bold dark:text-gray-200">Community Application</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-2xl sm:rounded-lg ">
            <div class="text-gray-900 dark:text-white">

                <div class="w-full">
                    <label for="department_id" class="block mt-3 text-black-500">What department are you applying for?</label>
                    <select name="department_id" class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none"
                        id="">
                        <option value="">-- Choose One --</option>

                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ old('department_id') === $department->id ? 'selected="selected"' : '' }}>
                                {{ $department->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                </div>

                <div class="w-full">
                    <label for="why_join_department" class="block mt-3 text-black-500">Why do you wish to join this
                        department?</label>
                    <textarea type="text" name="why_join_department"
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">{{ old('why_join_department') }}</textarea>
                    <x-input-error :messages="$errors->get('why_join_department')" class="mt-2" />
                </div>

                <div class="w-full">
                    <label for="experience_department" class="block mt-3 text-black-500">Do you have any experiences in this
                        field?</label>
                    <textarea type="text" name="experience_department"
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">{{ old('experience_department') }}</textarea>
                    <x-input-error :messages="$errors->get('experience_department')" class="mt-2" />
                </div>

                <div class="w-full">
                    <label for="department_duties" class="block mt-3 text-black-500">In your own words, what are the general
                        duties of the department?</label>
                    <textarea type="text" name="department_duties"
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">{{ old('department_duties') }}</textarea>
                    <x-input-error :messages="$errors->get('department_duties')" class="mt-2" />
                </div>

                <div class="w-full">
                    <label for="scenario" class="block mt-3 text-black-500">Please create a detailed scenario (For
                        Example: 911 call, traffic stop, crime scene, etc.)</label>
                    <textarea type="text" name="scenario" class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">{{ old('scenario') }}</textarea>
                    <x-input-error :messages="$errors->get('scenario')" class="mt-2" />
                </div>

                <hr class="my-4">

                <div class="w-full">
                    <label for="about_you" class="block mt-3 text-black-500">Tell us about yourself</label>
                    <textarea type="text" name="about_you" class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">{{ old('about_you') }}</textarea>
                    <x-input-error :messages="$errors->get('about_you')" class="mt-2" />
                </div>

                <div class="w-full">
                    <label for="skills" class="block mt-3 text-black-500">Do you have any skills that can be useful in
                        your department and/or the community?</label>
                    <textarea type="text" name="skills" class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">{{ old('skills') }}</textarea>
                    <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                </div>

                <div class="w-full">
                    <label for="legal_copy" class="block mt-3 text-black-500">Do you have a working and legal copy of GTA
                        V on PC?</label>
                    <select name="legal_copy" class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none"
                        id="">
                        <option value="">-- Choose One --</option>
                        <option {{ old('previous_member') === 1 ? 'selected="selected"' : '' }} value="1">Yes</option>
                        <option {{ old('previous_member') === 0 ? 'selected="selected"' : '' }} value="0">No</option>
                    </select>
                    <x-input-error :messages="$errors->get('legal_copy')" class="mt-2" />
                </div>

                <div class="w-full">
                    <label for="previous_member" class="block mt-3 text-black-500">Are you a previous member of
                        {{ config('cad.community_name') }}?</label>
                    <select name="previous_member" class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none"
                        id="">
                        <option value="">-- Choose One --</option>
                        <option {{ old('previous_member') === 1 ? 'selected="selected"' : '' }} value="1">Yes</option>
                        <option {{ old('previous_member') === 0 ? 'selected="selected"' : '' }} value="0">No</option>
                    </select>
                    <x-input-error :messages="$errors->get('previous_member')" class="mt-2" />
                </div>

                <div class="w-full">
                    <label for="why_join_community" class="block mt-3 text-black-500">Why do you want to be apart of
                        {{ config('cad.community_name') }}?</label>
                    <textarea type="text" name="why_join_community"
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">{{ old('why_join_community') }}</textarea>
                    <x-input-error :messages="$errors->get('why_join_community')" class="mt-2" />
                </div>

                <button type="submit"
                    class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-[#01161e] border border-transparent rounded-md hover:opacity-70">
                    Submit Application
                </button>

                <h3 class="text-lg text-center my-4">Application Terms</h3>
                <div class="space-y-4">
                    <p class="">You understand that you may only submit one application per recruitment cycle and that
                        if you are denied
                        you are required to wait until the next recruitment cycle to reapply.</p>

                    <p class="">You have read over the Applacation Rules & Regulations and agree to them?</p>

                    <p class="">Have you read over your application and ensured that all of the information on this
                        application is fully
                        accurate and correct, and that you are ready to submit this application for review?</p>

                    <p class="">You are at least {{ config('cad.minimum_age') }} years of age at the time of
                        submitting this application
                    </p>

                    <p class="">You understand that applicants will be contacted via our Fan Discord and you must be a
                        member of it if
                        you
                        wish to further within your application</p>
                </div>


            </div>
        </div>

    </div>
@endsection

@extends('layouts.portal')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <h2 class="text-2xl font-bold dark:text-gray-200">Deny Interview</h2>

        <div class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden shadow-md bg-[#124559] sm:max-w-4xl sm:rounded-lg text-white">
            <div class="mb-3 space-y-4">
                <p class="mt-1"><b>Can this person reapply?:</b> Is this applicant allowed to reapply. Default is Yes.</p>
                <p class="mt-1"><b>Reapply Date:</b> Date the applicant can reapply. Default is
                    {{ config('cad.days_until_reapply') }} days.</p>
                <p class="mt-1"><b>Reason:</b> This should be respectful and should include as much information as
                    possible. "Lack of effort" is not a good reason. Say "Application showed little effort on the why would
                    you like to join and roleplay experience questions."
                    <b>Do not include how long till they can reapply here.</b>
                </p>
                <p class="mt-1">Link to interview guide.</p>
            </div>
            <hr>

            <form action="{{ route('admin.application.deny_interview.store', $application->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="w-full">
                    <label for="reapply" class="block mt-3 text-black-500">Can this applicant reapply?</label>
                    <select name="reapply" class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none"
                        id="">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <x-input-error :messages="$errors->get('reapply')" class="mt-2" />
                </div>

                <div class="w-full">
                    <label for="reapply_date" class="block mt-3 text-black-500">Reapply Date</label>
                    <input type="date" name="reapply_date"
                        value="{{ date('Y-m-d', strtotime('+' . config('cad.days_until_reapply') . ' days', time())) }}"
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                    <x-input-error :messages="$errors->get('reapply_date')" class="mt-2" />
                </div>


                <div class="w-full">
                    <label for="denied_reason" class="block mt-3 text-black-500">Why are you denying this
                        application?</label>
                    <textarea type="text" name="denied_reason" class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">{{ old('denied_reason') }}</textarea>
                    <x-input-error :messages="$errors->get('denied_reason')" class="mt-2" />
                </div>

                <button type="submit"
                    class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-500 border border-transparent rounded-md hover:bg-red-600">
                    Deny Interview
                </button>

            </form>
        </div>


    </div>
@endsection

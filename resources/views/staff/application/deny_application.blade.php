@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Deny Application for {{ $application->user->discord }}</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="card">
        <div class="mb-3 space-y-4 text-white">
            <p class="mt-1"><b>Can this person reapply?:</b> Is this applicant allowed to reapply. Default is Yes.</p>
            <p class="mt-1"><b>Reapply Date:</b> Date the applicant can reapply. Default is
                {{ get_setting('days_until_reapply') }} days.</p>
            <p class="mt-1"><b>Reason:</b> This should be respectful and should include as much information as
                possible. "Lack of effort" is not a good reason. Say "Application showed little effort on the why would
                you like to join and roleplay experience questions."
                <b>Do not include how long till they can reapply here.</b>
            </p>
        </div>
        <hr>

        <form action="{{ route('staff.application.deny_application.store', $application->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="w-full">
                <label for="reapply" class="block mt-3 text-black-500">Can this applicant reapply?</label>
                <select name="reapply" class="select-input" id="">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <x-input-error :messages="$errors->get('reapply')" class="mt-2" />
            </div>

            <div class="w-full">
                <label for="reapply_date" class="block mt-3 text-black-500">Reapply Date</label>
                <input type="date" name="reapply_date"
                    value="{{ date('Y-m-d', strtotime('+' . get_setting('days_until_reapply') . ' days', time())) }}"
                    class="text-input" required />
                <x-input-error :messages="$errors->get('reapply_date')" class="mt-2" />
            </div>


            <div class="w-full">
                <label for="denied_reason" class="block mt-3 text-black-500">Why are you denying this
                    application?</label>
                <textarea type="text" name="denied_reason" class="textarea-input" autofocus required>{{ old('denied_reason') }}</textarea>
                <x-input-error :messages="$errors->get('denied_reason')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="w-1/3 mr-5 bg-yellow-600 button-md hover:bg-yellow-500">Deny Application</button>
                <a href="{{ route('staff.application.show', $application->id) }}" class="w-1/3 delete-button-md">Cancel</a>
            </div>
        </form>
    </div>
@endsection

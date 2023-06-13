@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Flag Application</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden shadow-md bg-[#124559] sm:max-w-4xl sm:rounded-lg text-white">
        <form action="{{ route('staff.application.flag_application.store', $application->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="w-full">
                <label for="reason" class="block mt-3 text-black-500">Why are you flagging this
                    application?</label>
                <textarea type="text" name="reason" class="textarea-input" autofocus required>{{ old('reason') }}</textarea>
                <x-input-error :messages="$errors->get('reason')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="w-1/3 mr-5 bg-yellow-600 button-md hover:bg-yellow-500">Flag
                    Application</button>
                <a href="{{ route('staff.application.show', $application->id) }}" class="w-1/3 delete-button-md">Cancel</a>
            </div>
        </form>
    </div>
@endsection

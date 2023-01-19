@extends('layouts.portal')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <h2 class="text-2xl font-bold dark:text-gray-200">Flag Application</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">

            <form action="{{ route('admin.application.flag_application.store', $application->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="w-full">
                    <label for="reason" class="block mt-3 text-black-500">Why are you flagging this
                        application?</label>
                    <textarea type="text" name="reason" class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">{{ old('reason') }}</textarea>
                    <x-input-error :messages="$errors->get('reason')" class="mt-2" />
                </div>

                <button type="submit"
                    class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-black uppercase transition duration-150 ease-in-out bg-yellow-500 hover:bg-yellow-600 border border-transparent rounded-md">
                    Flag Application
                </button>

            </form>
        </div>


    </div>
@endsection

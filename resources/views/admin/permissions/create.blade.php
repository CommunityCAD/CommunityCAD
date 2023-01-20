@extends('layouts.portal')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <h2 class="text-2xl font-bold dark:text-gray-200">Create Permission</h2>

        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">

            <form action="{{ route('admin.permissions.store') }}" method="POST">
                @csrf

                <div>
                    <label for="title" class="block mt-3 text-black-500">Title <span class="text-red-600">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <input type="submit" value="Create Permission"
                    class="bg-green-500 px-2 py-1 rounded hover:bg-green-600 mt-3 cursor-pointer">

            </form>
        </div>


    </div>
@endsection

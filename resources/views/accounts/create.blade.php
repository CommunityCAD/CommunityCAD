@extends('layouts.public')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <h2 class="text-2xl font-bold dark:text-gray-200">Create an Account</h2>

        <div x-data="{
            currentStep: 1
        }"
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:max-w-2xl sm:rounded-lg ">
            <div class="flex text-gray-900 dark:text-white">
                <button type="button" @click="currentStep = 1" class="p-2 border-indigo-500"
                    :class="currentStep == 1 ? 'border border-b-0' : 'border-b'">Step 1 (Link Steam)</button>
                <button type="button" @click="currentStep = 2" class="p-2 border-indigo-500"
                    :class="currentStep == 2 ? 'border border-b-0' : 'border-b'">Step 2 (IG Names)</button>
                <button type="button" @click="currentStep = 3" class="p-2 border-indigo-500"
                    :class="currentStep == 3 ? 'border border-b-0' : 'border-b'">Step 3 (IRL Information)</button>
                <div class="flex-grow border-b border-indigo-500"></div>
            </div>
            <form class="mt-2 text-gray-900 dark:text-white" method="POST" action="{{ route('account.store') }}">
                @csrf

                <div x-show="currentStep == 1">
                    <div>
                        @if (session('steam_id'))
                            <p class="text-lg text-green-600">Thank You! Please continue to step 2.</p>

                            <p>Steam Name: {{ session('steam_username') }}</p>
                            <p>Steam ID: {{ session('steam_id') }}</p>
                            <p>Steam Hex: {{ session('steam_hex') }}</p>
                        @else
                            <p class="text-lg text-red-600">You must complete this step before moving forward. Data entered
                                into Step 2 and 3 will be
                                deleted.</p>

                            <a href="{{ route('auth.steam') }}"
                                class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-900 border border-transparent rounded-md hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:shadow-outline-green disabled:opacity-25">
                                Link Steam Account</a>
                        @endif

                    </div>
                </div>
                <div x-show="currentStep == 2">
                    <p class="text-lg">Names that you would like to see in the CAD/Website.</p>

                    <div>
                        <label for="display_name" class="block mt-3 text-black-500">Display Name</label>
                        <input type="text" name="display_name" value="{{ old('display_name') }}"
                            class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                        <x-input-error :messages="$errors->get('display_name')" class="mt-2" />
                    </div>
                    <div>
                        <label for="officer_name" class="block mt-3 text-black-500">Officer Name</label>
                        <input type="text" name="officer_name" value="{{ old('officer_name') }}"
                            class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                        <x-input-error :messages="$errors->get('officer_name')" class="mt-2" />
                    </div>
                    <div>
                        <label for="ts_name" class="block mt-3 text-black-500">Teamspeak Name</label>
                        <input type="text" name="ts_name" value="{{ old('ts_name') }}"
                            class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                        <x-input-error :messages="$errors->get('ts_name')" class="mt-2" />
                    </div>

                </div>

                <div x-show="currentStep == 3">
                    <p class="text-lg">We do not share this information with anyone outside of Admins and Recruiters. Review
                        the Privacy Policy below.</p>
                    <div>
                        <label for="real_name" class="block mt-3 text-black-500">Real Name <span
                                class="text-red-600">*</span></label>
                        <input type="text" name="real_name" value="{{ old('real_name') }}"
                            class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                        <x-input-error :messages="$errors->get('real_name')" class="mt-2" />
                    </div>
                    <div>
                        <label for="email" class="block mt-3 text-black-500">Email <span
                                class="text-red-600">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <label for="birthday" class="block mt-3 text-black-500">When is your birthday? <span
                                class="text-red-600">*</span></label>
                        <input type="date" name="birthday" value="{{ old('birthday') }}"
                            class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" />
                        <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                    </div>

                </div>

                <div class="form-group">
                    <button type="button" x-show="currentStep < 3" @click="currentStep++"
                        class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-900 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                        Next
                    </button>
                    <button type="submit" x-show="currentStep == 3"
                        class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-900 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                        Submit Account
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection

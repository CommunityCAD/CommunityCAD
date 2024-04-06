@extends('layouts.public')

@section('content')
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <h2 class="text-2xl font-bold dark:text-gray-200">Create an Account</h2>

        <div class="w-full px-6 py-8 mt-6 mb-6 overflow-hiddenshadow-md bg-[#124559] sm:max-w-2xl sm:rounded-lg "
            x-data="{
                currentStep: 1
            }">
            <div class="flex text-white">

                @if (session('steam_id'))
                    <button :class="currentStep == 1 ? 'border border-b-0' : 'border-b'" @click="currentStep = 1"
                        class="flex items-center p-2 text-green-400 border-indigo-500" type="button">Step 1 (Link Steam)
                        <svg class="w-4 h-4 ml-3" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                    </button>
                @else
                    <button :class="currentStep == 1 ? 'border border-b-0' : 'border-b'" @click="currentStep = 1"
                        class="p-2 border-indigo-500" type="button">Step 1 (Link Steam)</button>
                @endif

                @if ($errors->has(['display_name', 'officer_name', 'ts_name']))
                    <button :class="currentStep == 2 ? 'border border-b-0' : 'border-b'" @click="currentStep = 2"
                        class="flex items-center p-2 text-red-400 border-indigo-500" type="button">Step 2 (IG Names)
                        <svg class="w-4 h-4 ml-3" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                @elseif($errors->all())
                    <button :class="currentStep == 2 ? 'border border-b-0' : 'border-b'" @click="currentStep = 2"
                        class="flex items-center p-2 text-green-400 border-indigo-500" type="button">Step 2 (IG Names)
                        <svg class="w-4 h-4 ml-3" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                @else
                    <button :class="currentStep == 2 ? 'border border-b-0' : 'border-b'" @click="currentStep = 2"
                        class="p-2 border-indigo-500" type="button">Step 2 (IG Names)</button>
                @endif

                @if ($errors->hasAny(['real_name', 'birthday', 'email']))
                    <button :class="currentStep == 3 ? 'border border-b-0' : 'border-b'" @click="currentStep = 3"
                        class="flex items-center p-2 text-red-400 border-indigo-500" type="button">Step 3 (IRL Information)
                        <svg class="w-4 h-4 ml-3" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </button>
                @else
                    <button :class="currentStep == 3 ? 'border border-b-0' : 'border-b'" @click="currentStep = 3"
                        class="p-2 border-indigo-500" type="button">Step 3 (IRL Information)</button>
                @endif

                <div class="flex-grow border-b border-indigo-500"></div>
            </div>
            <form action="{{ route('account.store') }}" class="mt-2 text-white" method="POST">
                @csrf

                <div x-show="currentStep == 1">
                    <div>
                        @if (session('steam_id'))
                            <p class="text-lg text-green-600">Thank You! Please continue to step 2.</p>

                            <p>Steam Name: {{ session('steam_username') }}</p>
                            <p>Steam ID: {{ session('steam_id') }}</p>
                            <p>Steam Hex: {{ session('steam_hex') }}</p>
                        @else
                            @if (get_setting('force_steam_link'))
                                <p class="text-lg text-red-400">You must complete this step before moving forward. Data
                                    entered
                                    into Step 2 and 3 will be
                                    deleted.</p>
                            @else
                                <p class="text-lg text-white">If you wish to add your steam information to help with our CAD
                                    system please link below first. If not you can safely skip this step.</p>
                            @endif

                            <a class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-900 border border-transparent rounded-md hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:shadow-outline-green disabled:opacity-25"
                                href="{{ route('auth.steam') }}">
                                Link Steam Account</a>
                        @endif

                    </div>
                </div>
                <div x-show="currentStep == 2">
                    <p class="text-lg">Names that you would like to use in the CAD/Website.</p>

                    <div>
                        <label class="block mt-3" for="display_name">Display Name</label>
                        <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="display_name"
                            type="text" value="{{ old('display_name') }}" />
                        <x-input-error :messages="$errors->get('display_name')" class="mt-2" />
                    </div>
                </div>

                <div x-show="currentStep == 3">
                    <p class="text-lg">We do not share this information with anyone outside of Admins and Recruiters. Email
                        is required to log into the CAD in-game.</p>
                    <div>
                        <label class="block mt-3 text-black-500" for="email">Email <span
                                class="text-red-600">*</span></label>
                        <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="email"
                            type="email" value="{{ old('email') }}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <label class="block mt-3 text-black-500" for="birthday">When is your birthday? <span
                                class="text-red-600">*</span></label>
                        <input class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" name="birthday"
                            type="date" value="{{ old('birthday') }}" />
                        <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                    </div>

                </div>

                <div class="form-group">
                    <button @click="currentStep++"
                        class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-[#01161e] border border-transparent rounded-md hover:opacity-70"
                        type="button" x-show="currentStep < 3">
                        Next
                    </button>
                    <button
                        class="inline-flex items-center h-full px-4 py-2 mt-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-[#01161e] border border-transparent rounded-md hover:opacity-70"
                        type="submit" x-show="currentStep == 3">
                        Create Account
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection

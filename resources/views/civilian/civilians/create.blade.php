@extends('layouts.civilian')

@section('content')
    <div class="container max-w-4xl p-4 mx-auto mt-2">
        <h2 class="my-2 text-2xl text-white border-b-2">Create Civilian</h2>
        <form action="{{ route('civilian.civilians.store') }}" method="POST" class="flex flex-wrap -mx-4">
            @csrf

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="first_name" class="block mb-3 text-base font-medium text-white">
                        First Name
                    </label>
                    <input type="text" placeholder="John" name="first_name" value="{{ old('first_name') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="last_name" class="block mb-3 text-base font-medium text-white">
                        Last Name
                    </label>
                    <input type="text" placeholder="Doe" name="last_name" value="{{ old('last_name') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="date_of_birth" class="block mb-3 text-base font-medium text-white">
                        Date of Birth
                    </label>
                    <input type="date" placeholder="mm/dd/yyyy" name="date_of_birth" value="{{ old('date_of_birth') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4">
                <div class="mb-6">
                    <label for="picture" class="block mb-3 text-base font-medium text-white">
                        Image URL <span class="text-gray-400">(optional)</span>
                    </label>
                    <input type="text" placeholder="https://cdn.discordapp.com/..." name="picture"
                        value="{{ old('picture') }}" class="text-input" />
                    <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                </div>
            </div>



            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="gender" class="block mb-3 text-base font-medium text-white">
                        Gender
                    </label>
                    <div class="relative">
                        <select name="gender" class="select-input">
                            <option value="">Choose one</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected="selected"' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected="selected"' : '' }}>Female
                            </option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected="selected"' : '' }}>Other
                            </option>
                        </select>
                        <span
                            class="border-body-color absolute right-4 top-1/2 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2">
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="race" class="block mb-3 text-base font-medium text-white">
                        Race
                    </label>
                    <div class="relative">
                        <select name="race" class="select-input">
                            <option value="">Choose one</option>
                            <option value="White" {{ old('race') == 'White' ? 'selected="selected"' : '' }}>White</option>
                            <option value="Asian" {{ old('race') == 'Asian' ? 'selected="selected"' : '' }}>Asian</option>
                            <option value="African American"
                                {{ old('race') == 'African American' ? 'selected="selected"' : '' }}>African American
                            </option>
                        </select>
                        <span
                            class="border-body-color absolute right-4 top-1/2 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2">
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('race')" class="mt-2" />

                </div>

            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="occupation" class="block mb-3 text-base font-medium text-white">
                        Occupation <span class="text-gray-400">(optional)</span>
                    </label>
                    <input type="text" placeholder="Farmer" name="occupation" value="{{ old('occupation') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('occupation')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label for="height" class="block mb-3 text-base font-medium text-white">
                        Height
                    </label>
                    <input type="number" placeholder="512" name="height" value="{{ old('height') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('height')" class="mt-2" />

                </div>

            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label for="weight" class="block mb-3 text-base font-medium text-white">
                        Weight
                    </label>
                    <input type="number" placeholder="250" name="weight" value="{{ old('weight') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('weight')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="postal" class="block mb-3 text-base font-medium text-white">
                        Postal
                    </label>
                    <input type="text" placeholder="123" name="postal" value="{{ old('postal') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('postal')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="street" class="block mb-3 text-base font-medium text-white">
                        Street
                    </label>
                    <input type="text" placeholder="Route 68" name="street" value="{{ old('street') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('street')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="city" class="block mb-3 text-base font-medium text-white">
                        City
                    </label>
                    <input type="text" placeholder="Sandy Shores" name="city" value="{{ old('city') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4">
                <div class="mb-6 space-y-3">
                    <button class="inline-block w-full mr-5 md:w-1/4 new-button-md">Create</button>
                    <a href="{{ route('civilian.civilians.index') }}"
                        class="w-full mr-5 md:w-1/4 delete-button-md">Cancel</a>
                    @if (!empty(get_setting('postal_map_link')))
                        <a href="{{ get_setting('postal_map_link') }}" target="_blank"
                            class="w-full md:w-1/4 secondary-button-md">
                            Link to postal map
                        </a>
                    @endif
                </div>
            </div>
        </form>

    </div>
@endsection

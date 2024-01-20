@extends('layouts.civilian')

@section('content')
    <div class="card">
        <h2 class="my-2 text-2xl text-white border-b-2">Create Civilian</h2>
        <form action="{{ route('civilian.civilians.store') }}" class="flex flex-wrap -mx-4" method="POST">
            @csrf

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="first_name">
                        First Name
                    </label>
                    <input class="text-input" name="first_name" placeholder="John" type="text"
                        value="{{ old('first_name') }}" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="last_name">
                        Last Name
                    </label>
                    <input class="text-input" name="last_name" placeholder="Doe" type="text"
                        value="{{ old('last_name') }}" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="date_of_birth">
                        Date of Birth
                    </label>
                    <input class="text-input" name="date_of_birth" placeholder="mm/dd/yyyy" type="date"
                        value="{{ old('date_of_birth') }}" />
                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="picture">
                        Image URL <span class="text-gray-400">(optional)</span>
                    </label>
                    <input class="text-input" name="picture" placeholder="https://cdn.discordapp.com/..." type="text"
                        value="{{ old('picture') }}" />
                    <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="gender">
                        Gender
                    </label>
                    <div class="relative">
                        <select class="select-input" name="gender">
                            <option value="">Choose one</option>
                            <option {{ old('gender') == 'Male' ? 'selected="selected"' : '' }} value="Male">Male</option>
                            <option {{ old('gender') == 'Female' ? 'selected="selected"' : '' }} value="Female">Female
                            </option>
                            <option {{ old('gender') == 'Other' ? 'selected="selected"' : '' }} value="Other">Other
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
                    <label class="block text-base font-medium text-white" for="race">
                        Race
                    </label>
                    <div class="relative">
                        <select class="select-input" name="race">
                            <option value="">Choose one</option>
                            <option {{ old('race') == 'White' ? 'selected="selected"' : '' }} value="White">White</option>
                            <option {{ old('race') == 'Asian' ? 'selected="selected"' : '' }} value="Asian">Asian</option>
                            <option {{ old('race') == 'African American' ? 'selected="selected"' : '' }}
                                value="African American">African American
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
                    <label class="block text-base font-medium text-white" for="occupation">
                        Occupation <span class="text-gray-400">(optional)</span>
                    </label>
                    <input class="text-input" name="occupation" placeholder="Farmer" type="text"
                        value="{{ old('occupation') }}" />
                    <x-input-error :messages="$errors->get('occupation')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="height">
                        Height
                    </label>
                    <select class="select-input" name="height">
                        <?php
                        for ($foot = 4; $foot <= 7; $foot++) {
                            for ($inches = 0; $inches <= 11; $inches++) {
                                $inch = $foot * 12 + $inches;
                                $cm = round($inch * 2.54);
                            }
                        }
                        ?>

                        @if ($inches == 0)
                            <option @selected(old('height') == $inch) value="{{ $inch }}">{{ $foot }}'
                                ({{ $cm }} cm)</option>
                        @else
                            <option @selected(old('height') == $inch) value="{{ $inch }}">{{ $foot }}'
                                {{ $inches }}" ({{ $cm }} cm)</option>
                        @endif
                    </select>
                    <x-input-error :messages="$errors->get('height')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="weight">
                        Weight
                    </label>
                    <select class="select-input" name="weight">
                        <?php
                        for ($weight = 90; $weight <= 450; $weight += 5) {
                            $kg = round($weight / 2.205);
                        }
                        ?>
                        <option @selected(old('weight') == $weight) value="{{ $weight }}">{{ $weight }} lb
                            ({{ $kg }} kg)</option>
                    </select>
                    <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="postal">
                        Postal
                    </label>
                    <input class="text-input" name="postal" placeholder="123" type="text"
                        value="{{ old('postal') }}" />
                    <x-input-error :messages="$errors->get('postal')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="street">
                        Street
                    </label>
                    <input class="text-input" name="street" placeholder="Route 68" type="text"
                        value="{{ old('street') }}" />
                    <x-input-error :messages="$errors->get('street')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="city">
                        City
                    </label>
                    <input class="text-input" name="city" placeholder="Sandy Shores" type="text"
                        value="{{ old('city') }}" />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />

                </div>
            </div>

            @if (!empty($available_user_departments))
                <div class="w-full px-4 md:w-1/2">
                    <div class="mb-6">
                        <label class="block text-base font-medium text-white" for="is_officer">
                            Is this civilian for a LEO or Fire/EMS department?
                        </label>
                        <select class="select-input" name="is_officer">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <x-input-error :messages="$errors->get('is_officer')" class="mt-2" />
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <div class="mb-6">
                        <label class="block text-base font-medium text-white" for="user_department_id">
                            What department is this civilian for?
                        </label>
                        <select class="select-input" name="user_department_id">
                            <option value="">Choose One</option>
                            @foreach ($available_user_departments as $user_department)
                                <option value="{{ $user_department->id }}">{{ $user_department->badge_number }} -
                                    {{ $user_department->rank }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('user_department_id')" class="mt-2" />
                    </div>
                </div>
            @endif

            <div class="w-full px-4">
                <div class="mb-6 space-y-3">
                    <button class="inline-block mr-5 new-button-md">Create</button>
                    <a class="mr-5 delete-button-md" href="{{ route('civilian.civilians.index') }}">Cancel</a>
                    @if (!empty(get_setting('postal_map_link')))
                        <a class="edit-button-md float-right" href="{{ get_setting('postal_map_link') }}"
                            target="_blank">
                            Postal Map
                        </a>
                    @endif
                </div>
            </div>
        </form>

    </div>
@endsection

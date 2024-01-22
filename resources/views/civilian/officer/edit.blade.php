@extends('layouts.civilian')

@section('content')
    <div class="card">
        <h2 class="my-2 text-2xl text-white border-b-2">Edit Officer: {{ $officer->name }}</h2>
        <form action="{{ route('civilian.officers.update', $officer->id) }}" class="flex flex-wrap -mx-4" method="POST">
            @csrf
            @method('put')

            <div class="w-full px-4">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="picture">
                        Image URL <span class="text-gray-400">(optional)</span>
                    </label>
                    <input class="text-input" name="picture" placeholder="https://cdn.discordapp.com/..." type="text"
                        value="{{ $officer->picture }}" />
                    <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="occupation">
                        Occupation <span class="text-gray-400">(optional)</span>
                    </label>
                    <input class="text-input" name="occupation" placeholder="Farmer" type="text"
                        value="{{ $officer->occupation }}" />
                    <x-input-error :messages="$errors->get('occupation')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="height">
                        Height
                    </label>
                    <select class="select-input" name="height">
                        @for ($foot = 4; $foot <= 7; $foot++)
                            @for ($inches = 0; $inches <= 11; $inches++)
                                @php
                                    $inch = $foot * 12 + $inches;
                                    $cm = round($inch * 2.54);
                                @endphp
                                @if ($inches == 0)
                                    <option @selected(old('height', $officer->height) == $inch) value="{{ $inch }}">{{ $foot }}'
                                        ({{ $cm }} cm)</option>
                                @else
                                    <option @selected(old('height', $officer->height) == $inch) value="{{ $inch }}">{{ $foot }}'
                                        {{ $inches }}" ({{ $cm }} cm)</option>
                                @endif
                            @endfor
                        @endfor

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
                        @for ($weight = 90; $weight <= 450; $weight += 5)
                            @php
                                $kg = round($weight / 2.205);
                            @endphp
                            <option @selected(old('weight', $officer->weight) == $weight) value="{{ $weight }}">{{ $weight }} lb
                                ({{ $kg }} kg)</option>
                        @endfor
                    </select>
                    <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="postal">
                        Postal
                    </label>
                    <input class="text-input" name="postal" placeholder="123" type="text"
                        value="{{ $officer->postal }}" />
                    <x-input-error :messages="$errors->get('postal')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="street">
                        Street
                    </label>
                    <input class="text-input" name="street" placeholder="Route 68" type="text"
                        value="{{ $officer->street }}" />
                    <x-input-error :messages="$errors->get('street')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="city">
                        City
                    </label>
                    <input class="text-input" name="city" placeholder="Sandy Shores" type="text"
                        value="{{ $officer->city }}" />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="user_department_id">
                        Transfer department
                    </label>
                    <p class="text-sm">Only change this is if you are switching departments.</p>
                    <select class="select-input" name="user_department_id">
                        <option value="{{ $officer->user_department->id }}">{{ $officer->user_department->badge_number }}
                            -
                            {{ $officer->user_department->rank }} - {{ $officer->user_department->department->name }}
                        </option>
                        @foreach ($available_user_departments as $user_department)
                            <option value="{{ $user_department->id }}">{{ $user_department->badge_number }} -
                                {{ $user_department->rank }} - {{ $user_department->department->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('user_department_id')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4">
                <div class="mb-6 space-y-3 flex justify-between items-center">
                    <button class="new-button-md">Save</button>
                    @if (empty(get_setting('postal_map_link')))
                        <a class="edit-button-md" href="{{ get_setting('postal_map_link') }}" target="_blank">
                            Postal Map
                        </a>
                    @endif
                    <a class="delete-button-md" href="{{ route('civilian.officers.show', $officer->id) }}">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.civilian')

@section('content')
    <div class="card">
        <h2 class="my-2 text-2xl text-white border-b-2">Edit Civilian: {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.civilians.update', $civilian->id) }}" class="flex flex-wrap -mx-4" method="POST">
            @csrf
            @method('put')

            <div class="w-full px-4 md:w-2/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="picture">
                        Image URL <span class="text-gray-400">(optional)</span>
                    </label>
                    <input class="text-input" name="picture" placeholder="https://www.fivemanage.com/upload..." type="text"
                        value="{{ old('picture') }}" />
                    <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="phone_number">
                        Phone Number <span class="text-gray-400">(optional)</span>
                    </label>
                    <input class="text-input" name="phone_number" placeholder="" type="text"
                        value="{{ old('phone_number') }}" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="occupation">
                        Occupation <span class="text-gray-400">(optional)</span>
                    </label>
                    <input class="text-input" name="occupation" placeholder="Farmer" type="text"
                        value="{{ old('occupation', $civilian->occupation) }}" />
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
                                    <option @selected(old('height', $civilian->height) == $inch) value="{{ $inch }}">{{ $foot }}'
                                        ({{ $cm }} cm)</option>
                                @else
                                    <option @selected(old('height', $civilian->height) == $inch) value="{{ $inch }}">{{ $foot }}'
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
                            <option @selected(old('weight', $civilian->weight) == $weight) value="{{ $weight }}">{{ $weight }} lb
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
                        value="{{ old('postal', $civilian->postal) }}" />
                    <x-input-error :messages="$errors->get('postal')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="street">
                        Street
                    </label>
                    <input class="text-input" name="street" placeholder="Route 68" type="text"
                        value="{{ old('street', $civilian->street) }}" />
                    <x-input-error :messages="$errors->get('street')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="city">
                        City
                    </label>
                    <input class="text-input" name="city" placeholder="Sandy Shores" type="text"
                        value="{{ old('city', $civilian->city) }}" />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />

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
                    <a class="delete-button-md" href="{{ route('civilian.civilians.show', $civilian->id) }}">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection

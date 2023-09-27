@extends('layouts.civilian')

@section('content')
    <div class="card">
        <h2 class="my-2 text-2xl text-white border-b-2">Edit Civilian: {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.civilians.update', $civilian->id) }}" class="flex flex-wrap -mx-4" method="POST">
            @csrf
            @method('put')

            <div class="w-full px-4">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="picture">
                        Image URL <span class="text-gray-400">(optional)</span>
                    </label>
                    <input class="text-input" name="picture" placeholder="https://cdn.discordapp.com/..." type="text"
                        value="{{ $civilian->picture }}" />
                    <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="occupation">
                        Occupation <span class="text-gray-400">(optional)</span>
                    </label>
                    <input class="text-input" name="occupation" placeholder="Farmer" type="text"
                        value="{{ $civilian->occupation }}" />
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
                        
                                $selected = '';
                                if ($inch == $civilian->height) {
                                    $selected = 'selected';
                                }
                        
                                if ($inches == 0) {
                                    echo "<option value='$inch' $selected> $foot' ($cm cm)</option>";
                                } else {
                                    echo "<option value='$inch' $selected>$foot' $inches\" ($cm cm) </option>";
                                }
                            }
                        }
                        ?>
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
                            $selected = '';
                            if ($weight == $civilian->weight) {
                                $selected = 'selected';
                            }
                            $kg = round($weight / 2.205);
                            echo "<option value='$weight' $selected>$weight lb ($kg kg) </option>";
                        }
                        ?>
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
                        value="{{ $civilian->postal }}" />
                    <x-input-error :messages="$errors->get('postal')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="street">
                        Street
                    </label>
                    <input class="text-input" name="street" placeholder="Route 68" type="text"
                        value="{{ $civilian->street }}" />
                    <x-input-error :messages="$errors->get('street')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="city">
                        City
                    </label>
                    <input class="text-input" name="city" placeholder="Sandy Shores" type="text"
                        value="{{ $civilian->city }}" />
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

@extends('layouts.civilian')

@section('content')
    <div class="container max-w-4xl p-4 mx-auto mt-2">
        <h2 class="my-2 text-2xl text-white border-b-2">Edit Civilian: {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.civilians.update', $civilian->id) }}" method="POST" class="flex flex-wrap -mx-4">
            @csrf
            @method('put')

            <div class="w-full px-4">
                <div class="mb-6">
                    <label for="picture" class="block mb-3 text-base font-medium text-white">
                        Image URL <span class="text-gray-400">(optional)</span>
                    </label>
                    <input type="text" placeholder="https://cdn.discordapp.com/..." name="picture"
                        value="{{ $civilian->picture }}" class="text-input" />
                    <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4">
                <div class="mb-6">
                    <label for="occupation" class="block mb-3 text-base font-medium text-white">
                        Occupation <span class="text-gray-400">(optional)</span>
                    </label>
                    <input type="text" placeholder="Farmer" name="occupation" value="{{ $civilian->occupation }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('occupation')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="postal" class="block mb-3 text-base font-medium text-white">
                        Postal
                    </label>
                    <input type="text" placeholder="123" name="postal" value="{{ $civilian->postal }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('postal')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="street" class="block mb-3 text-base font-medium text-white">
                        Street
                    </label>
                    <input type="text" placeholder="Route 68" name="street" value="{{ $civilian->street }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('street')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="city" class="block mb-3 text-base font-medium text-white">
                        City
                    </label>
                    <input type="text" placeholder="Sandy Shores" name="city" value="{{ $civilian->city }}"
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

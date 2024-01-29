@extends('layouts.civilian')

@section('content')
    <div class="card">
        <h2 class="my-2 text-2xl text-white border-b-2">Create Business</h2>
        <form action="{{ route('civilian.businesses.store') }}" class="flex flex-wrap -mx-4" method="POST">
            @csrf

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="name">
                        Business Name
                    </label>
                    <input class="text-input" name="name" placeholder="24/7" type="text" value="{{ old('name') }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="logo">
                        Logo
                    </label>
                    <input class="text-input" name="logo" placeholder="https://cdn.discordapp.com/..." type="url"
                        value="{{ old('logo') }}" />
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="about">
                        About
                    </label>
                    <input class="text-input" name="about" type="text" value="{{ old('about') }}" />
                    <x-input-error :messages="$errors->get('about')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="owner_id">
                        Owner
                    </label>
                    <div class="relative">
                        <select class="select-input" name="owner_id">
                            <option value="">Choose one</option>
                            @foreach ($civilians as $civilian)
                                <option @selected(old('owner_id') == $civilian->id) value="{{ $civilian->id }}">{{ $civilian->name }}
                                </option>
                            @endforeach

                        </select>
                        <span
                            class="border-body-color absolute right-4 top-1/2 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2">
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('owner_id')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="postal">
                        Postal
                    </label>
                    <input class="text-input" name="postal" placeholder="123" type="number" value="{{ old('postal') }}" />
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

            <div class="w-full px-4">
                <div class="mb-6 space-y-3">
                    <button class="inline-block mr-5 new-button-md">Create</button>
                    <a class="mr-5 delete-button-md" href="{{ route('civilian.businesses.index') }}">Cancel</a>
                    @if (!empty(get_setting('postal_map_link')))
                        <a class="edit-button-md float-right" href="{{ get_setting('postal_map_link') }}" target="_blank">
                            Postal Map
                        </a>
                    @endif
                </div>
            </div>
        </form>

    </div>
@endsection

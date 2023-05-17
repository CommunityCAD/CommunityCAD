@extends('layouts.civilian')

@section('content')
    <div class="container max-w-4xl p-4 mx-auto mt-2">
        <h2 class="my-2 text-2xl text-white border-b-2">New Vehicle for {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.vehicle.store', $civilian->id) }}" method="POST" class="flex flex-wrap -mx-4">
            @csrf

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="plate" class="block mb-3 text-base font-medium text-white">
                        Plate
                    </label>
                    <input type="text" placeholder="ABC 123" name="plate" value="{{ old('plate') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('plate')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="model" class="block mb-3 text-base font-medium text-white">
                        Make and Model
                    </label>
                    <input type="text" placeholder="Ford F150" name="model" value="{{ old('model') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('model')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="color" class="block mb-3 text-base font-medium text-white">
                        Color
                    </label>
                    <input type="text" placeholder="Black" name="color" value="{{ old('color') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('color')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label for="vehicle_status" class="block mb-3 text-base font-medium text-white">
                        Status
                    </label>
                    <div class="relative">
                        <select name="vehicle_status" class="select-input">
                            <option value="">Choose one</option>
                            <option value="1" {{ old('vehicle_status') == 1 ? 'selected' : '' }}>Valid</option>
                            <option value="2" {{ old('vehicle_status') == 2 ? 'selected' : '' }}>Stolen</option>
                            <option value="3" {{ old('vehicle_status') == 3 ? 'selected' : '' }}>Impounded
                            </option>
                            <option value="4" {{ old('vehicle_status') == 4 ? 'selected' : '' }}>Booted
                            </option>
                            <option value="5" {{ old('vehicle_status') == 5 ? 'selected' : '' }}>Expired
                            </option>
                        </select>
                        <span
                            class="border-body-color absolute right-4 top-1/2 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2">
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('vehicle_status')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <p class="text-white">This sets the inital vehicle status. Some statuses can not be changed without
                        going
                        to
                        the DMV.</p>
                </div>
            </div>


            <div class="w-full px-4">
                <div class="mb-6 space-y-3">
                    <button class="inline-block w-full mr-5 md:w-1/4 new-button-md">Create</button>
                    <a href="{{ route('civilian.civilians.show', $civilian->id) }}"
                        class="w-full mr-5 md:w-1/4 delete-button-md">Cancel</a>
                </div>
            </div>
        </form>

    </div>
@endsection

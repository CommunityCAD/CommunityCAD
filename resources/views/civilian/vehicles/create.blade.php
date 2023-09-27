@extends('layouts.civilian')

@section('content')
    <div class="card">
        <h2 class="my-2 text-2xl text-white border-b-2">New Vehicle for {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.vehicle.store', $civilian->id) }}" class="flex flex-wrap -mx-4" method="POST">
            @csrf

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="plate">
                        Plate
                    </label>
                    <input class="text-input" name="plate" placeholder="ABC 123" type="text"
                        value="{{ old('plate') }}" />
                    <x-input-error :messages="$errors->get('plate')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="model">
                        Make and Model
                    </label>
                    <input class="text-input" name="model" placeholder="Ford F150" type="text"
                        value="{{ old('model') }}" />
                    <x-input-error :messages="$errors->get('model')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="color">
                        Color
                    </label>
                    <input class="text-input" name="color" placeholder="Black" type="text"
                        value="{{ old('color') }}" />
                    <x-input-error :messages="$errors->get('color')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label class="block text-base font-medium text-white" for="vehicle_status">
                        Status
                    </label>
                    <div class="relative">
                        <select class="select-input" name="vehicle_status">
                            <option value="">Choose one</option>
                            <option {{ old('vehicle_status') == 1 ? 'selected' : '' }} value="1">Valid</option>
                            <option {{ old('vehicle_status') == 2 ? 'selected' : '' }} value="2">Stolen</option>
                            <option {{ old('vehicle_status') == 3 ? 'selected' : '' }} value="3">Impounded
                            </option>
                            <option {{ old('vehicle_status') == 4 ? 'selected' : '' }} value="4">Booted
                            </option>
                            <option {{ old('vehicle_status') == 5 ? 'selected' : '' }} value="5">Expired
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
                <div class="mb-6 space-y-3 flex justify-between items-center">
                    <button class="new-button-md">Create</button>
                    <a class="delete-button-md" href="{{ route('civilian.civilians.show', $civilian->id) }}">Cancel</a>
                </div>
            </div>
        </form>

    </div>
@endsection

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
                        class="border-form-stroke focus:border-blue-400 focus:border-2 w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none transition" />
                    <x-input-error :messages="$errors->get('plate')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="model" class="block mb-3 text-base font-medium text-white">
                        Make and Model
                    </label>
                    <input type="text" placeholder="Ford F150" name="model" value="{{ old('model') }}"
                        class="border-form-stroke focus:border-blue-400 focus:border-2 w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none transition" />
                    <x-input-error :messages="$errors->get('model')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="color" class="block mb-3 text-base font-medium text-white">
                        Color
                    </label>
                    <input type="text" placeholder="Black" name="color" value="{{ old('color') }}"
                        class="border-form-stroke focus:border-blue-400 focus:border-2 w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none transition" />
                    <x-input-error :messages="$errors->get('color')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2">
                <div class="mb-6">
                    <label for="vehicle_status" class="block mb-3 text-base font-medium text-white">
                        Status
                    </label>
                    <div class="relative">
                        <select name="vehicle_status"
                            class="cursor-pointer border-form-stroke text-body-color focus:border-primary active:border-primary w-full appearance-none rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none transition">
                            <option value="">Choose one</option>
                            <option value="1" {{ old('vehicle_status') == 'Valid' ? 'selected' : '' }}>Valid</option>
                            <option value="2" {{ old('vehicle_status') == 'Stolen' ? 'selected' : '' }}>Stolen</option>
                            <option value="3" {{ old('vehicle_status') == 'Impounded' ? 'selected' : '' }}>Impounded
                            </option>
                            <option value="4" {{ old('vehicle_status') == 'Booted' ? 'selected' : '' }}> Booted
                            </option>
                            <option value="5" {{ old('vehicle_status') == 'Expired' ? 'selected' : '' }}>Expired
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


            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <input type="Submit" value="Create"
                        class="inline-block px-4 py-2 text-white rounded-lg cursor-pointer bg-slate-700 hover:bg-slate-600" />
                </div>
            </div>
        </form>

        <a href="{{ route('civilian.civilians.show', $civilian->id) }}"
            class="inline-block px-4 py-2 text-white bg-red-700 rounded-lg cursor-pointer hover:bg-red-600">Cancel</a>

    </div>
@endsection

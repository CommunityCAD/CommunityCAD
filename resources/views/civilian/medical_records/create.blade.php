@extends('layouts.civilian')

@section('content')
    <div class="container max-w-4xl p-4 mx-auto mt-2">
        <h2 class="my-2 text-2xl text-white border-b-2">New Medical Record for {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.medical_record.store', $civilian->id) }}" method="POST" class="flex flex-wrap -mx-4">
            @csrf



            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="type" class="block mb-3 text-base font-medium text-white">
                        Type
                    </label>
                    <div class="relative">
                        <select name="name" class="select-input">
                            <option value="">Choose one</option>
                            <option value="Allergy" {{ old('name') == 'Allergy' ? 'selected' : '' }}>Allergy</option>
                            <option value="Blood Type" {{ old('name') == 'Blood Type' ? 'selected' : '' }}>Blood Type
                            </option>
                            <option value="Medications" {{ old('name') == 'Medications' ? 'selected' : '' }}>Medications
                            </option>
                            <option value="Health Conditions" {{ old('name') == 'Health Conditions' ? 'selected' : '' }}>
                                Health
                                Conditions</option>
                            <option value="Other" {{ old('name') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="value" class="block mb-3 text-base font-medium text-white">
                        Value
                    </label>
                    <input type="text" placeholder="Peanuts" name="value" value="{{ old('value') }}"
                        class="text-input" />
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <p></p>
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

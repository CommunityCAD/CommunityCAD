@extends('layouts.civilian')

@section('content')
    <div class="card">
        <h2 class="my-2 text-2xl text-white border-b-2">New Medical Record for {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.medical_record.store', $civilian->id) }}" class="flex flex-wrap -mx-4" method="POST">
            @csrf

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="type">
                        Type
                    </label>
                    <div class="relative">
                        <select class="select-input" name="name">
                            <option value="">Choose one</option>
                            <option {{ old('name') == 'Allergy' ? 'selected' : '' }} value="Allergy">Allergy</option>
                            <option {{ old('name') == 'Blood Type' ? 'selected' : '' }} value="Blood Type">Blood Type
                            </option>
                            <option {{ old('name') == 'Medications' ? 'selected' : '' }} value="Medications">Medications
                            </option>
                            <option {{ old('name') == 'Health Conditions' ? 'selected' : '' }} value="Health Conditions">
                                Health
                                Conditions</option>
                            <option {{ old('name') == 'Other' ? 'selected' : '' }} value="Other">Other</option>
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="value">
                        Value
                    </label>
                    <input class="text-input" name="value" placeholder="Peanuts" type="text"
                        value="{{ old('value') }}" />
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <p></p>
            </div>

            <div class="w-full px-4">
                <div class="mb-6 space-y-3 flex justify-between items-center">
                    <button class="inline-block mr-5 new-button-md">Create</button>
                    <a class=" mr-5 delete-button-md"
                        href="{{ route('civilian.civilians.show', $civilian->id) }}">Cancel</a>
                </div>
            </div>
        </form>

    </div>
@endsection

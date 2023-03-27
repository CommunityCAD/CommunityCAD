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
                        <select name="name"
                            class="cursor-pointer border-form-stroke text-body-color focus:border-primary active:border-primary w-full appearance-none rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none transition">
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
                        <span
                            class="border-body-color absolute right-4 top-1/2 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2">
                        </span>
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
                        class="border-form-stroke focus:border-blue-400 focus:border-2 w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none transition" />
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <p></p>
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

@extends('layouts.civilian')

@section('content')
    <div class="card">
        <h1 class="text-2xl font-bold">New 911 Call</h1>
        <form action="{{ route('civilian.call.store', $civilian->id) }}" class="p-4 mt-5 space-y-3 text-white cursor-default"
            method="POST">
            @csrf
            <div class="flex items-center">
                <div class="w-4/5">
                    <label class="block mr-2 text-lg">Type of Call:</label>
                    <select class="select-input" name="nature">
                        @foreach ($call_natures as $code => $props)
                            <option value="{{ $code }}">{{ $props['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/3 ml-3">
                    <label class="block mr-2 text-lg">Who do you Need?</label>
                    <select class="select-input" name="type">
                        <option value="1">Police</option>
                        <option value="2">Fire</option>
                        <option value="3">EMS</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center">
                <div class="w-3/5">
                    <label class="block mr-2 text-lg">Where is the emergency? <p class="text-sm">Must include postal and
                            street
                            name.</p></label>
                    <input class="text-input" name="location" placeholder="123 E Joshua" type="text"
                        value="{{ old('location') }}">
                </div>
                <div class="w-2/5 ml-3">
                    <label class="block mr-2 text-lg">City:</label>
                    <input class="text-input" name="city" placeholder="Sandy Shores" type="text"
                        value="{{ old('city') }}">
                </div>
            </div>

            <div class="flex items-center">
                <div class="w-full">
                    <label class="block mr-2 text-lg">What is going on?<p class="text-sm">Please write in rp just like
                            talking to an operator.</p></label>
                    <textarea class="textarea-input" name="narrative">{{ old('narrative') }}</textarea>
                    <x-input-error :messages="$errors->get('narrative')" class="mt-2" />

                </div>
            </div>

            <h1 class="text-xl font-semibold my-4">Reporting Persons</h1>
            <div class="flex items-center">
                <div class="w-2/3">
                    <label class="block mr-2 text-lg">Are you wanting to call anonymously?</label>
                    <select class="select-input" name="civilian_id">
                        <option value="{{ $civilian->id }}">No</option>
                        <option value="">Yes</option>
                    </select>
                </div>
                <div class="w-1/3 ml-3">
                    <p>Currently calling as:</p>
                    <p class="font-bold text-xl">{{ $civilian->name }}</p>
                </div>
            </div>

            <button class="button-md bg-green-600 hover:bg-green-500 text-white" type="submit">Create Call</button>

        </form>
    </div>
@endsection

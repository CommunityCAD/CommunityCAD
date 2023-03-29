@extends('layouts.civilian')

@section('content')
    <div class="container max-w-4xl p-4 mx-auto mt-2">
        <h2 class="my-2 text-2xl text-white border-b-2">New Weapon for {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.weapon.store', $civilian->id) }}" method="POST" class="flex flex-wrap -mx-4">
            @csrf
            <div class="w-full px-4">
                <div class="mb-6">
                    <label for="model" class="block mb-3 text-base font-medium text-white">
                        Model
                    </label>
                    <input type="text" placeholder="Glock 17" name="model" value="{{ old('model') }}"
                        class="border-form-stroke focus:border-blue-400 focus:border-2 w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none transition" />
                    <x-input-error :messages="$errors->get('model')" class="mt-2" />
                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <input type="Submit" value="Create" class="secondary-button-md" />
                </div>
            </div>
        </form>

        <a href="{{ route('civilian.civilians.show', $civilian->id) }}" class="delete-button-md">Cancel</a>

    </div>
@endsection

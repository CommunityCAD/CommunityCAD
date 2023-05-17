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
                        class="text-input" />
                    <x-input-error :messages="$errors->get('model')" class="mt-2" />
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

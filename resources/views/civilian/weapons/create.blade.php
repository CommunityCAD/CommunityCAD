@extends('layouts.civilian')

@section('content')
    <div class="card">
        <h2 class="my-2 text-2xl text-white border-b-2">New Weapon for {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.weapon.store', $civilian->id) }}" class="flex flex-wrap -mx-4" method="POST">
            @csrf
            <div class="w-full px-4">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="model">
                        Model
                    </label>
                    <input class="text-input" name="model" placeholder="Glock 17" type="text"
                        value="{{ old('model') }}" />
                    <x-input-error :messages="$errors->get('model')" class="mt-2" />
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

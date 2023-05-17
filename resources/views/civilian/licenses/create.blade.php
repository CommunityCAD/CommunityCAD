@extends('layouts.civilian')

@section('content')
    <div class="container max-w-4xl p-4 mx-auto mt-2">
        <h2 class="my-2 text-2xl text-white border-b-2">New License for {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.license.store', $civilian->id) }}" method="POST" class="flex flex-wrap -mx-4">
            @csrf

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="type" class="block mb-3 text-base font-medium text-white">
                        Type
                    </label>
                    <div class="relative">
                        <select name="type" class="select-input">
                            <option value="">Choose one</option>
                            @foreach ($available_licenses as $name => $id)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label for="status" class="block mb-3 text-base font-medium text-white">
                        Status
                    </label>
                    <div class="relative">
                        <select name="status" class="select-input">
                            <option value="">Choose one</option>
                            <option value="1">Valid</option>
                            <option value="2">Expired</option>
                            <option value="3">Suspended</option>
                            <option value="4">Revoked</option>
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <p class="text-white">This sets the inital license type. Some types can not be changed without going to
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

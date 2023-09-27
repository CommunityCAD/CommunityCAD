@extends('layouts.civilian')

@section('content')
    <div class="card">
        <h2 class="my-2 text-2xl text-white border-b-2">New License for {{ $civilian->name }}</h2>
        <form action="{{ route('civilian.license.store', $civilian->id) }}" class="flex flex-wrap -mx-4" method="POST">
            @csrf

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="type">
                        Type
                    </label>
                    <div class="relative">
                        <select class="select-input" name="license_type_id">
                            <option value="">Choose one</option>
                            @foreach ($available_licenses as $license)
                                <option value="{{ $license->id }}">{{ $license->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('license_type_id')" class="mt-2" />

                </div>
            </div>

            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-6">
                    <label class="block mb-3 text-base font-medium text-white" for="status">
                        Status
                    </label>
                    <div class="relative">
                        <select class="select-input" name="status">
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
                <div class="mb-6 space-y-3 flex justify-between">
                    <button class="inline-block mr-5 new-button-md items-center">Create</button>
                    <a class="mr-5 delete-button-md" href="{{ route('civilian.civilians.show', $civilian->id) }}">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection

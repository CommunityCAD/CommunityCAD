@extends('layouts.admin')

@section('content')
    <nav aria-label="Breadcrumb" class="flex justify-between mb-4 border-b border-gray-700">
        <div class="">
            <p class="text-lg dark:text-white">Edit Member Status: {{ $user->preferred_name }}</p>
        </div>
    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <div class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden shadow-md bg-[#124559] sm:max-w-4xl sm:rounded-lg text-white">
            <p>This should only be used in a last resort. Use the correct system process to complete account status updates.
            </p>

            <form action="{{ route('admin.users.status.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="block mt-3 text-black-500" for="account_status">Status <span
                        class="text-red-600">*</span></label>
                <div class="mt-3 space-y-2">

                    <select class="select-input" id="account_status" name="account_status">

                        @foreach ($statuses as $id => $name)
                            @if ($user->account_status === $id)
                                <option selected value="{{ $id }}">{{ $name }} (Current Status)</option>
                            @else
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <input class="px-2 py-1 mt-4 bg-blue-500 rounded hover:bg-blue-600" type="submit" value="Save Status">
            </form>
        </div>

    </div>
@endsection

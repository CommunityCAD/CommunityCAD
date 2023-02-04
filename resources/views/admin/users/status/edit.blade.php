@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg text-white">Edit Member Status: {{ $user->discord }}</p>
        </div>

        @livewire('breadcrumbs', ['paths' => [['href' => route('admin.users.index'), 'text' => 'All Members'], ['href' => route('admin.users.show', $user->id), 'text' => $user->discord]]])

    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
        <div
            class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md dark:bg-[#124559] sm:max-w-4xl sm:rounded-lg text-gray-900 dark:text-white">
            <p>This should only be used in a last resort. Use the correct system process to complete account status updates.
            </p>

            <form action="{{ route('admin.users.status.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="account_status" class="block mt-3 text-black-500">Status <span
                        class="text-red-600">*</span></label>
                <div class="mt-3 space-y-2">

                    <select name="account_status" id="account_status"
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">

                        @foreach ($statuses as $id => $name)
                            @if ($user->account_status === $id)
                                <option value="{{ $id }}" selected>{{ $name }} (Current Status)</option>
                            @else
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Save Status" class="px-2 py-1 mt-4 bg-blue-500 rounded hover:bg-blue-600">
            </form>
        </div>

    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Manage 10 Codes</h1>
        <p class="text-sm text-white"></p>
    </header>
    <div class="card">
        <div class="flex items-center justify-end mb-3">
            <div class="">
                <a class="new-button-sm" href="{{ route('admin.ten_code.create') }}">
                    <x-new-button></x-new-button>
                </a>
            </div>
        </div>
        <div x-data="{ 'ten_codes': false }">
            <div @click="ten_codes = !ten_codes" class="bg-gray-600 w-full p-3 cursor-pointer flex justify-between">
                <p class="text-white text-2xl">All Purpose 10 Codes</p>
                <p>
                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-show="ten_codes == false" xmlns="http://www.w3.org/2000/svg">
                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-show="ten_codes == true" xmlns="http://www.w3.org/2000/svg">
                        <path d="m4.5 15.75 7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </p>
            </div>
            @foreach ($ten_codes->where('type', 1) as $code)
                <div class="flex justify-between p-2" x-show="ten_codes">
                    <form action="{{ route('admin.ten_code.destroy', $code->id) }}" class="text-right" method="POST"
                        onsubmit="return confirm('Are you sure you wish to delete this code? This can\'t be undone!');">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button-md">
                            <x-delete-button></x-delete-button>
                        </button>
                    </form>
                    <p>{{ $code->code }}</p>
                    <p>{{ $code->meaning }}</p>
                    <p>{{ $code->code_type }}</p>
                </div>
            @endforeach
        </div>

        <div x-data="{ 'ten_codes': false }">
            <div @click="ten_codes = !ten_codes" class="bg-blue-600 w-full p-3 cursor-pointer flex justify-between">
                <p class="text-white text-2xl">LEO 10 Codes</p>
                <p>
                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-show="ten_codes == false" xmlns="http://www.w3.org/2000/svg">
                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-show="ten_codes == true" xmlns="http://www.w3.org/2000/svg">
                        <path d="m4.5 15.75 7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </p>
            </div>
            @foreach ($ten_codes->where('type', 2) as $code)
                <div class="flex justify-between p-2" x-show="ten_codes">
                    <form action="{{ route('admin.ten_code.destroy', $code->id) }}" class="text-right" method="POST"
                        onsubmit="return confirm('Are you sure you wish to delete this code? This can\'t be undone!');">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button-md">
                            <x-delete-button></x-delete-button>
                        </button>
                    </form>
                    <p>{{ $code->code }}</p>
                    <p>{{ $code->meaning }}</p>
                    <p>{{ $code->code_type }}</p>
                </div>
            @endforeach
        </div>

        <div x-data="{ 'ten_codes': false }">
            <div @click="ten_codes = !ten_codes" class="bg-red-600 w-full p-3 cursor-pointer flex justify-between">
                <p class="text-white text-2xl">Fire/EMS 10 Codes</p>
                <p>
                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-show="ten_codes == false" xmlns="http://www.w3.org/2000/svg">
                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-show="ten_codes == true" xmlns="http://www.w3.org/2000/svg">
                        <path d="m4.5 15.75 7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </p>
            </div>
            @foreach ($ten_codes->where('type', 3) as $code)
                <div class="flex justify-between p-2" x-show="ten_codes">
                    <form action="{{ route('admin.ten_code.destroy', $code->id) }}" class="text-right" method="POST"
                        onsubmit="return confirm('Are you sure you wish to delete this code? This can\'t be undone!');">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button-md">
                            <x-delete-button></x-delete-button>
                        </button>
                    </form>
                    <p>{{ $code->code }}</p>
                    <p>{{ $code->meaning }}</p>
                    <p>{{ $code->code_type }}</p>
                </div>
            @endforeach
        </div>

        <div x-data="{ 'ten_codes': false }">
            <div @click="ten_codes = !ten_codes" class="bg-lime-600 w-full p-3 cursor-pointer flex justify-between">
                <p class="text-white text-2xl">Phonetics</p>
                <p>
                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-show="ten_codes == false" xmlns="http://www.w3.org/2000/svg">
                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-show="ten_codes == true" xmlns="http://www.w3.org/2000/svg">
                        <path d="m4.5 15.75 7.5-7.5 7.5 7.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </p>
            </div>
            @foreach ($ten_codes->where('type', 4) as $code)
                <div class="flex justify-between p-2" x-show="ten_codes">
                    <form action="{{ route('admin.ten_code.destroy', $code->id) }}" class="text-right" method="POST"
                        onsubmit="return confirm('Are you sure you wish to delete this code? This can\'t be undone!');">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button-md">
                            <x-delete-button></x-delete-button>
                        </button>
                    </form>
                    <p>{{ $code->code }}</p>
                    <p>{{ $code->meaning }}</p>
                    <p>{{ $code->code_type }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.cad_simple')

@section('content')
    <div class="text-white max-w-3xl mx-auto select-none p-4">
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
            @foreach ($codes->where('type', 1) as $code)
                <div class="flex justify-between"x-show="ten_codes">
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
            @foreach ($codes->where('type', 2) as $code)
                <div class="flex justify-between"x-show="ten_codes">
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
            @foreach ($codes->where('type', 3) as $code)
                <div class="flex justify-between"x-show="ten_codes">
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
            @foreach ($codes->where('type', 4) as $code)
                <div class="flex justify-between"x-show="ten_codes">
                    <p>{{ $code->code }}</p>
                    <p>{{ $code->meaning }}</p>
                    <p>{{ $code->code_type }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

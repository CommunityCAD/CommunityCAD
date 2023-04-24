@extends('layouts.portal')

@section('content')
    <nav class="flex justify-between mb-4 border-b border-gray-700" aria-label="Breadcrumb">
        <div class="">
            <p class="text-lg dark:text-white">All Members</p>
        </div>

        @livewire('breadcrumbs', ['paths' => []])

    </nav>
    <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">

        <div class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden shadow-md bg-[#124559] sm:max-w-4xl sm:rounded-lg text-white">
            <livewire:admin.users.search>
        </div>
    </div>
@endsection

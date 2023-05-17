@extends('layouts.portal')

@section('content')
    <div x-data="" class="text-white">
        <nav class="flex justify-between mb-4 border-b border-gray-700" aria-label="Breadcrumb">
            <div class="">
                <p class="text-lg dark:text-white">User Departments | {{ $user->discord }}</p>
            </div>

            @livewire('breadcrumbs', ['paths' => [['href' => route('admin.users.index'), 'text' => 'View All Members']]])
        </nav>

        <div class="w-full bg-[#124559] p-3 sm:mr-2 rounded-xl">
            <div class="flex items-center justify-between">
                <h2 class="mb-4 text-xl font-semibold">Departments</h2>
                @can('user_manage_departments')
                    <a href="{{ route('admin.users.departments.create', $user->id) }}" class="new-button-sm">
                        <x-new-button></x-new-button>
                    </a>
                @endcan
            </div>
            <div class="grid grid-cols-1 gap-5 mt-5 lg:grid-cols-2">
                @foreach ($user_departments as $user_department)
                    <div class="w-full bg-gray-600 secondary-button-md rounded-2xl">
                        <a href="{{ route('admin.users.departments.edit', [$user->id, $user_department->id]) }}"
                            class="">
                            <div class="flex items-center justify-between ml-3 text-white">
                                <div class="flex items-center">
                                    <img src="{{ $user_department->department->logo }}" class="w-20 h-20 mr-4"
                                        alt="">
                                    <div class="flex">
                                        <div>
                                            <p>{{ $user_department->department->name }}</p>
                                            <p class="-mt-1 text-xs">{{ $user_department->rank }}</p>
                                        </div>

                                    </div>
                                </div>
                                <div>
                                    {{ $user_department->badge_number }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>



    </div>
@endsection

@extends('layouts.portal')

@section('content')
    <div x-data="{ noteModal: false, accommodationModal: false, daModal: false, communityRankModal: false, rolesModal: false }" class="text-white">
        <nav class="flex justify-between mb-4 border-b border-gray-700" aria-label="Breadcrumb">
            <div class="">
                <p class="text-lg dark:text-white">User Profile | {{ $user->discord }}</p>
            </div>

            @livewire('breadcrumbs', ['paths' => [['href' => route('admin.users.index'), 'text' => 'View All Members']]])
        </nav>

        <div class="w-full bg-[#124559] p-3 sm:mr-2 rounded-xl">
            <div class="grid space-y-1 text-sm md:grid-cols-2">
                <div class="flex">
                    <p class="px-2 font-bold">Discord Name:</p>
                    <p class="px-2">{{ $user->discord }}</p>
                </div>
                <div class="flex">
                    <p class="px-2 font-bold">Real Name</p>
                    <p class="px-2">{{ $user->real_name }}</p>
                </div>
                <div class="flex">
                    <p class="px-2 font-bold">Email</p>
                    <p class="px-2">{{ $user->email }}</p>
                </div>
                <div class="flex">
                    <p class="px-2 font-bold">Steam Hex</p>
                    <p class="px-2">{{ $user->steam_hex }}</p>
                </div>
                <div class="flex">
                    <p class="px-2 font-bold">Steam ID</p>
                    <p class="px-2">{{ $user->steam_id }}</p>
                </div>
                <div class="flex">
                    <p class="px-2 font-bold">Discord ID</p>
                    <p class="px-2">{{ $user->id }}</p>
                </div>
                <div class="flex">
                    <p class="px-2 font-bold">Birthday</p>
                    <p class="px-2">{{ $user->birthday->format('M d, Y') }}</p>
                </div>
                <div class="flex">
                    <p class="px-2 font-bold">Age</p>
                    <p class="px-2">{{ $user->age }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 pt-5 pb-5 md:grid-cols-2 lg:grid-cols-3">

            <div class="w-full bg-[#124559] p-3 sm:mr-2 rounded-xl">
                <div class="text-center">
                    <img src="{{ $user->avatar }}" alt="" class="w-32 h-32 mx-auto rounded-full">
                    <h2 class="text-xl font-semibold">{{ $user->discord }}</h2>
                    <p class="mt-3 text-sm">Head Admin</p>
                </div>
                <ul class="px-3 py-2 mt-3 divide-y">
                    <li class="py-3">
                        <p class="flex items-center justify-between">
                            <span>User status</span>
                            @can('user_edit_status')
                                <a href="{{ route('admin.users.status.edit', $user->id) }}" class="edit-button-sm">
                                    <x-edit-button></x-edit-button>
                                </a>
                            @endcan
                        </p>
                        @php
                            switch ($user->account_status) {
                                case '1':
                                    $text_color = 'text-orange-500';
                                    break;
                            
                                case '2':
                                    $text_color = 'text-yellow-500';
                                    break;
                            
                                case '3':
                                    $text_color = 'text-green-500';
                                    break;
                            
                                case '4':
                                    $text_color = 'text-red-500';
                                    break;
                            
                                case '5':
                                    $text_color = 'text-red-500';
                                    break;
                            
                                case '6':
                                    $text_color = 'text-red-500';
                                    break;
                            
                                default:
                                    $text_color = 'text-red-500';
                                    break;
                            }
                        @endphp
                        <p class="ml-auto text-sm {{ $text_color }}">{{ $user->status_name }}</p>
                    </li>
                    <li class="py-3">
                        <p>Member since</p>
                        <p class="ml-auto text-sm">
                            @if (!is_null($user->member_join_date))
                                {{ $user->member_join_date->format('M d, Y') }}
                            @else
                                Not a member
                            @endif
                        </p>
                    </li>
                    <li class="py-3">
                        <p>Account since</p>
                        <p class="ml-auto text-sm">{{ $user->created_at->format('M d, Y') }}</p>
                    </li>
                    <li class="py-3">
                        <p>Last login</p>
                        <p class="ml-auto text-sm">{{ $user->last_login->format('M d, Y H:i') }}</p>
                    </li>

                    <li class="py-3">
                        <p class="flex items-center justify-between">
                            <span>Roles</span>
                            @can('user_edit_roles')
                                @if ($user->account_status == 3)
                                    <a @click="rolesModal = true" class="edit-button-sm">
                                        <x-edit-button></x-edit-button>
                                    </a>
                                @endif
                            @endcan

                        </p>
                        @foreach ($user->roles as $role)
                            <p class="text-sm text-black bg-gray-400 cursor-default button-sm">
                                {{ $role->title }}</p>
                        @endforeach
                    </li>

                    <li class="flex items-center justify-between">
                        <p class="">Protected User <br>
                            @if ($user->is_protected_user)
                                <span class="font-bold text-green-600">Yes</span>
                            @else
                                <span class="font-bold text-red-600">No</span>
                            @endif
                        </p>

                        @can('is_super_user')
                            @if ($user->account_status == 3)
                                <form action="{{ route('admin.users.protected_user.update', $user->id) }}" method="POST"
                                    class="block">
                                    @csrf
                                    @method('PUT')

                                    <button class="edit-button-sm">
                                        <x-edit-button></x-edit-button>
                                    </button>
                                </form>
                            @endif
                        @endcan
                    </li>

                    <li class="flex items-center justify-between">
                        <p class="">Super User <br>
                            @if ($user->is_super_user)
                                <span class="font-bold text-green-600">Yes</span>
                            @else
                                <span class="font-bold text-red-600">No</span>
                            @endif
                        </p>

                        @can('is_super_user')
                            @if ($user->account_status == 3)
                                <form action="{{ route('admin.users.super_user.update', $user->id) }}" method="POST"
                                    class="block">
                                    @csrf
                                    @method('PUT')

                                    <button class="edit-button-sm">
                                        <x-edit-button></x-edit-button>
                                    </button>
                                </form>
                            @endif
                        @endcan
                    </li>

                    <li class="flex items-center justify-between" x-data="{ open_tip: false }">
                        <p class="">Owner <br>
                            @if (in_array($user->id, config('cad.owner_ids')))
                                <span class="font-bold text-green-600">Yes</span>
                            @else
                                <span class="font-bold text-red-600">No</span>
                            @endif
                        </p>
                        <div class="relative inline-block">
                            <a href="#" @click="open_tip = true">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                </svg>
                            </a>
                            <div class="bg-black text-white p-2 absolute z-50 w-56 rounded-lg" x-show="open_tip"
                                @click.outside="open_tip = false">
                                This is set in the cad config file. See docs for help.
                            </div>
                        </div>
                    </li>
                </ul>


            </div>

            <div class="w-full bg-[#124559] p-3 sm:mr-2 rounded-xl">
                <h2 class="mb-4 text-xl font-semibold underline">Quick Admin Options</h2>

                <div class="grid grid-cols-1 gap-4 text-sm xl:grid-cols-2">
                    <a href="#" class="secondary-button-md">Suspend/LOA User</a>
                    <a href="#" class="delete-button-md">Ban User</a>
                    <a href="#" class="secondary-button-md" @click="communityRankModal = true">Community Rank</a>
                </div>
            </div>

            <div class="w-full bg-[#124559] p-3 sm:mr-2 rounded-xl">
                <div class="flex items-center justify-between">
                    <h2 class="mb-4 text-xl font-semibold">Notes <span class="ml-3 text-sm">(Last 5)</span></h2>
                    @can('user_manage_notes')
                        <a href="#" class="new-button-sm" @click="noteModal = true">
                            <x-new-button></x-new-button>
                        </a>
                    @endcan
                </div>

                <div class="">
                    @foreach ($notes as $note)
                        <div class="px-3 py-1 m-4 bg-gray-600 border-l-4 cursor-default border-cyan-600 rounded-2xl hover:bg-gray-500"
                            x-data="{ open: true }" @click.away="open = false">

                            <div class="flex items-center justify-between">
                                <p class="text-white select-none" @click="open = !open">
                                    From:
                                    {{ $note->giver_user->discord }}
                                    <span
                                        class="block -mt-1 text-xs tracking-widest">{{ $note->created_at->format('m/d/Y H:i') }}</span>
                                </p>
                                @can('user_manage_notes')
                                    <form
                                        action="{{ route('admin.users.notes.destroy', ['userNotes' => $note->id, 'user' => $user->id]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you wish to delete this note? This can\'t be undone!');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-button-sm">
                                            <x-delete-button></x-delete-button>
                                        </button>
                                    </form>
                                @endcan
                            </div>

                            <div x-show="open">
                                <p class="text-gray-300"> {{ $note->note }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="w-full bg-[#124559] p-3 sm:mr-2 rounded-xl">
                <div class="flex items-center justify-between">
                    <h2 class="mb-4 text-xl font-semibold">Accommodations <span class="ml-3 text-sm">(Last 5)</span></h2>
                    @can('user_manage_accommodations')
                        <a href="#" class="new-button-sm" @click="accommodationModal = true">
                            <x-new-button></x-new-button>
                        </a>
                    @endcan
                </div>
                <div class="">

                    @foreach ($accommodations as $accommodation)
                        <div class="px-3 py-1 m-4 bg-gray-600 border-l-4 border-green-600 cursor-default rounded-2xl hover:bg-gray-500"
                            x-data="{ open: true }" @click.away="open = false">

                            <div class="flex items-center justify-between">
                                <p class="text-white select-none" @click="open = !open">
                                    From: {{ $accommodation->giver_user->discord }}
                                    <span
                                        class="block -mt-1 text-xs tracking-widest">{{ $accommodation->created_at->format('m/d/Y H:i') }}</span>
                                </p>
                                @can('user_manage_accommodations')
                                    <form
                                        action="{{ route('admin.users.accommodation.destroy', ['userAccommodation' => $accommodation->id, 'user' => $user->id]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you wish to delete this accommodation? This can\'t be undone!');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-button-sm">
                                            <x-delete-button></x-delete-button>
                                        </button>
                                    </form>
                                @endcan

                            </div>

                            <div x-show="open">
                                <p class="text-gray-300">{{ $accommodation->accommodation }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="w-full bg-[#124559] p-3 sm:mr-2 rounded-xl">
                <div class="flex items-center justify-between">
                    <h2 class="mb-4 text-xl font-semibold">Disciplinary Actions <span class="ml-3 text-sm">(Last 5)</span>
                    </h2>
                    @can('user_manage_disciplinary_actions')
                        <a href="#" class="new-button-sm" @click="daModal = true">
                            <x-new-button></x-new-button>
                        </a>
                    @endcan

                </div>

                <div class="">
                    @foreach ($das as $da)
                        <div class="px-3 py-1 m-4 bg-gray-600 border-l-4 border-red-600 cursor-default rounded-2xl hover:bg-gray-500"
                            x-data="{ open: true }" @click.away="open = false">

                            <div class="flex items-center justify-between">
                                <p class="text-white select-none" @click="open = !open">From:
                                    {{ $da->giver_user->discord }}
                                    <span class="block -mt-1 text-xs tracking-widest">
                                        {{ $da->created_at->format('m/d/Y H:i') }}
                                        | Level: {{ $da_types[$da->disciplinary_action_type_id] }}
                                    </span>
                                </p>
                                @can('user_manage_disciplinary_actions')
                                    <form
                                        action="{{ route('admin.users.da.destroy', ['disciplinaryAction' => $da->id, 'user' => $user->id]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you wish to delete this disciplinary action? This can\'t be undone!');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-button-sm">
                                            <x-delete-button></x-delete-button>
                                        </button>
                                    </form>
                                @endcan
                            </div>

                            <div x-show="open">
                                <p class="text-gray-300">{{ $da->disciplinary_action }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

            <div class="w-full bg-[#124559] p-3 sm:mr-2 rounded-xl">
                <div class="flex items-center justify-between">
                    <h2 class="mb-4 text-xl font-semibold">User History <span class="ml-3 text-sm">(Last 5)</span>
                    </h2>
                </div>

                <div class="">
                    <p>Shows the last 5 actions. View complete history here.</p>
                    @foreach ($histories as $history)
                        <div
                            class="px-3 py-1 m-4 bg-gray-600 border-l-4 border-blue-600 cursor-default rounded-2xl hover:bg-gray-500">
                            <p class="text-white">Actioned by: {{ $history->user->discord }}
                                <span
                                    class="block -mt-1 text-xs tracking-widest">{{ $history->created_at->format('m/d/Y H:i:s') }}</span>
                            </p>
                            <div>
                                <p class="text-gray-300">{{ $history->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @can('user_manage_notes')
            <div x-show="noteModal" x-transition
                class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90">
                <div @click.outside="noteModal = false"
                    class="w-full max-w-[570px] rounded-[20px] bg-[#124559] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                    <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                        Add New Note
                    </h3>
                    <form action="{{ route('admin.users.notes.store', $user->id) }}" method="POST">
                        @csrf

                        <textarea type="text" name="note" class="textarea-input" required>{{ old('note') }}</textarea>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-1/2 px-3">
                                <button class="w-full edit-button-md">Save</button>
                            </div>
                            <div class="w-1/2 px-3">
                                <button @click.prevent="noteModal = false" class="w-full delete-button-md">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('user_manage_accommodations')
            <div x-show="accommodationModal" x-transition
                class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90">
                <div @click.outside="accommodationModal = false"
                    class="w-full max-w-[570px] rounded-[20px] bg-[#124559] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                    <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                        Add New Accommodation
                    </h3>
                    <form action="{{ route('admin.users.accommodation.store', $user->id) }}" method="POST">
                        @csrf
                        <textarea type="text" name="accommodation" class="textarea-input" required>{{ old('accommodation') }}</textarea>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-1/2 px-3">
                                <button class="w-full edit-button-md">Save</button>
                            </div>
                            <div class="w-1/2 px-3">
                                <button @click.prevent="accommodationModal = false" class="w-full delete-button-md">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('user_manage_disciplinary_actions')
            <div x-show="daModal" x-transition
                class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90">
                <div @click.outside="daModal = false"
                    class="w-full max-w-[570px] rounded-[20px] bg-[#124559] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                    <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                        Add New Disciplinary Actions
                    </h3>
                    <form action="{{ route('admin.users.da.store', $user->id) }}" method="POST">
                        @csrf
                        <select name="disciplinary_action_type_id" class="select-input" required>
                            @foreach ($da_types as $da_type_id => $da_type_name)
                                <option value="{{ $da_type_id }}">{{ $da_type_name }}</option>
                            @endforeach
                        </select>
                        <textarea type="text" name="disciplinary_action" class="textarea-input" required>{{ old('disciplinary_action') }}</textarea>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-1/2 px-3">
                                <button class="w-full edit-button-md">Save</button>
                            </div>
                            <div class="w-1/2 px-3">
                                <button @click.prevent="daModal = false" class="w-full delete-button-md">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        <div x-show="communityRankModal" x-transition
            class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90">
            <div @click.outside="communityRankModal = false"
                class="w-full max-w-[570px] rounded-[20px] bg-[#124559] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                    Edit Community Rank
                </h3>
                <p>Community rank has no impact on roles or permissions. This is only to help identify members.</p>
                <form action="" method="POST">
                    <select name="community_rank" class="select-input" required>
                        <option value="1">Member</option>
                        <option value="2">Moderator</option>
                        <option value="3">Admin</option>
                        <option value="4">Department Head</option>
                        <option value="5">Head Admin</option>
                    </select>
                    <div class="flex flex-wrap -mx-3 mt-3">
                        <div class="w-1/2 px-3">
                            <button class="w-full edit-button-md">Save</button>
                        </div>
                        <div class="w-1/2 px-3">
                            <button @click.prevent="communityRankModal = false" class="w-full delete-button-md">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @can('user_edit_roles')
            <div x-show="rolesModal" x-transition
                class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90">
                <div @click.outside="rolesModal = false"
                    class="w-full max-w-[570px] rounded-[20px] bg-[#124559] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                    <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                        Edit Roles
                    </h3>
                    <form action="{{ route('admin.users.roles.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="title" class="block mt-3 text-black-500">Roles <span
                                class="text-red-600">*</span></label>
                        <div class="mt-3 space-y-2">

                            @foreach ($roles as $role)
                                @if ($user->roles->contains($role->id))
                                    <label for="{{ $role->id }}" class="flex items-center cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" class="checkbox hidden" name="roles[]"
                                                id="{{ $role->id }}" value="{{ $role->id }}" checked>
                                            <div
                                                class="block border-[1px] dark:border-white border-gray-900 w-14 h-8 rounded-full">
                                            </div>
                                            <div
                                                class="dot absolute left-1 top-1 dark:bg-white bg-gray-800 w-6 h-6 rounded-full transition">
                                            </div>
                                        </div>
                                        <div class="ml-3 dark:text-white text-gray-900 font-medium">
                                            {{ $role->title }}
                                        </div>
                                    </label>
                                @else
                                    <label for="{{ $role->id }}" class="flex items-center cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" class="checkbox hidden" name="roles[]"
                                                id="{{ $role->id }}" value="{{ $role->id }}">
                                            <div
                                                class="block border-[1px] dark:border-white border-gray-900 w-14 h-8 rounded-full">
                                            </div>
                                            <div
                                                class="dot absolute left-1 top-1 dark:bg-white bg-gray-800 w-6 h-6 rounded-full transition">
                                            </div>
                                        </div>
                                        <div class="ml-3 dark:text-white text-gray-900 font-medium">
                                            {{ $role->title }}
                                        </div>
                                    </label>
                                @endif
                            @endforeach

                        </div>

                        <button class="edit-button-md w-1/2 mt-5">Save</button>
                    </form>
                </div>
            </div>
        @endcan

    </div>
@endsection

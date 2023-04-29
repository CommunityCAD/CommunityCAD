@extends('layouts.portal')

@section('content')
    <div x-data="{ noteModal: false, accommodationModal: false, daModal: false, communityRankModal: false }" class="text-white">
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
                                    <a href="{{ route('admin.users.roles.edit', $user->id) }}" class="edit-button-sm">
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
                    <a href="#" class="new-button-sm" @click="noteModal = true">
                        <x-new-button></x-new-button>
                    </a>
                </div>

                <div class="">
                    @foreach ($notes as $note)
                        <div class="px-3 py-1 m-4 bg-gray-600 border-l-4 border-cyan-600 cursor-default rounded-2xl hover:bg-gray-500"
                            x-data="{ open: true }" @click.away="open = false">

                            <div class="flex items-center justify-between">
                                <p class="text-white  select-none" @click="open = !open">
                                    From:
                                    {{ $note->giver_user->discord }}
                                    <span
                                        class="text-xs tracking-widest -mt-1 block">{{ $note->created_at->format('m/d/Y H:i') }}</span>
                                </p>
                                <form
                                    action="{{ route('admin.users.notes.destroy', ['userNotes' => $note->id, 'user' => $user->id]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you wish to delete this note? This can\'t be undone!');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="">
                                        <x-delete-button></x-delete-button>
                                    </button>
                                </form>
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
                    <a href="#" class="new-button-sm" @click="accommodationModal = true">
                        <x-new-button></x-new-button>
                    </a>
                </div>
                <div class="">

                    @foreach ($accommodations as $accommodation)
                        <div class="px-3 py-1 m-4 bg-gray-600 border-l-4 border-green-600 cursor-default rounded-2xl hover:bg-gray-500"
                            x-data="{ open: true }" @click.away="open = false">

                            <div class="flex items-center justify-between">
                                <p class="text-white  select-none" @click="open = !open">
                                    From: {{ $accommodation->giver_user->discord }}
                                    <span
                                        class="text-xs tracking-widest -mt-1 block">{{ $accommodation->created_at->format('m/d/Y H:i') }}</span>
                                </p>
                                <form
                                    action="{{ route('admin.users.accommodation.destroy', ['userAccommodation' => $accommodation->id, 'user' => $user->id]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you wish to delete this accommodation? This can\'t be undone!');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="">
                                        <x-delete-button></x-delete-button>
                                    </button>
                                </form>
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
                    <a href="#" class="new-button-sm" @click="daModal = true">
                        <x-new-button></x-new-button>
                    </a>
                </div>

                <div class="">
                    @foreach ($das as $da)
                        <div class="px-3 py-1 m-4 bg-gray-600 border-l-4 border-red-600 cursor-default rounded-2xl hover:bg-gray-500"
                            x-data="{ open: true }" @click.away="open = false">

                            <div class="flex items-center justify-between">
                                <p class="text-white select-none" @click="open = !open">From:
                                    {{ $da->giver_user->discord }}
                                    <span class="text-xs tracking-widest -mt-1 block">
                                        {{ $da->created_at->format('m/d/Y H:i') }}
                                        | Level: {{ $da_types[$da->disciplinary_action_type_id] }}
                                    </span>
                                </p>
                                <form
                                    action="{{ route('admin.users.da.destroy', ['disciplinaryAction' => $da->id, 'user' => $user->id]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you wish to delete this disciplinary action? This can\'t be undone!');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="">
                                        <x-delete-button></x-delete-button>
                                    </button>
                                </form>
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
                                    class="text-xs tracking-widest -mt-1 block">{{ $history->created_at->format('m/d/Y H:i:s') }}</span>
                            </p>
                            <div>
                                <p class="text-gray-300">{{ $history->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div x-show="noteModal" x-transition
            class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90">
            <div @click.outside="noteModal = false"
                class="w-full max-w-[570px] rounded-[20px] bg-[#124559] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                    Add New Note
                </h3>
                <form action="{{ route('admin.users.notes.store', $user->id) }}" method="POST">
                    @csrf

                    <textarea type="text" name="note" class="w-full h-24 p-1 mt-2 text-black border rounded-md focus:outline-none"
                        required>{{ old('note') }}</textarea>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-1/2 px-3">
                            <input value="Save" type="submit" class="edit-button-md w-full">
                        </div>
                        <div class="w-1/2 px-3">
                            <button @click.prevent="noteModal = false" class="delete-button-md w-full">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="accommodationModal" x-transition
            class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90">
            <div @click.outside="accommodationModal = false"
                class="w-full max-w-[570px] rounded-[20px] bg-[#124559] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                    Add New Accommodation
                </h3>
                <form action="{{ route('admin.users.accommodation.store', $user->id) }}" method="POST">
                    @csrf
                    <textarea type="text" name="accommodation"
                        class="w-full h-24 p-1 mt-2 text-black border rounded-md focus:outline-none" required>{{ old('accommodation') }}</textarea>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-1/2 px-3">
                            <input value="Save" type="submit" class="edit-button-md w-full">
                        </div>
                        <div class="w-1/2 px-3">
                            <button @click.prevent="accommodationModal = false" class="delete-button-md w-full">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="daModal" x-transition
            class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90">
            <div @click.outside="daModal = false"
                class="w-full max-w-[570px] rounded-[20px] bg-[#124559] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                    Add New Disciplinary Actions
                </h3>
                <form action="{{ route('admin.users.da.store', $user->id) }}" method="POST">
                    @csrf
                    <select name="disciplinary_action_type_id"
                        class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none" required>
                        @foreach ($da_types as $da_type_id => $da_type_name)
                            <option value="{{ $da_type_id }}">{{ $da_type_name }}</option>
                        @endforeach
                    </select>
                    <textarea type="text" name="disciplinary_action"
                        class="w-full h-24 p-1 mt-2 text-black border rounded-md focus:outline-none" required>{{ old('disciplinary_action') }}</textarea>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-1/2 px-3">
                            <input value="Save" type="submit" class="edit-button-md w-full">
                        </div>
                        <div class="w-1/2 px-3">
                            <button @click.prevent="daModal = false" class="delete-button-md w-full">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="communityRankModal" x-transition
            class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90">
            <div @click.outside="communityRankModal = false"
                class="w-full max-w-[570px] rounded-[20px] bg-[#124559] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                    Edit Community Rank
                </h3>
                <p>Community rank has no impact on roles or permissions. This is only to help identify members.</p>
                <form action="" method="POST">
                    <select name="community_rank" class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none"
                        required>
                        <option value="1">Member</option>
                        <option value="2">Moderator</option>
                        <option value="3">Admin</option>
                        <option value="4">Department Head</option>
                        <option value="5">Head Admin</option>
                    </select>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-1/2 px-3">
                            <input value="Save" type="submit" class="edit-button-md w-full">
                        </div>
                        <div class="w-1/2 px-3">
                            <button @click.prevent="communityRankModal = false" class="delete-button-md w-full">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div x-data="{ noteModal: false, accommodationModal: false, daModal: false, communityRankModal: false, rolesModal: false }">
        <header class="w-full my-3">
            <h1 class="text-2xl font-bold">Viewing Member {{ $user->preferred_name }}</h1>
            <p class="text-sm"></p>
        </header>

        @can('is_super_user')
            <div class="admin-card !w-full">
                <div class="grid gap-2 text-sm md:grid-cols-2">
                    <div class="flex">
                        <p class="px-2 font-bold">Discord Name:</p>
                        <p class="px-2">{{ $user->discord }}</p>
                    </div>
                    <div class="flex">
                        <p class="px-2 font-bold">Display Name:</p>
                        <p class="px-2">{{ $user->display_name }}</p>
                    </div>
                    <div class="flex">
                        <p class="px-2 font-bold">Real Name</p>
                        <p class="px-2">{{ $user->real_name }}</p>
                    </div>
                    <div class="flex">
                        <p class="px-2 font-bold">Discord Username</p>
                        <p class="px-2">{{ $user->discord_username }}</p>
                    </div>
                    <div class="flex">
                        <p class="px-2 font-bold">Steam Hex</p>
                        <p class="px-2">{{ $user->steam_hex }}</p>
                    </div>
                    <div class="flex">
                        <p class="px-2 font-bold">Discord ID</p>
                        <p class="px-2">{{ $user->id }}</p>
                    </div>
                    <div class="flex">
                        <p class="px-2 font-bold">Steam ID</p>
                        <p class="px-2">{{ $user->steam_id }}</p>
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
        @endcan

        <div class="grid grid-cols-1 gap-3 pt-5 pb-5 md:grid-cols-2">

            <div class="admin-card">
                <div class="text-center">
                    <img alt="" class="w-32 h-32 mx-auto rounded-full" src="{{ $user->avatar }}">
                    <h2 class="text-xl font-semibold">{{ $user->preferred_name }}</h2>
                    <p class="mt-3 text-sm">{{ $user->community_rank }}</p>
                </div>
                <ul class="px-3 py-2 mt-3 divide-y">
                    <li class="py-3">
                        <p class="flex items-center justify-between">
                            <span>User status</span>
                            @if (!in_array($user->id, config('cad.owner_ids')) || in_array(auth()->user()->id, config('cad.owner_ids')))
                                @can('user_edit_user_status')
                                    <a class="edit-button-sm" href="{{ route('admin.users.status.edit', $user->id) }}">
                                        <x-edit-button></x-edit-button>
                                    </a>
                                @endcan
                            @endif
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
                            @if (!get_setting('use_discord_roles'))
                                @can('user_manage_user_roles')
                                    @if ($user->account_status == 3)
                                        <a @click="rolesModal = true" class="edit-button-sm">
                                            <x-edit-button></x-edit-button>
                                        </a>
                                    @endif
                                @endcan
                            @endif

                        </p>
                        @if (get_setting('use_discord_roles'))
                            <p class="text-sm text-black bg-gray-400 cursor-default button-sm">
                                Roles are managed by Discord roles.</p>
                        @else
                            @foreach ($user->roles as $role)
                                <p class="text-sm text-black bg-gray-400 cursor-default button-sm">
                                    {{ $role->title }}</p>
                            @endforeach
                        @endif

                    </li>

                    <li class="flex items-center justify-between">
                        <p class="">Protected User <br>
                            <span class="text-sm italic">Makes it so only super users and owners can view this
                                user. Can only be changed by an owner.</span>
                            <br>
                            @if ($user->is_protected_user)
                                <span class="font-bold text-green-600">Yes</span>
                            @else
                                <span class="font-bold text-red-600">No</span>
                            @endif
                        </p>

                        @can('is_owner_user')
                            @if ($user->account_status == 3)
                                <form action="{{ route('admin.users.protected_user.update', $user->id) }}" class="block"
                                    method="POST">
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
                            <span class="text-sm italic">Makes this user bypass permissions and roles and can access
                                everything by default. Can only be changed by an owner.</span>
                            <br>
                            @if ($user->is_super_user)
                                <span class="font-bold text-green-600">Yes</span>
                            @else
                                <span class="font-bold text-red-600">No</span>
                            @endif
                        </p>

                        @can('is_owner_user')
                            @if ($user->account_status == 3)
                                <form action="{{ route('admin.users.super_user.update', $user->id) }}" class="block"
                                    method="POST">
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
                            <a @click="open_tip = true" href="#">
                                <svg class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <div @click.outside="open_tip = false"
                                class="absolute z-50 w-56 p-2 text-white bg-black rounded-lg" x-show="open_tip">
                                This is set in the cad config file. See docs for help.
                            </div>
                        </div>
                    </li>
                </ul>

            </div>

            <div class="admin-card">
                <h2 class="mb-4 text-xl font-semibold underline">Quick Admin Options</h2>

                <div class="grid grid-cols-1 gap-4 text-sm xl:grid-cols-2">
                    {{-- <a class="secondary-button-md" href="#">Suspend/LOA User</a>
                    <a class="delete-button-md" href="#">Ban User</a> --}}
                    <a @click="communityRankModal = true" class="secondary-button-md" href="#">Community Rank</a>
                    <a class="secondary-button-md"
                        href="{{ route('staff.user_department.index', $user->id) }}">Departments</a>
                </div>
            </div>

            <div class="admin-card">
                <div class="flex items-center justify-between">
                    <h2 class="mb-4 text-xl font-semibold">Notes <span class="ml-3 text-sm">(Last 5)</span></h2>
                    @can('user_manage_user_notes')
                        <a @click="noteModal = true" class="new-button-sm" href="#">
                            <x-new-button></x-new-button>
                        </a>
                    @endcan
                </div>

                <div class="">
                    @foreach ($notes as $note)
                        <div @click.away="open = false" class="admin-pill cursor-pointer border-l-4 border-cyan-600"
                            x-data="{ open: true }">

                            <div class="flex items-center justify-between">
                                <p @click="open = !open" class="text-white select-none">
                                    From:
                                    {{ $note->giver_user->discord }}
                                    <span
                                        class="block -mt-1 text-xs tracking-widest">{{ $note->created_at->format('m/d/Y H:i') }}</span>
                                </p>
                                @can('user_manage_user_notes')
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

            <div class="admin-card">
                <div class="flex items-center justify-between">
                    <h2 class="mb-4 text-xl font-semibold">Accommodations <span class="ml-3 text-sm">(Last 5)</span></h2>
                    @can('user_manage_user_accommodations')
                        <a @click="accommodationModal = true" class="new-button-sm" href="#">
                            <x-new-button></x-new-button>
                        </a>
                    @endcan
                </div>
                <div class="">

                    @foreach ($accommodations as $accommodation)
                        <div @click.away="open = false" class="admin-pill border-l-4 border-green-600 cursor-pointer"
                            x-data="{ open: true }">

                            <div class="flex items-center justify-between">
                                <p @click="open = !open" class="text-white select-none">
                                    From: {{ $accommodation->giver_user->discord }}
                                    <span
                                        class="block -mt-1 text-xs tracking-widest">{{ $accommodation->created_at->format('m/d/Y H:i') }}</span>
                                </p>
                                @can('user_manage_user_accommodations')
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

            <div class="admin-card">
                <div class="flex items-center justify-between">
                    <h2 class="mb-4 text-xl font-semibold">Disciplinary Actions <span class="ml-3 text-sm">(Last 5)</span>
                    </h2>
                    @can('user_manage_user_disciplinary_actions')
                        <a @click="daModal = true" class="new-button-sm" href="#">
                            <x-new-button></x-new-button>
                        </a>
                    @endcan

                </div>

                <div class="">
                    @foreach ($das as $da)
                        <div @click.away="open = false" class="admin-pill border-l-4 border-red-600 cursor-pointer"
                            x-data="{ open: true }">

                            <div class="flex items-center justify-between">
                                <p @click="open = !open" class="text-white select-none">From:
                                    {{ $da->giver_user->discord }}
                                    <span class="block -mt-1 text-xs tracking-widest">
                                        {{ $da->created_at->format('m/d/Y H:i') }}
                                        | Level: {{ $da_types[$da->disciplinary_action_type_id] }}
                                    </span>
                                </p>
                                @can('user_manage_user_disciplinary_actions')
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

            <div class="admin-card">
                <div class="flex items-center justify-between">
                    <h2 class="mb-4 text-xl font-semibold">User History <span class="ml-3 text-sm">(Last 5)</span>
                    </h2>
                </div>

                <div class="">
                    <p>Shows the last 5 actions.</p>
                    @foreach ($histories as $history)
                        <div class="admin-pill border-l-4 border-blue-600 cursor-default">
                            <p class="text-white">Actioned by: {{ $history->user->preferred_name }}
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

        @can('user_manage_user_notes')
            <div class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90"
                x-show="noteModal" x-transition>
                <div @click.outside="noteModal = false"
                    class="w-full max-w-[570px] rounded-[20px] bg-[#131c23] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                    <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                        Add New Note
                    </h3>
                    <form action="{{ route('admin.users.notes.store', $user->id) }}" method="POST">
                        @csrf

                        <textarea class="textarea-input" name="note" required type="text">{{ old('note') }}</textarea>
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

        @can('user_manage_user_accommodations')
            <div class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90"
                x-show="accommodationModal" x-transition>
                <div @click.outside="accommodationModal = false"
                    class="w-full max-w-[570px] rounded-[20px] bg-[#131c23] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                    <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                        Add New Accommodation
                    </h3>
                    <form action="{{ route('admin.users.accommodation.store', $user->id) }}" method="POST">
                        @csrf
                        <textarea class="textarea-input" name="accommodation" required type="text">{{ old('accommodation') }}</textarea>
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

        @can('user_manage_user_disciplinary_actions')
            <div class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90"
                x-show="daModal" x-transition>
                <div @click.outside="daModal = false"
                    class="w-full max-w-[570px] rounded-[20px] bg-[#131c23] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                    <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                        Add New Disciplinary Actions
                    </h3>
                    <form action="{{ route('admin.users.da.store', $user->id) }}" method="POST">
                        @csrf
                        <select class="select-input" name="disciplinary_action_type_id" required>
                            @foreach ($da_types as $da_type_id => $da_type_name)
                                <option value="{{ $da_type_id }}">{{ $da_type_name }}</option>
                            @endforeach
                        </select>
                        <textarea class="textarea-input" name="disciplinary_action" required type="text">{{ old('disciplinary_action') }}</textarea>
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

        <div class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90"
            x-show="communityRankModal" x-transition>
            <div @click.outside="communityRankModal = false"
                class="w-full max-w-[570px] rounded-[20px] bg-[#131c23] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                    Edit Community Rank
                </h3>
                <p></p>
                <form action="{{ route('admin.users.community_rank.update', $user->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <input autofocus class="text-input" name="community_rank" required type="text"
                        value="{{ old('community_rank', $user->community_rank) }}">
                    <div class="flex flex-wrap mt-3 -mx-3">
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

        @can('user_manage_user_roles')
            <div class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full min-h-screen px-4 py-5 bg-black bg-opacity-90"
                x-show="rolesModal" x-transition>
                <div @click.outside="rolesModal = false"
                    class="w-full max-w-[570px] rounded-[20px] bg-[#131c23] py-12 px-8 text-center md:py-[60px] md:px-[70px]">
                    <h3 class="pb-2 text-xl font-bold sm:text-2xl">
                        Edit Roles
                    </h3>
                    <form action="{{ route('admin.users.roles.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mt-3 space-y-2">

                            @foreach ($roles as $role)
                                @if ($user->roles->contains($role->id))
                                    <label class="flex items-center cursor-pointer" for="{{ $role->id }}">
                                        <div class="relative">
                                            <input checked class="hidden checkbox" id="{{ $role->id }}" name="roles[]"
                                                type="checkbox" value="{{ $role->id }}">
                                            <div class="block border-[1px] border-white w-14 h-8 rounded-full">
                                            </div>
                                            <div
                                                class="absolute w-6 h-6 transition bg-gray-800 rounded-full dot left-1 top-1 dark:bg-white">
                                            </div>
                                        </div>
                                        <div class="ml-3 font-medium text-gray-900text-white">
                                            {{ $role->title }}
                                        </div>
                                    </label>
                                @else
                                    <label class="flex items-center cursor-pointer" for="{{ $role->id }}">
                                        <div class="relative">
                                            <input class="hidden checkbox" id="{{ $role->id }}" name="roles[]"
                                                type="checkbox" value="{{ $role->id }}">
                                            <div class="block border-[1px] border-white w-14 h-8 rounded-full">
                                            </div>
                                            <div class="absolute w-6 h-6 transition  rounded-full dot left-1 top-1 bg-white">
                                            </div>
                                        </div>
                                        <div class="ml-3 font-medium text-white">
                                            {{ $role->title }}
                                        </div>
                                    </label>
                                @endif
                            @endforeach

                        </div>

                        <button class="w-1/2 mt-5 edit-button-md">Save</button>
                    </form>
                </div>
            </div>
        @endcan

    </div>
@endsection

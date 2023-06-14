<div>
    <div class="sm:flex sm:justify-between">
        <div class="">
            <h1>Search Username</h1>
            <input type="text" wire:model='search'
                class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">
        </div>

        <div class="">
            <h1>Show User Status</h1>
            <select wire:model='status_id' class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">
                @can('user_advanced_access')
                    <option value="1" class="text-orange-500">User</option>
                    <option value="2" class="text-yellow-500">Applicant</option>
                @endcan
                <option value="3" class="text-green-500" selected="selected">Member</option>
                <option value="4" class="text-red-500">Suspended/LOA</option>
                <option value="5" class="text-red-500">Temporary Ban</option>
                @can('user_advanced_access')
                    <option value="6" class="text-red-500">Permanent Ban</option>
                    <option value="0" class="text-blue-500">All</option>
                @endcan
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 mt-5 lg:grid-cols-2">
        @forelse ($users as $user)
            @php
                switch ($user->account_status) {
                    case '1':
                        $border_color = 'border-orange-500';
                        break;
                
                    case '2':
                        $border_color = 'border-yellow-500';
                        break;
                
                    case '3':
                        $border_color = 'border-green-500';
                        break;
                
                    case '4':
                        $border_color = 'border-red-500';
                        break;
                
                    case '5':
                        $border_color = 'border-red-500';
                        break;
                
                    case '6':
                        $border_color = 'border-red-500';
                        break;
                
                    default:
                        $border_color = 'border-red-500';
                        break;
                }
            @endphp
            <div class="admin-pill border-l-4 {{ $border_color }}">
                <div class="flex items-center justify-between ml-3 text-white">
                    <div>
                        <div class="flex">
                            <img src="{{ $user->avatar }}" class="w-10 h-10 mr-3 rounded-full" alt="">
                            <div>
                                <p>{{ $user->discord }}</p>
                                <p class="-mt-1 text-xs">{{ $user->status_name }} | Head Admin</p>
                            </div>
                        </div>
                        <div class="mx-3 my-2">
                            @can('user_access')
                                <a href="{{ route('admin.users.show', $user->id) }}" class="mr-3 edit-button-md">View</a>
                            @endcan
                        </div>
                    </div>
                    <div class="space-y-3">
                        @if ($user->is_protected_user)
                            @if (auth()->user()->is_super_user)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 text-green-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                </svg>
                            @endif
                        @endif

                        @if ($user->is_super_user)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 text-yellow-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-white">No user found.</p>
        @endforelse
    </div>
</div>

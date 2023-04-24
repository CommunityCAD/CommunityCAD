<div>
    <div class="flex justify-between">
        <div class="">
            <h1>Search Username</h1>
            <input type="text" wire:model='search'
                class="w-full px-1 py-1 text-lg font-bold text-black border-2 border-white">
        </div>

        <div class="">
            <h1>Show User Status</h1>
            <select wire:model='status_id' class="w-full p-1 mt-2 text-black border rounded-md focus:outline-none">
                <option value="1" class="text-orange-500">User</option>
                <option value="2" class="text-yellow-500">Applicant</option>
                <option value="3" class="text-green-500" selected="selected">Member</option>
                <option value="4" class="text-red-500">Suspended/LOA</option>
                <option value="5" class="text-red-500">Temporary Ban</option>
                <option value="6" class="text-red-500">Permanent Ban</option>
                <option value="0" class="text-blue-500">All</option>

            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 mt-5 sm:grid-cols-2">
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
            <div
                class="px-3 py-1 m-4 bg-gray-600 border-l-4 {{ $border_color }} cursor-pointer rounded-2xl hover:bg-gray-500">
                <a href="{{ route('admin.users.show', $user->id) }}" class="flex">
                    <div class="ml-3 text-white flex items-center">
                        <img src="{{ $user->avatar }}" class="h-10 w-10 rounded-full mr-3" alt="">
                        <span>{{ $user->discord }}</span>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-white uppercase">No results</p>
        @endforelse
    </div>
</div>

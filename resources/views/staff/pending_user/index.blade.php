@extends('layouts.staff')

@section('content')
    <header class="w-full my-3">
        <h1 class="text-2xl font-bold text-white">Pending Users</h1>
        <p class="text-sm text-white"></p>
    </header>

    <div class="card">
        <div class="grid grid-cols-1 gap-5 mt-5 lg:grid-cols-2">
            @foreach ($users as $user)
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
                                <img alt="" class="w-10 h-10 mr-3 rounded-full" src="{{ $user->avatar }}">
                                <div>
                                    <p>{{ $user->discord }} ({{ $user->display_name }})</p>
                                    <p class="-mt-1 text-xs">{{ $user->status_name }} | {{ $user->community_rank }}</p>
                                    <p class="text-sm">{{ $user->id }}</p>
                                </div>
                            </div>
                            <div class="mx-3 my-2 flex space-x-3">
                                @can('user_access')
                                    <form action="{{ route('staff.pending_users.update', $user->id) }}" class=""
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <input name="type" type="hidden" value="3">
                                        <a class="new-button-md" href="{{ route('staff.pending_users.update', $user->id) }}"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                            <span>Approve</span>
                                        </a>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
